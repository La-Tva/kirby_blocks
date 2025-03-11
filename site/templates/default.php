<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page->title() ?></title>
    <?= css('asset/css/index.css') ?>
</head>

<body>

<?php snippet('header') ?>

<main class="main">
    <h1><?= $page->title() ?></h1>
    <?= $page->text() ?>


</main>


</body>
</html>