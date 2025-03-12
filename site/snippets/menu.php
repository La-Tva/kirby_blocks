<?= css('asset/css/snippets/menu.css') ?>

<nav class="menu">
    <!-- Bouton du menu mobile (hamburger) -->
    <button class="menu-toggle" aria-label="Ouvrir le menu">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <!-- Liste des éléments du menu -->
    <ul class="menu-list">
        <?php foreach ($site->children()->listed() as $item): ?>
        <li><a href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
        <?php endforeach ?>
    </ul>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuList = document.querySelector('.menu-list');

    menuToggle.addEventListener('click', function () {
        menuList.classList.toggle('active'); // Ajoute ou supprime la classe "active"
    });
});
</script>