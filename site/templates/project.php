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
    <?php snippet('gallery') ?>

    <dl class="info">
        <?php if ($page->year()->isNotEmpty()): ?>
            <dt>Année :</dt>
            <dd><?= $page->year() ?></dd>
        <?php endif ?>
    </dl>


</main>

<?php snippet('footer') ?>

</body>
</html>