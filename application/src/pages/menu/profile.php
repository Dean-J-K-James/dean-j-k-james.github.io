<?php if (isset($_SESSION['login']) == true): ?>
    <a class="profile flex-row" href="<?= create_link('ajax/logout') ?>">
        <img src="https://via.placeholder.com/32">
        <div class="flex-col p-08 py-0">
            <div class="flex-fill"></div>
            <span><?= $_SESSION['login']['username'] ?></span>
            <div class="flex-fill"></div>
        </div>
    </a>
<?php endif; ?>
