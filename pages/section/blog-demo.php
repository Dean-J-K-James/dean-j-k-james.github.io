<?php if ($CONFIG->DEMO): ?>
    <canvas id="application-container"></canvas>
    <blockquote>
        <p><strong>Demo</strong> - Click the demo to restart the animation. Click <a href="<?= $CONFIG->APPPATH . '/assets/js/' . $CONFIG->NAME . '.js' ?>">here</a> to see the code.</p>
    </blockquote>
<?php else: ?>
    <img src="<?= $CONFIG->APPPATH ?>/assets/contents/<?= $CONFIG->NAME ?>/banner.png">
<?php endif; ?>
