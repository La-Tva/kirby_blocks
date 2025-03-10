<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page->title() ?></title>
    <?= css('asset/css/index.css') ?>
    <?= css('asset/css/recap.css') ?>
    <?= css('asset/css/bento.css') ?>
    <?= css('asset/css/profil.css') ?>
    <?= css('asset/css/articles.css') ?>
</head>

<body>

<?php snippet('header') ?>

<main class="main">
    <h1><?= $page->title() ?></h1>


    <?php foreach ($page->blocks()->toBlocks() as $block): ?>
        <?= $block ?>
    <?php endforeach; ?>

    <?php
// Récupérer les articles sélectionnés depuis le panel
$selectedArticles = $page->selectedArticles()->toPages();
?>

    <?php if ($selectedArticles->isNotEmpty()): ?>
    <section class="featured-articles">
        <h2>Articles populaires</h2>
        <div class="articles-list">
            <?php foreach ($selectedArticles as $article): ?>
                <?php snippet('article-card', ['article' => $article]) ?>
            <?php endforeach ?>
        </div>
    </section>
<?php endif; ?>



</main>

</body>
</html>

