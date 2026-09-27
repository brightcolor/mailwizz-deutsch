<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Finds the texts that PHP code passes to t('category', '...') or
 * Yii::t('category', '...'). Texts built from variables are skipped.
 */
final class DeutschExtSourceScanner
{
    private const PATTERN = '/(?<![A-Za-z0-9_>$:])(?:Yii::)?t\(\s*([\'"])([A-Za-z0-9_\-\.]+)\1\s*,\s*(\'(?:\\\\.|[^\'\\\\])*\'|"(?:\\\\.|[^"\\\\])*")/s';

    /**
     * @return array<int, array{0: string, 1: string}> list of [category, message]
     */
    public function extract(string $code): array
    {
        if (!preg_match_all(self::PATTERN, $code, $matches, PREG_SET_ORDER)) {
            return [];
        }
        $found = [];
        foreach ($matches as $match) {
            $raw = $match[3];
            if ($raw[0] === '"') {
                if (str_contains($raw, '$')) {
                    continue;
                }
                $message = stripcslashes(substr($raw, 1, -1));
            } else {
                $message = str_replace(["\\'", '\\\\'], ["'", '\\'], substr($raw, 1, -1));
            }
            if ($message === '') {
                continue;
            }
            $found[$match[2] . "\0" . $message] = [$match[2], $message];
        }

        return array_values($found);
    }
}
