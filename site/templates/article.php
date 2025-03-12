<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title><?= $page->title() ?></title>
</head>

<body>

<?php snippet('header') ?>

<main class="main">
<article>
    <h1><?= $page->title() ?></h1>

    <div class="info_article">
    <span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path>
        </svg>
        <?= $page->reading_time() ?>min. de lecture
    </span>
    <span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M5.46257 4.43262C7.21556 2.91688 9.5007 2 12 2C17.5228 2 22 6.47715 22 12C22 14.1361 21.3302 16.1158 20.1892 17.7406L17 12H20C20 7.58172 16.4183 4 12 4C9.84982 4 7.89777 4.84827 6.46023 6.22842L5.46257 4.43262ZM18.5374 19.5674C16.7844 21.0831 14.4993 22 12 22C6.47715 22 2 17.5228 2 12C2 9.86386 2.66979 7.88416 3.8108 6.25944L7 12H4C4 16.4183 7.58172 20 12 20C14.1502 20 16.1022 19.1517 17.5398 17.7716L18.5374 19.5674Z"></path>
        </svg>
        <time datetime="<?= $page->modified('c') ?>">Date de mise à jour : <?= $page->modified('d/m/Y à H:i') ?></time>
    </span>
    </div>

        <p class="article-description"> <?= $page->description()?> </p>

    <?php foreach ($page->blocks()->toBlocks() as $block): ?>
        <?= $block ?>
    <?php endforeach; ?>

    <section class="feedback">
    <p class="feedback-title">Cet article vous a-t-il paru utile ?</p>
    <div class="feedback_button">
        <button class="button-30 vote-btn" id="btn-yes" onclick="sendVote('yes')">
            <span>👍 Oui</span>
        </button>
        <button class="button-30 vote-btn" id="btn-no" onclick="sendVote('no')">
            <span>👎 Non</span>
        </button>
    </div>
    <p id="vote-result" class="vote-result"></p>
</section>

<script>
function sendVote(vote) {
    fetch('<?= site()->url() ?>/vote', { // Correction de l'URL
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ vote, article: '<?= $page->id() ?>' }) // On passe l'ID de l'article
    })
    .then(response => response.json()) // On attend une réponse JSON
    .then(data => {
        if (data.success) {
            // Messages en fonction du vote
            let voteMessage = '';
            if (vote === 'yes') {
                voteMessage = 'Merci pour votre retour positif ! Nous sommes heureux que cet article vous ait été utile.';
            } else if (vote === 'no') {
                voteMessage = 'Merci pour votre retour. Nous sommes désolés que cet article ne vous ait pas été utile.';
            }

            // Mise à jour du texte du résultat
            document.getElementById('vote-result').textContent = voteMessage;

            // Cacher les boutons de vote et la question
            const buttons = document.querySelectorAll('.feedback_button button');
            buttons.forEach(button => {
                button.style.display = 'none'; // Cache les boutons après un vote
            });
            
            const question = document.querySelector('.feedback p');
            if (question) {
                question.style.display = 'none'; // Cache la question
            }

            // Ajout de la bordure verte ou rouge en fonction du vote
            const feedbackSection = document.querySelector('.feedback');
            if (vote === 'yes') {
                feedbackSection.classList.add('voted-yes');
                feedbackSection.classList.remove('voted-no');
            } else {
                feedbackSection.classList.add('voted-no');
                feedbackSection.classList.remove('voted-yes');
            }
        } else {
            document.getElementById('vote-result').textContent = data.message;
        }
    })
    .catch(error => console.error("Erreur AJAX :", error));
}

</script>


<div class="retour">
    <button class="button-30" onclick="window.location.href='<?= $page->parent()->url() ?>'">← Aller à la catégorie</button>
    <button class="button-30" onclick="window.location.href='<?= $page->parent()->parent()->url() ?>'">← Aller au blog</button>
</div>
</article>
</main>



<?php snippet('footer') ?>

</body>
</html>
