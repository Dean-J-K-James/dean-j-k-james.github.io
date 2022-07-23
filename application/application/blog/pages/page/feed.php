
<?php foreach (Categories::selectDB() as $cat): ?>
    <div class="flex-col flex-08">
        <h3><?= ucwords(str_replace('-', ' ', $cat)) ?></h3>
        <div class="album-2 flex-08">
            <?php
            foreach (Definitions::selectDB($cat) as $definition)
            {
                HTML::card_two_column(
                        APPPATH . '/assets/contents/' . $definition['slug'] . '/thumbnail.png',
                        $definition['name'],
                        $definition['description'],
                        'Last Updated: ' . $definition['date'],
                        json_decode($definition['tags'], true),
                        "blog/" . $definition['slug']);
            }
            ?>
        </div>
    </div>
<?php endforeach ?>