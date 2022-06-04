<div id="menu" class="toolbar flex-row flex-08">
    <a href="<?= create_link(HOMEPGE) ?>" class="logo"><?= $_SESSION['brand']['logo'] ?></a>
    <div class="flex-fill"></div>
    <nav class="flex-row flex-08">
        <?php require_once 'pages/menu/brand.php' ?>
    </nav>
    <?php require_once 'pages/menu/profile.php' ?>
</div>