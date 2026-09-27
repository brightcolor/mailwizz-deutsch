<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Settings form of the extension. Defaults, limits and checks come from
 * DeutschExtSettings; the values are stored as MailWizz options.
 */
class DeutschExtSettingsModel extends ExtensionModel
{
    public $language              = DeutschExtSettings::DEFAULTS['language'];
    public $sync_interval_hours   = DeutschExtSettings::DEFAULTS['sync_interval_hours'];
    public $protect_own           = DeutschExtSettings::DEFAULTS['protect_own'];
    public $write_language_files  = DeutschExtSettings::DEFAULTS['write_language_files'];
    public $framework_messages    = DeutschExtSettings::DEFAULTS['framework_messages'];
    public $remote_enabled        = DeutschExtSettings::DEFAULTS['remote_enabled'];
    public $remote_manifest_url   = DeutschExtSettings::DEFAULTS['remote_manifest_url'];
    public $remote_interval_hours = DeutschExtSettings::DEFAULTS['remote_interval_hours'];
    public $http_timeout_seconds  = DeutschExtSettings::DEFAULTS['http_timeout_seconds'];
    public $max_download_mb       = DeutschExtSettings::DEFAULTS['max_download_mb'];
    public $capture_missing       = DeutschExtSettings::DEFAULTS['capture_missing'];
    public $capture_apps          = DeutschExtSettings::DEFAULTS['capture_apps'];
    public $scan_after_update     = DeutschExtSettings::DEFAULTS['scan_after_update'];
    public $content_start_pages   = DeutschExtSettings::DEFAULTS['content_start_pages'];
    public $content_tour          = DeutschExtSettings::DEFAULTS['content_tour'];
    public $content_list_pages    = DeutschExtSettings::DEFAULTS['content_list_pages'];
    public $content_system_mails  = DeutschExtSettings::DEFAULTS['content_system_mails'];
    public $texts_per_page        = DeutschExtSettings::DEFAULTS['texts_per_page'];

    public function rules()
    {
        $rules = [
            [implode(', ', array_keys(DeutschExtSettings::DEFAULTS)), 'safe'],
            ['language', 'validateSettings'],
        ];

        return CMap::mergeArray($rules, parent::rules());
    }

    /**
     * Runs all checks of DeutschExtSettings and attaches each message to its field.
     *
     * @param string $attribute
     * @param array $params
     *
     * @return void
     */
    public function validateSettings($attribute, $params)
    {
        foreach (DeutschExtSettings::validate($this->getAttributes()) as $field => $message) {
            $this->addError($field, $message);
        }
    }

    public function attributeLabels()
    {
        $labels = [
            'language'              => 'Sprachcode',
            'sync_interval_hours'   => 'Prüfabstand in Stunden',
            'protect_own'           => 'Eigene Übersetzungen schützen',
            'write_language_files'  => 'Sprachdateien schreiben',
            'framework_messages'    => 'Formularmeldungen übersetzen',
            'remote_enabled'        => 'Texte von GitHub laden',
            'remote_manifest_url'   => 'Adresse der Paketbeschreibung',
            'remote_interval_hours' => 'GitHub-Abruf alle … Stunden',
            'http_timeout_seconds'  => 'Wartezeit beim Abruf in Sekunden',
            'max_download_mb'       => 'Größte Download-Datei in MB',
            'capture_missing'       => 'Fehlende Texte erfassen',
            'capture_apps'          => 'Erfassen in diesen Bereichen',
            'scan_after_update'     => 'Code nach Updates durchsuchen',
            'content_start_pages'   => 'Hinweise leerer Seiten übersetzen',
            'content_tour'          => 'Einführungstour übersetzen',
            'content_list_pages'    => 'Vorlagen für Listenseiten übersetzen',
            'content_system_mails'  => 'System-Mails übersetzen',
            'texts_per_page'        => 'Texte pro Seite',
        ];

        return CMap::mergeArray($labels, parent::attributeLabels());
    }

    public function attributeHelpTexts()
    {
        $range = function (string $key): string {
            [$min, $max] = DeutschExtSettings::LIMITS[$key];

            return sprintf('Erlaubt: %d bis %d, Vorgabe: %d.', $min, $max, DeutschExtSettings::DEFAULTS[$key]);
        };

        $texts = [
            'language'              => 'Für diese Sprache werden die Texte eingespielt, Vorgabe: de_de. Sie muss unter „Sprachen“ in MailWizz angelegt sein.',
            'sync_interval_hours'   => 'So oft prüft der stündliche Cronjob, ob Texte fehlen oder ein Update sie überschrieben hat. ' . $range('sync_interval_hours'),
            'protect_own'           => 'Ja: Texte, die du selbst geändert hast (hier oder unter Sprachen → Übersetzungen), bleiben stehen und werden nach Updates wiederhergestellt. Nein: Das Textpaket gilt überall.',
            'write_language_files'  => 'Schreibt die Übersetzungen aus der Datenbank zusätzlich nach apps/common/messages/<Sprache>, wie der Sprachexport von MailWizz.',
            'framework_messages'    => 'Formularfehler („Name darf nicht leer sein.“), Blätterleiste und Upload-Meldungen kommen aus dem Framework und sind sonst englisch.',
            'remote_enabled'        => 'Holt neue Fassungen des Textpakets von GitHub. Eigene Übersetzungen bleiben dabei erhalten.',
            'remote_manifest_url'   => 'Vorgabe: die neueste Veröffentlichung des Projekts auf GitHub. Die Textdatei muss im selben Ordner liegen.',
            'remote_interval_hours' => $range('remote_interval_hours'),
            'http_timeout_seconds'  => $range('http_timeout_seconds'),
            'max_download_mb'       => 'Schutz gegen übergroße Dateien. ' . $range('max_download_mb'),
            'capture_missing'       => 'Texte, die MailWizz anzeigt, die aber noch keinen Eintrag haben, landen in der Liste „Offene Texte“.',
            'capture_apps'          => 'Durch Kommas getrennt: backend, customer, frontend, api. Vorgabe: backend,customer.',
            'scan_after_update'     => 'Sucht nach einem MailWizz-Update im Code nach neuen englischen Texten und listet sie unter „Offene Texte“.',
            'content_start_pages'   => 'Die Hinweise wie „Leg deine erste Liste an“ auf leeren Seiten. Nur Einträge mit dem englischen Originaltext werden geändert.',
            'content_tour'          => 'Die Folien der Einführungstour im Admin- und Kundenbereich.',
            'content_list_pages'    => 'Anmeldeformular, Bestätigungsseiten und -mails, die neue Listen bekommen. Eigene Seiten einer Liste bleiben unberührt.',
            'content_system_mails'  => 'Betreff und Text der System-Mails (Passwort zurücksetzen, Bestellungen, Importe …). Eigene Änderungen bleiben stehen.',
            'texts_per_page'        => $range('texts_per_page'),
        ];

        return CMap::mergeArray($texts, parent::attributeHelpTexts());
    }

    public function getCategoryName(): string
    {
        return '';
    }

    /**
     * @return array<int, string>
     */
    public function getYesNoOptions(): array
    {
        return [1 => 'Ja', 0 => 'Nein'];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return DeutschExtSettings::normalize($this->getAttributes());
    }
}
