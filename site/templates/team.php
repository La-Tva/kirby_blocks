<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page->title() ?></title>
</head>

<body>

<?php snippet('header') ?>

<main class="main">
    <h1><?= $page->title() ?></h1>

    <div class="blocks">
        <?php foreach ($page->blocks()->toBlocks() as $block): ?>
        <div class="block" data-type="<?= $block->type() ?>">
                <?= $block ?>
        </div>
            <?php endforeach ?>
        </div>
    </div>


</main>


</body>
</html>