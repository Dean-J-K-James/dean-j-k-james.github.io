<?php foreach ($CONFIG->CATEGORIES as $cat): ?>
    <h3><?= ucwords(str_replace('-', ' ', $cat)) ?></h3>
    <div class="album-2 flex-08">
        <?php
        foreach (Blog::selectAll($cat) as $definition)
        {
            HTML::card_two_column(
                    $CONFIG->APPPATH . '/assets/contents/' . $definition->BLOG_SLUG . '/thumbnail.png',
                    $definition->TITLE,
                    $definition->DESCRIPTION,
                    'Last Updated: ' . $definition->DATE,
                    [$definition->CATEGORY],
                    'blog/' . $definition->BLOG_SLUG);
        }
        ?>
    </div>
<?php endforeach ?>