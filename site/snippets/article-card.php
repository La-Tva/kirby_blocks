<div class="latest-articles">
    <?php foreach ($latestArticles as $article): ?>
        <?php snippet('article-card', ['article' => $article]) ?>
    <?php endforeach ?>
</div>
