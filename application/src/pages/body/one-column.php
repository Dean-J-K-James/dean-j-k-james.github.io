<div class="cell-page flex-col flex-16">
    <?php foreach (json_decode($_SESSION['page']['page'], true) as $page) : ?>
        <div class="cell flex-col flex-16 p-16 <?= $page ?>"><?php require 'pages/page/' . $page . '.php' ?></div>
    <?php endforeach; ?>
</div>