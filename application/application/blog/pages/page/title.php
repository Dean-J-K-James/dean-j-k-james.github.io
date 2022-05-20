<?php
$data = DefinitionBySlug::selectDB($_GET['name']);

$_SESSION['page']['name']        = $data['name'];
$_SESSION['page']['description'] = $data['description'];
$_SESSION['page']['thumbnail']   = "https://thecodingdodo.com/application/blog/contents/" . $data['slug'] . "/thumbnail.png";
$_SESSION['page']['canonical']   = "https://thecodingdodo.com/blog/" . $data['slug'];
?>

<h1><?= $data['name'] ?></h1>
<p class="subtitle">Last Updated: <?= $data['date'] ?></p>

<?php if ($data['demo']): ?>
    <canvas id="application-container"></canvas>
    <blockquote>
        <p><strong>Demo</strong> - Click the demo to restart the animation. Click <a href="<?= APPPATH . '/assets/contents/' . $data['slug'] . '/main.js' ?>">here</a> to see the code.</p>
    </blockquote>

    <?php foreach (json_decode($data['js'], true) as $file): ?>
        <script src="<?= APPPATH . '/assets/js/' . $file . '.js' ?>" defer></script>
    <?php endforeach ?>

    <script type="module" src="<?= APPPATH . '/assets/contents/' . $data['slug'] . '/main.js' ?>"></script>
<?php endif; ?>