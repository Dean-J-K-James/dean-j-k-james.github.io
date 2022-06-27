
<?php foreach (Categories::selectDB() as $cat): ?>
    <div class="cell flex-col flex-16 p-16">
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
                        [$cat],
                        "blog/" . $definition['slug']);
            }
            ?>
        </div>
    </div>
<?php endforeach ?>