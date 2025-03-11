<?= css('asset/css/snippets/menu.css') ?>
<?= css('asset/css/root/colors.css') ?>
<?= css('asset/css/root/text.css') ?>
<?= css('asset/css/root/general.css') ?>
<?= css('asset/css/snippets/footer.css') ?>
<?= css('asset/css/articles.css') ?>
<?= css('asset/css/button.css') ?>

<?php snippet('breadcrumb') ?>


<header>
    <a class="logo "href="<?= $site->url() ?>"><?= $site->title() ?></a>
    <?php snippet('menu') ?>
</header>