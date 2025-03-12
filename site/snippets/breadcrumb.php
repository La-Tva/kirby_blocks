<?php
// Récupérer l'arborescence des pages jusqu'à la page actuelle
$breadcrumb = $site->breadcrumb();
?>

<nav class="breadcrumb">
    <?php foreach ($breadcrumb as $key => $crumb): ?>
        <?php 
            // Vérifie si la page est un article
            if ($crumb->intendedTemplate() == 'article') {
                $numID = intval(crc32($crumb->id()));
                $crumbUrl = '/blog/' . $crumb->slug() . '-ID' . $numID;
            } else {
                $crumbUrl = $crumb->url();
            }
        ?>
        <a href="<?= $crumbUrl ?>"><?= $crumb->title() ?></a>
        <span class="separator"> > </span>
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
