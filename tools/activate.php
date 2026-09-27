<?php
// Enables or updates the extension "Deutsch" from the command line, for
// installations over SSH. Run from the MailWizz root folder:
//
//   php activate.php            enable, or finish an update of the extension
//   php activate.php --dry      only show what the first check would change
//
// The web interface does the same under Extend > Extensions.

declare(strict_types=1);

define('MW_APP_NAME', 'console');
define('MW_RETURN_APP_INSTANCE', true);
$_SERVER['SCRIPT_FILENAME'] = __FILE__;

if (!is_file(getcwd() . '/apps/init.php')) {
    fwrite(STDERR, "Bitte im Hauptordner von MailWizz starten (dort, wo der Ordner apps liegt).\n");
    exit(1);
}
require getcwd() . '/apps/init.php';

// MailWizz loads its extensions when a request begins.
Yii::app()->onBeginRequest(new CEvent(Yii::app()));

$name    = 'deutsch';
$dry     = in_array('--dry', $argv, true);
$manager = extensionsManager();

if (!$manager->extensionExists($name)) {
    fwrite(STDERR, "Die Erweiterung liegt nicht unter apps/extensions/deutsch. Entpacke das ZIP dort und starte erneut.\n");
    exit(1);
}

$extension = $manager->getExtensionInstance($name);
$extension->importClasses('common.lib.*');
$extension->importClasses('common.components.*');
$extension->importClasses('common.models.*');

$print = function (array $result): void {
    foreach (DeutschExtResultPresenter::lines($result) as [$type, $text]) {
        echo ($type === 'error' ? 'Fehler: ' : ($type === 'warning' ? 'Hinweis: ' : '')) . $text . "\n";
    }
    if (!empty($result['bundle'])) {
        printf("Textpaket %s (%s)\n", $result['bundle']['version'], $result['bundle']['source']);
    }
};

if ($dry) {
    $extension->getRepository()->ensureSchema();
    $print($extension->getSynchronizer()->run(['dry' => true, 'trigger' => DeutschExtSynchronizer::TRIGGER_CONSOLE]));
    exit(0);
}

if (!$manager->isExtensionEnabled($name)) {
    if (!$manager->enableExtension($name)) {
        fwrite(STDERR, implode("\n", $manager->getErrors()) . "\n");
        exit(1);
    }
    echo "Die Erweiterung ist aktiviert.\n";
} elseif ($manager->extensionMustUpdate($name)) {
    if (!$manager->updateExtension($name)) {
        fwrite(STDERR, implode("\n", $manager->getErrors()) . "\n");
        exit(1);
    }
    echo "Die Erweiterung ist aktualisiert.\n";
    $extension->getSynchronizer()->run(['trigger' => DeutschExtSynchronizer::TRIGGER_CONSOLE]);
} else {
    echo "Die Erweiterung ist schon aktiv; es folgt ein Abgleich.\n";
    $extension->getSynchronizer()->run(['trigger' => DeutschExtSynchronizer::TRIGGER_CONSOLE]);
}

$print($extension->getLastResult());
