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

        <ul class="projects">
            <?php foreach ($page->children()->listed() as $project): ?>
            <li>
                <a href="<?= $project->url() ?>">
                    <figure>
                        <?= $project->image()->resize(1200, 1200)?>
                        <figcaption><?= $project->title() ?></figcaption>
                    </figure>
                </a>
            </li>
            <?php endforeach ?>
        </ul>

</main>

<?php snippet('footer') ?>

</body>
</html>