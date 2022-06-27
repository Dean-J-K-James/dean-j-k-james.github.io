<?php
$pardown = new ParsedownToC();
$content = $pardown->text(file_get_contents(load_file('contents/' . $data['slug'] . '/article.md')));
?>

<h2>Table of Contents</h2>
<?php echo $pardown->contentsList(); ?>

<main class="article flex-col flex-32">
    <?php
    echo str_replace('%CNTNT%', APPPATH . '/assets/contents/' . $data['slug'], $content);
    ?>
</main>