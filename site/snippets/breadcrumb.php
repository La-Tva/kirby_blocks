<?php
// Récupérer l'arborescence des pages jusqu'à la page actuelle
$breadcrumb = $site->breadcrumb();
?>

<nav class="breadcrumb">
    <?php foreach ($breadcrumb as $key => $crumb): ?>
        <a href="<?= $crumb->url() ?>" ><?= $crumb->title() ?></a>
    <?php endforeach; ?>
</nav>

<style>
    .breadcrumb {
    font-size: 16px;
    margin-bottom: 10px;
    text-align: center;
    margin: 2rem 0;
}

.breadcrumb a {
    text-decoration: none;
    color: #0073e6;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.separator {
    margin: 0 5px;
    color: #999;
}

</style>
