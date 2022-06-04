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