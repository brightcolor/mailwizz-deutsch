<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Renders a MailWizz language file (apps/common/messages/<language>/<category>.php).
 */
final class DeutschExtLanguageFileRenderer
{
    /**
     * @param array<string, string> $messages
     */
    public function render(string $category, array $messages): string
    {
        ksort($messages, SORT_STRING);

        return "<?php declare(strict_types=1);\n"
            . "if (!defined('MW_PATH')) {\n    exit('No direct script access allowed');\n}\n\n"
            . "/**\n"
            . " * Translation file for \"{$category}\" category.\n"
            . " *\n"
            . " * Written by the extension \"Deutsch\" from the translations in the database.\n"
            . " * Change texts in the backend (Extend > Deutsche Übersetzung); edits in this\n"
            . " * file are replaced on the next check.\n"
            . " */\n\n"
            . 'return ' . var_export($messages, true) . ";\n";
    }
}
