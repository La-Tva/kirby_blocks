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

<?php
// Récupérer les articles sélectionnés depuis le panel
$selectedArticles = $page->selectedArticles()->toPages();

// Vérifier s'il y a des articles sélectionnés
if ($selectedArticles->count() > 0):
?>
    <div class="featured-articles">
        <?php foreach ($selectedArticles as $article): ?>
            <div class="articles-list">
                <a href="<?= $article->url() ?>" class="article-card">
                    <h3><?= $article->title() ?></h3>
                    <p class="article-description"><?= $article->description()->excerpt(300) ?></p>
                </a>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>

<div class="categories-container">
    <?php foreach ($page->children()->listed() as $category): ?>
        <?php $articles = $category->children()->listed(); ?>
        
        <div class="category-card">
            <h2><?= $category->title() ?> <span>(<?= $articles->count() ?> articles)</span></h2>
            <ul>
                <?php foreach ($articles as $article): ?>
                    <?php 
                        // Génère un identifiant numérique à partir de l'ID de l'article
                        $numID = intval(crc32($article->id()));
                        // Construit l'URL relative au format : /blog/nom-de-l-article-ID3839272
                        $articleUrl = '/blog/' . $article->slug() . '-ID' . $numID;
                    ?>
                    <li onclick="location.href='<?= $articleUrl ?>'">
                        <?= $article->title() ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button class="button-30" onclick="window.location.href='<?= $category->url() ?>'">Voir les autres</button>
        </div>
    <?php endforeach; ?>
</div>


</main>

<?php snippet('footer') ?>






</body>
</html>