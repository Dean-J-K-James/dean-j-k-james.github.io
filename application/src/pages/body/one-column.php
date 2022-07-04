<div id="cell-page" class="flex-col flex-16">
    <?php
    foreach (json_decode($_SESSION['page']['page'], true) as $s)
    {
        $c = Section::selectDB($s)['class'];
        $t = Section::selectDB($s)['tag'];

        echo '<' . $t . ' class="cell ' . $s . ' ' . $c . '">'; require 'pages/page/' . $s . '.php'; echo '</' . $t . '>';
    }
    ?>
</div>