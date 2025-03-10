<?php

return [

    'locale' => 'fr_FR.utf8',
    'date.timezone' => 'Europe/Paris',

    'routes' => [
        // Route pour le vote
        [
            'pattern' => 'vote',
            'method' => 'POST',
            'action'  => function () {
                $articleId = get('article');
                $vote = get('vote');

                if (!$articleId || !$vote) {
                    return response::json(['success' => false, 'message' => 'Données invalides.']);
                }

                $article = page($articleId);
                if (!$article) {
                    return response::json(['success' => false, 'message' => 'Article introuvable.']);
                }

                // Vérifie si l'utilisateur a déjà voté (cookie)
                if (isset($_COOKIE['voted_' . $articleId])) {
                    return response::json(['success' => false, 'message' => 'Vous avez déjà voté.']);
                }

                // Détermine le champ à mettre à jour
                $field = ($vote === 'yes') ? 'votes_oui' : 'votes_non';
                $currentVotes = $article->$field()->isNotEmpty() ? $article->$field()->toInt() : 0;
                $newVotes = $currentVotes + 1;

                try {
                    $article->update([$field => $newVotes]);

                    // Enregistre un cookie pour bloquer les votes en double
                    setcookie('voted_' . $articleId, '1', time() + 31556926, "/"); // 1 an

                    return response::json([
                        'success' => true,
                        'votesOui' => $article->votes_oui()->toInt(),
                        'votesNon' => $article->votes_non()->toInt()
                    ]);
                } catch (Exception $e) {
                    return response::json(['success' => false, 'message' => 'Erreur lors de l\'enregistrement.']);
                }
            }
        ],

        // Route pour réinitialiser les votes
        [
            'pattern' => 'reset-votes',
            'method' => 'POST',
            'action'  => function () {
                $articleId = get('article');

                if (!$articleId) {
                    return response::json(['success' => false, 'message' => 'ID article manquant.']);
                }

                $article = page($articleId);
                if (!$article) {
                    return response::json(['success' => false, 'message' => 'Article introuvable.']);
                }

                try {
                    // Réinitialisation des votes
                    $article->update([
                        'votes_oui' => 0,
                        'votes_non' => 0
                    ]);

                    // Supprimer le cookie pour permettre à l'utilisateur de revoter
                    setcookie('voted_' . $articleId, '', time() - 3600, "/"); // Suppression du cookie

                    return response::json(['success' => true, 'message' => 'Votes réinitialisés. Vous pouvez maintenant revoter.']);
                } catch (Exception $e) {
                    return response::json(['success' => false, 'message' => 'Erreur lors de la réinitialisation.']);
                }
            }
        ]
    ]
];



?>
