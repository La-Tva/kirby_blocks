<?php if ($block->categories()->isNotEmpty()): ?>
    <?php $categories = $block->categories()->toPages(); ?>

    <div class="categories-container">
        <?php foreach ($categories as $category): ?>
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
<?php endif; ?>
