
<div class="flex-col flex-04">
    <?php
    foreach (Definitions::selectDB($data['category']) as $element)
    {
        HTML::side_link('blog/' . $element['slug'], $element['name'], $element['date']);
    }
    ?>
</div>