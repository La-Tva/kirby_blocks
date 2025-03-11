<?php if ($block->articles()->isNotEmpty()): ?>
    <?php $articles = $block->articles()->toPages(); ?>

    <div class="featured-articles">
        <?php foreach ($articles as $article): ?>
            <div class="articles-list">
            <a href="<?= $article->url() ?>" class="article-card">
                <h3><?= $article->title() ?></h3>
                <p class="article-description"><?= $article->description()->excerpt(300) ?></p>
            </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
