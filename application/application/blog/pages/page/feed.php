<?php foreach (Categories::selectDB() as $cat): ?>
    <h2><?= ucwords(str_replace('-', ' ', $cat)) ?></h2>
    <hr>
    <?php
    foreach (DefinitionsByCategory::selectDB($cat) as $definition)
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
<?php endforeach ?>