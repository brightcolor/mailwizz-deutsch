<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/** @var ExtensionController $controller */
$controller = controller();

/** @var DeutschExt $extension */
$extension  = $controller->getData('extension');
$tab        = (string)$controller->getData('tab');
$category   = (string)$controller->getData('category');
$search     = (string)$controller->getData('search');
$page       = (int)$controller->getData('page');
$pages      = (int)$controller->getData('pages');
$total      = (int)$controller->getData('total');
$rows       = (array)$controller->getData('rows');
$categories = (array)$controller->getData('categories');
$counts     = (array)$controller->getData('counts');
$drafts     = (array)$controller->getData('drafts');

$query = function (array $change) use ($tab, $category, $search, $page, $extension): string {
    $params = array_filter(array_merge(['tab' => $tab, 'category' => $category, 'q' => $search, 'page' => $page > 1 ? $page : ''], $change), fn ($v) => $v !== '' && $v !== null);

    return $extension->createUrl('texts/index', $params);
};
$back = function () use ($tab, $category, $search, $page): string {
    return CHtml::hiddenField('back_tab', $tab, ['id' => false])
        . CHtml::hiddenField('back_category', $category, ['id' => false])
        . CHtml::hiddenField('back_q', $search, ['id' => false])
        . CHtml::hiddenField('back_page', (string)$page, ['id' => false]);
};
$origins = ['editor' => 'hier übersetzt', 'erkannt' => 'in MailWizz geändert', 'englisch' => 'englisch gelassen'];
?>
<div class="box box-primary borderless">
    <div class="box-header">
        <div class="pull-left">
            <h3 class="box-title"><?php echo IconHelper::make('glyphicon-list') . 'Texte'; ?></h3>
        </div>
        <div class="pull-right">
            <?php echo CHtml::link(IconHelper::make('glyphicon-cog') . 'Übersicht und Einstellungen', $extension->createUrl('settings/index'), ['class' => 'btn btn-default btn-flat']); ?>
            <?php echo CHtml::link(IconHelper::make('export') . 'Eigene exportieren', $extension->createUrl('texts/export'), ['class' => 'btn btn-default btn-flat']); ?>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="box-body">
        <ul class="nav nav-tabs" style="margin-bottom:15px">
            <li class="<?php echo $tab === 'open' ? 'active' : ''; ?>">
                <a href="<?php echo $extension->createUrl('texts/index', ['tab' => 'open']); ?>">Offene Texte <span class="badge"><?php echo DeutschExtResultPresenter::number((int)$counts['open']); ?></span></a>
            </li>
            <li class="<?php echo $tab === 'own' ? 'active' : ''; ?>">
                <a href="<?php echo $extension->createUrl('texts/index', ['tab' => 'own']); ?>">Eigene Übersetzungen <span class="badge"><?php echo DeutschExtResultPresenter::number((int)$counts['own']); ?></span></a>
            </li>
        </ul>

        <p class="text-muted">
            <?php if ($tab === 'open') { ?>
                Diese Texte zeigt MailWizz noch auf Englisch. Trag die deutsche Fassung ein oder hak „Englisch lassen“ an, wenn der Text so bleiben soll. Platzhalter wie [LIST_NAME] oder {name}, Tags und Links übernimmst du genau so.
            <?php } else { ?>
                Diese Übersetzungen stammen von dir. Sie haben Vorrang vor dem Textpaket und werden nach Updates wiederhergestellt. „Paket-Text nutzen“ entfernt die eigene Fassung.
            <?php } ?>
        </p>

        <form method="get" action="<?php echo $extension->createUrl('texts/index'); ?>" class="form-inline" style="margin-bottom:15px">
            <input type="hidden" name="tab" value="<?php echo html_encode($tab); ?>" />
            <div class="form-group">
                <?php echo CHtml::dropDownList('category', $category, array_combine($categories, $categories) ?: [], ['empty' => 'Alle Kategorien', 'class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?php echo CHtml::textField('q', $search, ['class' => 'form-control', 'placeholder' => 'Suche im Text']); ?>
            </div>
            <button type="submit" class="btn btn-default btn-flat"><?php echo IconHelper::make('glyphicon-filter') . 'Filtern'; ?></button>
            <?php if ($category !== '' || $search !== '') { ?>
                <?php echo CHtml::link('Filter zurücksetzen', $extension->createUrl('texts/index', ['tab' => $tab]), ['class' => 'btn btn-link']); ?>
            <?php } ?>
        </form>

        <?php if ($rows === []) { ?>
            <div class="callout callout-success">
                <?php echo $tab === 'open'
                    ? ($category !== '' || $search !== '' ? 'Zu diesem Filter gibt es keine offenen Texte.' : 'Alle Texte sind übersetzt.')
                    : ($category !== '' || $search !== '' ? 'Zu diesem Filter gibt es keine eigenen Übersetzungen.' : 'Du hast noch keine eigenen Übersetzungen angelegt.'); ?>
            </div>
        <?php } else { ?>
            <?php echo CHtml::beginForm($extension->createUrl('texts/save'), 'post'); ?>
            <?php echo $back(); ?>
            <div class="table-responsive" style="overflow-x:auto">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th style="width:12%">Kategorie</th>
                        <th style="width:38%">Englisch</th>
                        <th>Deutsch</th>
                        <th style="width:12%"><?php echo $tab === 'open' ? 'Englisch lassen' : 'Herkunft'; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $index => $row) { ?>
                        <?php $draft = $drafts[$row['category'] . "\0" . $row['message']] ?? null; ?>
                        <tr>
                            <td><code><?php echo html_encode($row['category']); ?></code></td>
                            <td style="white-space:pre-wrap"><?php echo html_encode($row['message']); ?></td>
                            <td class="<?php echo $draft !== null ? 'has-error' : ''; ?>">
                                <?php
                                echo CHtml::hiddenField("rows[{$index}][category]", $row['category'], ['id' => false]);
                                echo CHtml::hiddenField("rows[{$index}][message]", $row['message'], ['id' => false]);
                                $value = $draft ?? ($tab === 'own' ? (string)$row['translation'] : '');
                                // German runs about a third longer than English: size the field for that.
                                $length = max(mb_strlen($row['message']) * 1.35, mb_strlen($value));
                                echo CHtml::textArea("rows[{$index}][translation]", $value, [
                                    'class' => 'form-control',
                                    'rows'  => max(1, min(8, (int)ceil($length / 55))),
                                    'id'    => false,
                                    'lang'  => 'de',
                                ]);
                                ?>
                            </td>
                            <td>
                                <?php if ($tab === 'open') { ?>
                                    <label style="font-weight:normal"><?php echo CHtml::checkBox("rows[{$index}][keep]", false, ['id' => false, 'value' => 1]); ?> ja</label>
                                <?php } else { ?>
                                    <small class="text-muted"><?php echo html_encode($origins[$row['origin']] ?? $row['origin']); ?></small><br />
                                    <button type="submit" class="btn btn-xs btn-default btn-flat" form="reset-<?php echo (int)$index; ?>">Paket-Text nutzen</button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="clearfix">
                <div class="pull-left text-muted">
                    <?php echo DeutschExtResultPresenter::count($total, 'Text', 'Texte'); ?>, Seite <?php echo $page; ?> von <?php echo $pages; ?>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary btn-flat"><?php echo IconHelper::make('save') . 'Eingaben speichern'; ?></button>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>

            <?php if ($tab === 'own') { ?>
                <?php foreach ($rows as $index => $row) { ?>
                    <?php echo CHtml::beginForm($extension->createUrl('texts/reset'), 'post', ['id' => 'reset-' . (int)$index, 'style' => 'display:none']); ?>
                    <?php echo CHtml::hiddenField('category', $row['category'], ['id' => false]); ?>
                    <?php echo CHtml::hiddenField('message', $row['message'], ['id' => false]); ?>
                    <?php echo $back(); ?>
                    <?php echo CHtml::endForm(); ?>
                <?php } ?>
            <?php } ?>

            <?php if ($pages > 1) { ?>
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $pages; $i++) { ?>
                        <?php if ($i === 1 || $i === $pages || abs($i - $page) <= 3) { ?>
                            <li class="<?php echo $i === $page ? 'active' : ''; ?>"><a href="<?php echo $query(['page' => $i > 1 ? $i : '']); ?>"><?php echo $i; ?></a></li>
                        <?php } elseif (abs($i - $page) === 4) { ?>
                            <li class="disabled"><span>…</span></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            <?php } ?>
        <?php } ?>
    </div>
</div>
