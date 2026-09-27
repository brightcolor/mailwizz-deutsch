<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Placeholders, HTML tags and URLs of a text. A translation must contain
 * exactly the same ones as the English source: this keeps tags such as
 * [LIST_NAME] working and stops a translation from bringing in markup or
 * links of its own.
 */
final class DeutschExtTokens
{
    public const PATTERN = '/\{[A-Za-z0-9_\-\.]+\}|\[[A-Z0-9_]+\]|%(?:\d+\$)?[sdf]|<\/?[a-zA-Z][^>]*>|https?:\/\/[^\s"\'<)]+/';

    /**
     * @return string[] sorted list, duplicates kept
     */
    public static function of(string $text): array
    {
        $tokens = self::inOrder($text);
        sort($tokens, SORT_STRING);

        return $tokens;
    }

    public static function same(string $source, string $translation): bool
    {
        return self::of($source) === self::of($translation);
    }

    /**
     * Readable description of the difference, for error messages.
     */
    public static function difference(string $source, string $translation): string
    {
        $missing = self::diff(self::inOrder($source), self::inOrder($translation));
        $extra   = self::diff(self::inOrder($translation), self::inOrder($source));
        $parts   = [];
        if ($missing !== []) {
            $parts[] = 'fehlt: ' . implode(' ', $missing);
        }
        if ($extra !== []) {
            $parts[] = 'zu viel: ' . implode(' ', $extra);
        }

        return implode('; ', $parts);
    }

    /**
     * @return string[] in the order they appear in the text
     */
    private static function inOrder(string $text): array
    {
        preg_match_all(self::PATTERN, $text, $matches);

        return $matches[0];
    }

    /**
     * Multiset difference: every token of $a that $b does not cover.
     *
     * @param string[] $a
     * @param string[] $b
     *
     * @return string[]
     */
    private static function diff(array $a, array $b): array
    {
        $left = [];
        foreach ($a as $token) {
            $index = array_search($token, $b, true);
            if ($index === false) {
                $left[] = $token;
                continue;
            }
            unset($b[$index]);
        }

        return $left;
    }
}
