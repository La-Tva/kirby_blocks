<?php
// Récupérer l'arborescence des pages jusqu'à la page actuelle
$breadcrumb = $site->breadcrumb();
?>

<nav class="breadcrumb">
    <?php foreach ($breadcrumb as $key => $crumb): ?>
        <a href="<?= $crumb->url() ?>"><?= $crumb->title() ?></a>
        <?php if ($key > count($breadcrumb) -1): ?>
            <span class="separator"> &gt; </span>
        <?php endif ?>
    <?php endforeach; ?>
</nav>


<style>
.breadcrumb {
    font-size: 16px;
    margin: 2rem;
    position: sticky; 
}

.breadcrumb a {
    text-decoration: none;
    color: var(--text-dark);
}

.breadcrumb a:hover {
    text-decoration: underline;
    color: var(--primary-color);
}

.breadcrumb .separator {
    margin: 0 5px;
    color: #666;
}
</style>
