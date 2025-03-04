<?= css('asset/css/profil.css') ?>
<?= css('asset/css/index.css') ?>

<?php snippet('header'); ?>

<main>
    <h1><?= $page->title() ?></h1>

    <?php foreach ($page->blocks()->toBlocks() as $block): ?>
        <?= $block ?>
    <?php endforeach; ?>
</main>

<?php snippet('footer'); ?>

