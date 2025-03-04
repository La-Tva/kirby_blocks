<?php
    /** @var \Kirby\Cms\Block $block */
    $utilisateurs = $block->utilisateur()->toUsers(); // Récupération des utilisateurs

    // Récupération des options de visibilité
    $presentation = $block->presentation()->value(); // Valeur sélectionnée dans le select (agence ou formation)
    $showPresentationAgence = $presentation === 'agence';
    $showPresentationFormation = $presentation === 'formation';
    $showLiens = $block->show_liens()->toBool();
    ?>

    <?php if ($utilisateurs->isNotEmpty()): ?>
        <div class="profil">
            <?php foreach ($utilisateurs as $utilisateur): ?>
                <div class="profil-card">
                    <?php if ($utilisateur->image()): ?>
                        <img src="<?= $utilisateur->image()->url() ?>" alt="<?= $utilisateur->name() ?>" class="profil-photo">
                    <?php endif; ?>

                    <h2><?= $utilisateur->name() ?></h2>

                    <?php if ($showPresentationAgence && $utilisateur->presentation_agence()->isNotEmpty()): ?>
                        <div class="profil-presentation">
                            <?php foreach ($utilisateur->presentation_agence()->toStructure() as $item): ?>
                                <h4><?= $item->sous_titre() ?></h4>
                                <p><?= $item->texte()->kirbytext() ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($showPresentationFormation && $utilisateur->presentation_formation()->isNotEmpty()): ?>
                        <div class="profil-presentation">
                            <?php foreach ($utilisateur->presentation_formation()->toStructure() as $item): ?>
                                <h4><?= $item->sous_titre() ?></h4>
                                <p><?= $item->texte()->kirbytext() ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($showLiens && $utilisateur->liens() && $utilisateur->liens()->isNotEmpty()): ?>
                        <ul class="profil-links">
                            <?php foreach ($utilisateur->liens()->toStructure() as $lien): ?>
                                <li>
                                    <a href="<?= $lien->url()->escape() ?>" target="_blank">
                                        <?= ucfirst($lien->reseau()->value()) ?>
                                        <svg class="profil-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>