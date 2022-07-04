<div class="album-2 flex-08">
    <?php
    foreach (Brand::selectAllDB() as $b)
    {
        HTML::card_two_column('https://via.placeholder.com/256', $b['name'], $b['description'], null, json_decode($b['tags'], true), $b['homepage']);
    }
    ?>
</div>