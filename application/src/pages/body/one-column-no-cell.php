<div id="cell-page" class="flex-col flex-16">
    <?php foreach (json_decode($_SESSION['page']['page'], true) as $page) : ?>
        <?php require 'pages/page/' . $page . '.php' ?>
    <?php endforeach; ?>
</div>