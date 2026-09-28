<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/** @var ExtensionController $controller */
$controller = controller();

/** @var DeutschExt $extension */
$extension = $controller->getData('extension');

/** @var DeutschExtSettingsModel $model */
$model = $controller->getData('model');

/** @var array $status */
$status = $controller->getData('status');

// MailWizz runs in UTC and shows times in the timezone of the signed-in user.
$zone = DeutschExtResultPresenter::timeZone(user()->getModel()->timezone ?? null);
$when = fn (int $timestamp): string => DeutschExtResultPresenter::time($timestamp, $zone);
$last = (array)$status['last'];

$groups = [
    'Grundeinstellungen' => ['language', 'sync_interval_hours', 'protect_own', 'write_language_files', 'framework_messages'],
    'Texte von GitHub'   => ['remote_enabled', 'remote_manifest_url', 'remote_interval_hours', 'http_timeout_seconds', 'max_download_mb'],
    'Neue Texte finden'  => ['capture_missing', 'capture_apps', 'scan_after_update', 'texts_per_page'],
    'Inhalte in der Datenbank' => ['content_start_pages', 'content_tour', 'content_list_pages', 'content_system_mails'],
];
?>
<div class="box box-primary borderless">
    <div class="box-header">
        <div class="pull-left">
            <h3 class="box-title"><?php echo IconHelper::make('glyphicon-flag') . 'Stand der Übersetzung'; ?></h3>
        </div>
        <div class="pull-right">
            <?php echo CHtml::link(IconHelper::make('glyphicon-list') . 'Texte bearbeiten', $extension->createUrl('texts/index'), ['class' => 'btn btn-primary btn-flat']); ?>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="box-body">
        <?php foreach (['bundleError', 'countError'] as $key) { ?>
            <?php if ($status[$key] !== '') { ?>
                <div class="callout callout-danger"><?php echo html_encode((string)$status[$key]); ?></div>
            <?php } ?>
        <?php } ?>
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-condensed">
                    <tbody>
                    <tr><th style="width:45%">Sprache</th><td><?php echo html_encode((string)$status['language']); ?></td></tr>
                    <tr><th>Textpaket in Gebrauch</th><td><?php echo $status['bundle'] ? html_encode($status['bundle']['version'] . ' (' . $status['bundle']['source'] . ')') : '–'; ?></td></tr>
                    <tr><th>Mitgelieferte Fassung</th><td><?php echo html_encode((string)($status['shipped'] ?? '–')); ?></td></tr>
                    <tr><th>Von GitHub geladene Fassung</th><td><?php echo html_encode((string)($status['downloaded'] ?? '–')); ?></td></tr>
                    <tr><th>Letzter GitHub-Abruf</th><td><?php echo html_encode($when((int)$status['lastRemote'])); ?></td></tr>
                    <tr><th>Formularmeldungen auf Deutsch</th><td><?php echo $status['framework'] ? 'ja' : 'noch nicht (entsteht beim ersten Abgleich)'; ?></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <table class="table table-condensed">
                    <tbody>
                    <tr><th style="width:45%">Letzter Abgleich</th><td><?php echo html_encode($when((int)$status['lastRun']) . (!empty($last['trigger']) ? ' (' . $last['trigger'] . ')' : '')); ?></td></tr>
                    <?php foreach (['open' => 'Offene Texte', 'own' => 'Eigene Übersetzungen'] as $tab => $label) { ?>
                        <tr><th><?php echo $label; ?></th><td><?php echo CHtml::link($status['countError'] === '' ? DeutschExtResultPresenter::number((int)$status[$tab]) : '–', $extension->createUrl('texts/index', ['tab' => $tab])); ?></td></tr>
                    <?php } ?>
                    <tr><th>MailWizz</th><td><?php echo html_encode((string)$status['mailwizz']); ?></td></tr>
                    <tr><th>Erweiterung</th><td><?php echo html_encode((string)$status['extension']); ?></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if ($last !== []) { ?>
            <p class="text-muted" style="margin-top:10px">Ergebnis des letzten Abgleichs:</p>
            <?php foreach (DeutschExtResultPresenter::lines($last) as [$type, $text]) { ?>
                <div class="callout callout-<?php echo $type === 'error' ? 'danger' : ($type === 'success' ? 'success' : ($type === 'warning' ? 'warning' : 'info')); ?>">
                    <?php echo html_encode($text); ?>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="box-footer">
        <div class="pull-right">
            <?php
            $actions = [
                'settings/sync'   => [IconHelper::make('refresh') . 'Jetzt abgleichen', 'btn-primary'],
                'settings/remote' => [IconHelper::make('glyphicon-cloud-download') . 'Neue Texte von GitHub holen', 'btn-default'],
                'settings/scan'   => [IconHelper::make('glyphicon-search') . 'Code nach neuen Texten durchsuchen', 'btn-default'],
            ];
            foreach ($actions as $route => [$label, $class]) {
                echo CHtml::beginForm($extension->createUrl($route), 'post', ['style' => 'display:inline-block;margin-left:5px']);
                echo CHtml::tag('button', ['type' => 'submit', 'class' => 'btn btn-flat ' . $class], $label);
                echo CHtml::endForm();
            }
            ?>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
</div>

<?php $form = $controller->beginWidget('CActiveForm'); ?>
<div class="box box-primary borderless">
    <div class="box-header">
        <div class="pull-left">
            <h3 class="box-title"><?php echo IconHelper::make('glyphicon-cog') . 'Einstellungen'; ?></h3>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="box-body">
        <?php foreach ($groups as $title => $fields) { ?>
            <h4><?php echo html_encode($title); ?></h4>
            <div class="row">
                <?php foreach ($fields as $field) { ?>
                    <div class="col-lg-<?php echo $field === 'remote_manifest_url' ? '12' : '4'; ?>">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, $field); ?>
                            <?php
                            if (in_array($field, DeutschExtSettings::SWITCHES, true)) {
                                echo $form->dropDownList($model, $field, $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions($field));
                            } elseif (isset(DeutschExtSettings::LIMITS[$field])) {
                                [$min, $max] = DeutschExtSettings::LIMITS[$field];
                                echo $form->numberField($model, $field, $model->fieldDecorator->getHtmlOptions($field, ['min' => $min, 'max' => $max, 'step' => 1]));
                            } else {
                                echo $form->textField($model, $field, $model->fieldDecorator->getHtmlOptions($field));
                            }
                            ?>
                            <?php echo $form->error($model, $field); ?>
                            <div class="help-block"><small><?php echo html_encode((string)($model->attributeHelpTexts()[$field] ?? '')); ?></small></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <div class="box-footer">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary btn-flat"><?php echo IconHelper::make('save') . 'Einstellungen speichern'; ?></button>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
</div>
<?php $controller->endWidget(); ?>

<?php if (!empty($last['problems'])) { ?>
    <div class="box box-primary borderless">
        <div class="box-header">
            <h3 class="box-title"><?php echo IconHelper::make('glyphicon-warning-sign') . 'Übersprungene Einträge des Textpakets'; ?></h3>
        </div>
        <div class="box-body">
            <ul>
                <?php foreach ((array)$last['problems'] as $problem) { ?>
                    <li><?php echo html_encode((string)$problem); ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>
