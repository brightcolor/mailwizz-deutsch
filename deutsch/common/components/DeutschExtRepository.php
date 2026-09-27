<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Database access of the extension: the translation tables of MailWizz, the
 * table with own translations and the content tables.
 */
final class DeutschExtRepository
{
    /**
     * Primary key of every content table.
     */
    public const CONTENT_KEYS = [
        'start_page'            => 'page_id',
        'tour_slideshow_slide'  => 'slide_id',
        'list_page_type'        => 'type_id',
        'common_email_template' => 'template_id',
    ];

    /**
     * Columns the extension may translate per content table.
     */
    public const CONTENT_FIELDS = [
        'start_page'            => ['heading', 'content'],
        'tour_slideshow_slide'  => ['title', 'content'],
        'list_page_type'        => ['name', 'description', 'content'],
        'common_email_template' => ['name', 'subject', 'content'],
    ];

    public function __construct(private CDbConnection $db)
    {
    }

    public function ensureSchema(): void
    {
        $this->db->createCommand(
            'CREATE TABLE IF NOT EXISTS {{deutsch_ext_own}} (
                `own_id` INT(11) NOT NULL AUTO_INCREMENT,
                `language` VARCHAR(16) NOT NULL,
                `category` VARCHAR(100) NOT NULL,
                `message_hash` CHAR(40) NOT NULL,
                `message` TEXT NOT NULL,
                `translation` TEXT NOT NULL,
                `origin` VARCHAR(20) NOT NULL DEFAULT \'editor\',
                `date_added` DATETIME NOT NULL,
                `last_updated` DATETIME NOT NULL,
                PRIMARY KEY (`own_id`),
                UNIQUE KEY `language_category_hash` (`language`, `category`, `message_hash`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci'
        )->execute();
    }

    public function dropSchema(): void
    {
        $this->db->createCommand('DROP TABLE IF EXISTS {{deutsch_ext_own}}')->execute();
    }

    /**
     * @return array<string, array<string, array{ids: int[], translation: ?string}>>
     */
    public function translations(string $language): array
    {
        $rows = $this->db->createCommand(
            'SELECT s.id, s.category, s.message, t.translation
             FROM {{translation_source_message}} s
             LEFT JOIN {{translation_message}} t ON t.id = s.id AND t.language = :language
             ORDER BY s.id'
        )->queryAll(true, [':language' => $language]);

        $out = [];
        foreach ($rows as $row) {
            $category = (string)$row['category'];
            $message  = (string)$row['message'];
            if (!isset($out[$category][$message])) {
                $out[$category][$message] = ['ids' => [], 'translation' => null];
            }
            $out[$category][$message]['ids'][] = (int)$row['id'];
            if ($row['translation'] !== null && $out[$category][$message]['translation'] === null) {
                $out[$category][$message]['translation'] = (string)$row['translation'];
            }
        }

        return $out;
    }

    /**
     * @return int[]
     */
    public function sourceIds(string $category, string $message): array
    {
        $ids = $this->db->createCommand(
            'SELECT id FROM {{translation_source_message}} WHERE category = :category AND message = :message'
        )->queryColumn([':category' => $category, ':message' => $message]);

        return array_map('intval', $ids);
    }

    public function insertSource(string $category, string $message): int
    {
        $this->db->createCommand(
            'INSERT INTO {{translation_source_message}} (category, message) VALUES (:category, :message)'
        )->execute([':category' => $category, ':message' => $message]);

        return (int)$this->db->getLastInsertID();
    }

    /**
     * @param int[] $ids
     */
    public function saveTranslation(array $ids, string $language, string $translation): void
    {
        $command = $this->db->createCommand(
            'INSERT INTO {{translation_message}} (id, language, translation) VALUES (:id, :language, :translation)
             ON DUPLICATE KEY UPDATE translation = VALUES(translation)'
        );
        foreach ($ids as $id) {
            $command->execute([':id' => $id, ':language' => $language, ':translation' => $translation]);
        }
    }

    /**
     * Stores a translation for one text, creating the source row if needed.
     *
     * @return int[] ids that received the translation
     */
    public function storeTranslation(string $category, string $message, string $language, string $translation): array
    {
        $ids = $this->sourceIds($category, $message);
        if ($ids === []) {
            $ids = [$this->insertSource($category, $message)];
        }
        $this->saveTranslation($ids, $language, $translation);

        return $ids;
    }

    /**
     * @return array<string, array<string, string>>
     */
    public function own(string $language): array
    {
        $rows = $this->db->createCommand(
            'SELECT category, message, translation FROM {{deutsch_ext_own}} WHERE language = :language'
        )->queryAll(true, [':language' => $language]);

        $out = [];
        foreach ($rows as $row) {
            $out[(string)$row['category']][(string)$row['message']] = (string)$row['translation'];
        }

        return $out;
    }

    /**
     * @return array<int, array<string, string>>
     */
    public function ownRows(string $language, string $category = '', string $search = ''): array
    {
        $where  = 'language = :language';
        $params = [':language' => $language];
        if ($category !== '') {
            $where .= ' AND category = :category';
            $params[':category'] = $category;
        }
        if ($search !== '') {
            $where .= ' AND (message LIKE :search_message OR translation LIKE :search_translation)';
            $params[':search_message'] = $params[':search_translation'] = '%' . addcslashes($search, '%_\\') . '%';
        }

        return $this->db->createCommand(
            "SELECT category, message, translation, origin, last_updated FROM {{deutsch_ext_own}} WHERE {$where} ORDER BY category, message"
        )->queryAll(true, $params);
    }

    public function saveOwn(string $language, string $category, string $message, string $translation, string $origin): void
    {
        $this->db->createCommand(
            'INSERT INTO {{deutsch_ext_own}} (language, category, message_hash, message, translation, origin, date_added, last_updated)
             VALUES (:language, :category, :hash, :message, :translation, :origin, NOW(), NOW())
             ON DUPLICATE KEY UPDATE translation = VALUES(translation), origin = VALUES(origin), last_updated = NOW()'
        )->execute([
            ':language'    => $language,
            ':category'    => $category,
            ':hash'        => sha1($message),
            ':message'     => $message,
            ':translation' => $translation,
            ':origin'      => $origin,
        ]);
    }

    public function deleteOwn(string $language, string $category, string $message): void
    {
        $this->db->createCommand(
            'DELETE FROM {{deutsch_ext_own}} WHERE language = :language AND category = :category AND message_hash = :hash'
        )->execute([':language' => $language, ':category' => $category, ':hash' => sha1($message)]);
    }

    public function countOwn(string $language): int
    {
        return (int)$this->db->createCommand(
            'SELECT COUNT(*) FROM {{deutsch_ext_own}} WHERE language = :language'
        )->queryScalar([':language' => $language]);
    }

    /**
     * Texts without a translation in this language, or whose translation is
     * the English text itself.
     *
     * @return array<int, array{category: string, message: string, translation: ?string}>
     */
    public function untranslated(string $language): array
    {
        $rows = $this->db->createCommand(
            'SELECT s.category, s.message, t.translation
             FROM {{translation_source_message}} s
             LEFT JOIN {{translation_message}} t ON t.id = s.id AND t.language = :language
             WHERE t.translation IS NULL OR t.translation = \'\' OR t.translation = s.message
             ORDER BY s.category, s.message'
        )->queryAll(true, [':language' => $language]);

        $out = [];
        foreach ($rows as $row) {
            $out[(string)$row['category'] . "\0" . (string)$row['message']] = [
                'category'    => (string)$row['category'],
                'message'     => (string)$row['message'],
                'translation' => $row['translation'] === null ? null : (string)$row['translation'],
            ];
        }

        return array_values($out);
    }

    /**
     * Content tables of optional parts (the tour, for example) exist only
     * after that part was enabled once.
     */
    public function tableExists(string $table): bool
    {
        $name = $this->db->tablePrefix . $table;

        return $this->db->createCommand('SHOW TABLES LIKE :name')->queryScalar([':name' => addcslashes($name, '%_\\')]) !== false;
    }

    /**
     * @param string[] $fields
     *
     * @return array<int, array<string, mixed>>
     */
    public function contentRows(string $table, array $fields): array
    {
        $key    = self::CONTENT_KEYS[$table];
        $fields = array_values(array_intersect($fields, self::CONTENT_FIELDS[$table]));
        if ($fields === []) {
            return [];
        }
        $columns = implode(', ', array_map(fn (string $f): string => '`' . $f . '`', array_merge([$key], $fields)));

        return $this->db->createCommand("SELECT {$columns} FROM {{{$table}}}")->queryAll();
    }

    public function updateContent(string $table, int $id, string $field, string $value): void
    {
        if (!in_array($field, self::CONTENT_FIELDS[$table], true)) {
            return;
        }
        $key = self::CONTENT_KEYS[$table];
        $this->db->createCommand("UPDATE {{{$table}}} SET `{$field}` = :value WHERE `{$key}` = :id")
            ->execute([':value' => $value, ':id' => $id]);
    }

    /**
     * @param callable(): void $work
     */
    public function transaction(callable $work): void
    {
        $transaction = $this->db->beginTransaction();
        try {
            $work();
            $transaction->commit();
        } catch (Throwable $e) {
            $transaction->rollback();
            throw $e;
        }
    }
}
