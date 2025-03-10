<?php
// Récupérer les articles sélectionnés depuis le panel
$selectedArticles = $page->selectedArticles()->toPages();

// Vérifier s'il y a des articles sélectionnés
if ($selectedArticles->count() > 0):
?>
<section class="featured-articles">
    <h2>Articles populaires</h2>
    <div class="articles-list">
        <?php foreach ($selectedArticles as $article): ?>
            <a href="<?= $article->url() ?>" class="article-card">
                <article>
                    <h3><?= $article->title() ?></h3>
                    <p class="article-description"><?= $article->description()->excerpt(300) ?></p>
                </article>
            </a>
        <?php endforeach ?>
    </div>
</section>

<?php endif ?>

<h2>Articles par catégorie</h2>

<div class="categories-container">
    <?php foreach ($page->children()->listed() as $category): ?>
        <?php $articles = $category->children()->listed(); ?>
        
        <div class="category-card">
            <h2><?= $category->title() ?> <span>(<?= $articles->count() ?> articles)</span></h2>
            <ul>
                <?php foreach ($articles as $article): ?>
                    <li onclick="location.href='<?= $article->url() ?>'">
                        <?= $article->title() ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button class="button-30" onclick="window.location.href='<?= $category->url() ?>'">Voir les autres</button>
        </div>
    <?php endforeach; ?>
</div>