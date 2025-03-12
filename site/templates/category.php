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
<div class="article">

<h1><?= $page->title() ?></h1>

<div class="article-list">
<ul>
    <?php foreach ($page->children()->listed() as $article): ?>
        <li>
            <a href="<?= $article->url() ?>">
                <h3><?= $article->title() ?></h3>
            <p class="article-description"><?= $article->description()->excerpt(300) ?></p>
            </a>
            <div class="article-commantaire">
                <p>👍 Utile : <?= $article->votes_oui()->isNotEmpty() ? $article->votes_oui() : 0 ?></p>
                <p>👎 Non utile : <?= $article->votes_non()->isNotEmpty() ? $article->votes_non() : 0 ?></p>
            </div>
        </li>

       <button onclick="resetVotes('<?= $article->id() ?>')">Réinitialiser les votes</button> -->
    <?php endforeach; ?>
</ul>




<script>

function resetVotes(articleId) {
    console.log("Envoi de la requête pour réinitialiser les votes pour l'article :", articleId); // Log avant d'envoyer la requête
    
    if (confirm("Voulez-vous vraiment réinitialiser les votes ?")) {
        fetch('<?= site()->url() ?>/reset-votes', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ article: articleId })
        })
        .then(response => {
            console.log("Réponse reçue :", response);
            return response.json();
        })
        .then(data => {
            console.log("Données retournées par le serveur :", data); // Log de la réponse
            if (data.success) {
                alert("Votes réinitialisés !");
                location.reload();
            } else {
                alert("Erreur : " + data.message);
            }
        })
        .catch(error => {
            console.error("Erreur AJAX :", error);
        });
    }
}

</script>



</div>

    <button class="button-30" onclick="window.location.href='<?= $page->parent()->url() ?>'">← Retour</button>
</div>
</div>
</main>

<?php snippet('footer') ?>


</body>
</html>


