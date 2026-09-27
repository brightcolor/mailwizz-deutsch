<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Records texts that MailWizz asks for but that have no source row yet
 * (labels built at runtime, texts of new versions). They then show up in the
 * list of open texts and can be translated there.
 */
final class DeutschExtMissingCapture
{
    private const CACHE_PREFIX = 'deutsch_ext_src_';

    private const CACHE_SECONDS = 2592000;

    /**
     * @var array<string, bool>
     */
    private array $seen = [];

    public function __construct(private DeutschExtRepository $repository, private string $language)
    {
    }

    public function attach(CMessageSource $messages): void
    {
        $messages->attachEventHandler('onMissingTranslation', [$this, 'handle']);
    }

    public function handle(CMissingTranslationEvent $event): void
    {
        $category = (string)$event->category;
        $message  = (string)$event->message;
        if (
            $event->language !== $this->language ||
            $message === '' ||
            in_array($category, ['yii', 'zii'], true) ||
            !preg_match('/^[A-Za-z0-9_\-\.]{1,100}$/', $category)
        ) {
            return;
        }

        $key = sha1($category . "\0" . $message);
        if (isset($this->seen[$key])) {
            return;
        }
        $this->seen[$key] = true;

        try {
            if (cache()->get(self::CACHE_PREFIX . $key)) {
                return;
            }
            if ($this->repository->sourceIds($category, $message) === []) {
                $this->repository->insertSource($category, $message);
            }
            cache()->set(self::CACHE_PREFIX . $key, 1, self::CACHE_SECONDS);
        } catch (Throwable $e) {
            Yii::log('Deutsch: fehlender Text ließ sich nicht erfassen: ' . $e->getMessage(), CLogger::LEVEL_WARNING);
        }
    }
}
