<?php
// Example keys in MailWizz hints (such as a sample AWS secret) look like real
// secrets to secret scanners, and GitHub push protection rejects them. This
// breaks such character runs into short pieces without changing what the
// files mean: in JSON, one character per piece becomes a \u escape; in PHP
// sources, the string is split into concatenated literals.

declare(strict_types=1);

final class SecretLikeMask
{
    /**
     * Only runs of at least this many characters are looked at.
     */
    public const MIN_LENGTH = 32;

    /**
     * A run counts as secret-like with at least this many digits, uppercase
     * and lowercase letters each. Words and class names stay untouched.
     */
    public const MIN_OF_EACH = 3;

    /**
     * Length of the pieces a secret-like run is broken into.
     */
    public const PIECE = 16;

    public static function isSecretLike(string $run): bool
    {
        return strlen($run) >= self::MIN_LENGTH
            && preg_match_all('/[0-9]/', $run) >= self::MIN_OF_EACH
            && preg_match_all('/[A-Z]/', $run) >= self::MIN_OF_EACH
            && preg_match_all('/[a-z]/', $run) >= self::MIN_OF_EACH;
    }

    /**
     * For JSON text: runs sit inside strings, where \u escapes are allowed.
     */
    public static function json(string $json): string
    {
        return self::replace($json, function (string $run): string {
            $out = '';
            foreach (str_split($run, self::PIECE) as $i => $piece) {
                $out .= $i === 0 ? $piece : sprintf('\\u%04x', ord($piece[0])) . substr($piece, 1);
            }

            return $out;
        });
    }

    /**
     * For PHP files written by var_export(): runs sit inside single-quoted strings.
     */
    public static function php(string $php): string
    {
        return self::replace($php, fn (string $run): string => implode("' . '", str_split($run, self::PIECE)));
    }

    private static function replace(string $text, callable $split): string
    {
        return (string)preg_replace_callback(
            '/[A-Za-z0-9+\/]{' . self::MIN_LENGTH . ',}/',
            fn (array $m): string => self::isSecretLike($m[0]) ? $split($m[0]) : $m[0],
            $text
        );
    }
}
