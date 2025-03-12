<div class="project-layout">
        <div class="project-info">
            <?= $page->text() ?>
            <br>
            <br>
            <?= $page->text() ?>
            <br>
            <br>
            <?= $page->text() ?>
        </div>
        <div class="project-gallery">
            <ul>
                <?php foreach ($page->images() as $image): ?>
                <li>
                <a href="<?= $image->url() ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?= $image->resize(1200, 1200)->url() ?>" 
                        alt="<?= $image->alt() ?>">
                    </a>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
</div>