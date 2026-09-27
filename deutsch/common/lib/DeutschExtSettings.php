<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Settings of the extension: defaults, limits and validation in one place.
 * Framework free, so the rules can be tested without MailWizz.
 */
final class DeutschExtSettings
{
    /**
     * Default value of every setting.
     */
    public const DEFAULTS = [
        'language'              => 'de_de',
        'sync_interval_hours'   => 1,
        'protect_own'           => 1,
        'write_language_files'  => 1,
        'framework_messages'    => 1,
        'remote_enabled'        => 1,
        'remote_manifest_url'   => 'https://github.com/brightcolor/mailwizz-deutsch/releases/latest/download/manifest.json',
        'remote_interval_hours' => 24,
        'http_timeout_seconds'  => 20,
        'max_download_mb'       => 20,
        'capture_missing'       => 1,
        'capture_apps'          => 'backend,customer',
        'scan_after_update'     => 1,
        'content_start_pages'   => 1,
        'content_tour'          => 1,
        'content_list_pages'    => 1,
        'content_system_mails'  => 1,
        'texts_per_page'        => 50,
    ];

    /**
     * Inclusive limits of the numeric settings.
     */
    public const LIMITS = [
        'sync_interval_hours'   => [1, 168],
        'remote_interval_hours' => [1, 720],
        'http_timeout_seconds'  => [5, 120],
        'max_download_mb'       => [1, 100],
        'texts_per_page'        => [10, 500],
    ];

    /**
     * Yes/no settings, stored as 1 or 0.
     */
    public const SWITCHES = [
        'protect_own',
        'write_language_files',
        'framework_messages',
        'remote_enabled',
        'capture_missing',
        'scan_after_update',
        'content_start_pages',
        'content_tour',
        'content_list_pages',
        'content_system_mails',
    ];

    /**
     * MailWizz applications where missing texts can be recorded.
     */
    public const CAPTURE_APPS = ['backend', 'customer', 'frontend', 'api'];

    /**
     * Database tables with texts stored as content, and the switch that
     * enables each of them.
     */
    public const CONTENT_TABLES = [
        'start_page'            => 'content_start_pages',
        'tour_slideshow_slide'  => 'content_tour',
        'list_page_type'        => 'content_list_pages',
        'common_email_template' => 'content_system_mails',
    ];

    public const MAX_URL_LENGTH = 500;

    /**
     * Fills in defaults and converts the types. Invalid values stay as they
     * are, so validate() can report them.
     *
     * @param array<string, mixed> $values
     *
     * @return array<string, mixed>
     */
    public static function normalize(array $values): array
    {
        $out = [];
        foreach (self::DEFAULTS as $key => $default) {
            $value = $values[$key] ?? $default;
            if ($key === 'capture_apps' && is_array($value)) {
                $value = implode(',', array_map('strval', $value));
            }
            if (is_int($default)) {
                if (is_string($value) && preg_match('/^\s*-?\d+\s*$/', $value)) {
                    $value = (int)trim($value);
                } elseif (is_bool($value)) {
                    $value = (int)$value;
                } elseif (is_float($value) && floor($value) === $value) {
                    $value = (int)$value;
                }
            } else {
                $value = is_scalar($value) ? trim((string)$value) : '';
            }
            $out[$key] = $value;
        }

        return $out;
    }

    /**
     * Checks all settings and returns one understandable message per invalid
     * field. An empty array means everything is valid.
     *
     * @param array<string, mixed> $values
     *
     * @return array<string, string>
     */
    public static function validate(array $values): array
    {
        $errors = [];
        $v      = self::normalize($values);

        if (!is_string($v['language']) || !preg_match('/^[a-z]{2}(_[a-z]{2})?$/', $v['language'])) {
            $errors['language'] = 'Der Sprachcode muss wie „de_de“ aussehen: zwei Kleinbuchstaben für die Sprache, dahinter optional ein Unterstrich und zwei für die Region.';
        }

        foreach (self::LIMITS as $key => [$min, $max]) {
            if (!is_int($v[$key]) || $v[$key] < $min || $v[$key] > $max) {
                $errors[$key] = sprintf('Bitte gib eine ganze Zahl von %d bis %d ein.', $min, $max);
            }
        }

        foreach (self::SWITCHES as $key) {
            if (!in_array($v[$key], [0, 1], true)) {
                $errors[$key] = 'Bitte wähle „Ja“ oder „Nein“.';
            }
        }

        if ($v['remote_enabled'] === 1) {
            $url = (string)$v['remote_manifest_url'];
            if (
                strlen($url) > self::MAX_URL_LENGTH ||
                filter_var($url, FILTER_VALIDATE_URL) === false ||
                stripos($url, 'https://') !== 0
            ) {
                $errors['remote_manifest_url'] = sprintf(
                    'Bitte gib eine vollständige Adresse ein, die mit https:// beginnt (höchstens %d Zeichen). Ohne Adresse schalte „Texte von GitHub laden“ aus.',
                    self::MAX_URL_LENGTH
                );
            }
        }

        $apps = self::splitList((string)$v['capture_apps']);
        $unknown = array_diff($apps, self::CAPTURE_APPS);
        if ($unknown !== []) {
            $errors['capture_apps'] = sprintf(
                'Unbekannt: %s. Erlaubt sind %s, durch Kommas getrennt.',
                implode(', ', $unknown),
                implode(', ', self::CAPTURE_APPS)
            );
        }

        return $errors;
    }

    /**
     * @return string[]
     */
    public static function captureApps(string $value): array
    {
        return array_values(array_intersect(self::splitList($value), self::CAPTURE_APPS));
    }

    /**
     * @return string[]
     */
    public static function splitList(string $value): array
    {
        $parts = array_map('trim', explode(',', strtolower($value)));

        return array_values(array_unique(array_filter($parts, fn (string $part): bool => $part !== '')));
    }
}
