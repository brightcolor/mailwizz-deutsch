<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Decides for every text what the check does: fill in a missing or English
 * translation, update a former version of the package, keep a translation of
 * one's own, or restore it after an update removed it.
 *
 * Framework free: works on arrays and returns a plan, the caller writes it.
 */
final class DeutschExtMessagePlanner
{
    public const REASON_NEW       = 'neu';
    public const REASON_FILLED    = 'ergänzt';
    public const REASON_UPDATED   = 'aktualisiert';
    public const REASON_REPLACED  = 'ersetzt';
    public const REASON_RESTORED  = 'wiederhergestellt';
    public const REASON_REPAIRED  = 'repariert';

    /**
     * @param array<string, array<string, string>> $bundle   category => English => German
     * @param array<string, array<string, string[]>> $history category => English => former German texts
     * @param array<string, array<string, array{ids: int[], translation: ?string}>> $current category => English => database row
     * @param array<string, array<string, string>> $own      category => English => own translation
     *
     * @return array{
     *     write: array<int, array{category: string, message: string, translation: string, reason: string, ids: int[]}>,
     *     capture: array<int, array{category: string, message: string, translation: string}>,
 *     release: array<int, array{category: string, message: string}>,
     *     stats: array<string, int>
     * }
     */
    public function plan(array $bundle, array $history, array $current, array $own, bool $protectOwn): array
    {
        $write   = [];
        $capture = [];
        $release = [];
        $stats   = [
            'unverändert'         => 0,
            self::REASON_NEW      => 0,
            self::REASON_FILLED   => 0,
            self::REASON_UPDATED  => 0,
            self::REASON_REPLACED => 0,
            self::REASON_RESTORED => 0,
            self::REASON_REPAIRED => 0,
            'eigene erkannt'      => 0,
            'eigene geändert'     => 0,
        ];

        foreach ($this->keys($bundle, $own) as [$category, $message]) {
            $bundleValue = $bundle[$category][$message] ?? null;
            $ownValue    = $own[$category][$message] ?? null;
            if ($ownValue !== null && !DeutschExtTokens::same($message, $ownValue)) {
                // An own text with broken placeholders is no translation to keep.
                $release[] = ['category' => $category, 'message' => $message];
                $ownValue  = null;
            }
            $target      = $protectOwn ? ($ownValue ?? $bundleValue) : ($bundleValue ?? $ownValue);
            if ($target === null) {
                continue;
            }

            $row = $current[$category][$message] ?? null;
            $ids = $row['ids'] ?? [];
            $db  = $row['translation'] ?? null;

            if ($db === $target) {
                $stats['unverändert']++;
                continue;
            }

            $missing = $db === null || trim($db) === '' || $db === $message;
            if ($missing) {
                if ($row === null) {
                    $reason = self::REASON_NEW;
                } elseif ($protectOwn && $ownValue !== null) {
                    $reason = self::REASON_RESTORED;
                } else {
                    $reason = self::REASON_FILLED;
                }
                $write[] = compact('category', 'message', 'ids', 'reason') + ['translation' => $target];
                $stats[$reason]++;
                continue;
            }

            if (!DeutschExtTokens::same($message, $db)) {
                // Placeholders, tags or links are missing or changed: the text is broken.
                $write[] = compact('category', 'message', 'ids') + ['translation' => $target, 'reason' => self::REASON_REPAIRED];
                $stats[self::REASON_REPAIRED]++;
                continue;
            }

            if (!$protectOwn) {
                $write[] = compact('category', 'message', 'ids') + ['translation' => $target, 'reason' => self::REASON_REPLACED];
                $stats[self::REASON_REPLACED]++;
                continue;
            }

            if ($ownValue !== null) {
                // Changed again in the MailWizz translation editor: that is the new own text.
                $capture[] = ['category' => $category, 'message' => $message, 'translation' => $db];
                $stats['eigene geändert']++;
                continue;
            }

            if ($bundleValue !== null && in_array($db, $history[$category][$message] ?? [], true)) {
                $write[] = compact('category', 'message', 'ids') + ['translation' => $bundleValue, 'reason' => self::REASON_UPDATED];
                $stats[self::REASON_UPDATED]++;
                continue;
            }

            $capture[] = ['category' => $category, 'message' => $message, 'translation' => $db];
            $stats['eigene erkannt']++;
        }

        return ['write' => $write, 'capture' => $capture, 'release' => $release, 'stats' => $stats];
    }

    /**
     * @param array<string, array<string, string>> $bundle
     * @param array<string, array<string, string>> $own
     *
     * @return array<int, array{0: string, 1: string}>
     */
    private function keys(array $bundle, array $own): array
    {
        $keys = [];
        foreach ([$bundle, $own] as $source) {
            foreach ($source as $category => $entries) {
                foreach ($entries as $message => $unused) {
                    $keys[(string)$category . "\0" . (string)$message] = [(string)$category, (string)$message];
                }
            }
        }

        return array_values($keys);
    }
}
