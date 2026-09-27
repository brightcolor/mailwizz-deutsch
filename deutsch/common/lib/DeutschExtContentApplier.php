<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Translates texts that MailWizz keeps as database content (hints of empty
 * pages, tour slides, list page types, system mails).
 *
 * Mode "whole": the field is replaced only while its whole value is the
 * English original or a former German version. A text changed by hand does
 * not match and stays as it is.
 *
 * Mode "fragment": each English piece (a sentence, possibly with its link) is
 * replaced wherever it occurs. Suited for mails whose frame carries the site
 * name or an own slogan.
 *
 * Whitespace differences are ignored when matching.
 */
final class DeutschExtContentApplier
{
    /**
     * @param array{field: string, mode: string, pairs: array<string, string>, history?: array<string, string[]>} $rule
     */
    public function apply(string $value, array $rule): string
    {
        if ($value === '' || $rule['pairs'] === []) {
            return $value;
        }

        return $rule['mode'] === 'whole' ? $this->whole($value, $rule) : $this->fragment($value, $rule);
    }

    public static function normalize(string $text): string
    {
        return trim((string)preg_replace('/\s+/u', ' ', $text));
    }

    /**
     * @param array{field: string, mode: string, pairs: array<string, string>, history?: array<string, string[]>} $rule
     */
    private function whole(string $value, array $rule): string
    {
        $current = self::normalize($value);
        foreach ($rule['pairs'] as $de) {
            if ($current === self::normalize($de)) {
                return $value;
            }
        }
        foreach ($rule['pairs'] as $en => $de) {
            foreach (array_merge([(string)$en], $rule['history'][$en] ?? []) as $candidate) {
                if ($current === self::normalize($candidate)) {
                    return $de;
                }
            }
        }

        return $value;
    }

    /**
     * @param array{field: string, mode: string, pairs: array<string, string>, history?: array<string, string[]>} $rule
     */
    private function fragment(string $value, array $rule): string
    {
        $replacements = [];
        foreach ($rule['pairs'] as $en => $de) {
            $replacements[] = [(string)$en, $de];
            foreach ($rule['history'][$en] ?? [] as $old) {
                $replacements[] = [$old, $de];
            }
        }
        usort($replacements, fn (array $a, array $b): int => mb_strlen($b[0]) <=> mb_strlen($a[0]));

        foreach ($replacements as [$from, $to]) {
            if (self::normalize($from) === self::normalize($to)) {
                continue;
            }
            $result = preg_replace_callback(self::pattern($from), fn (): string => $to, $value);
            if (is_string($result)) {
                $value = $result;
            }
        }

        return $value;
    }

    private static function pattern(string $text): string
    {
        $parts = preg_split('/\s+/u', trim($text)) ?: [];
        $parts = array_map(fn (string $part): string => preg_quote($part, '/'), $parts);

        return '/' . implode('\s+', $parts) . '/u';
    }
}
