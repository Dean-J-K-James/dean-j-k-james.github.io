<?php
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'unknown';
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : 'unknown';
$form = Form::selectDB($page);

if ($name != '')
{
    $_SESSION['page']['name'] = $_SESSION['page']['name'] . ' - ' . ucwords(str_replace('-', ' ', $name));
}

$file = load_file('contents/' . (($form['name'] == 1) ? $name : $page) . '.json');
?>

<?php if (file_exists($file) == true): ?>
    <form id="database-form" class="flex-col flex-16" method="post" enctype="multipart/form-data">
        <input type="hidden" name="ajax" value="<?= $form['ajax'] ?>">
        <input type="hidden" name="page" value="<?= $page ?>">
        <input type="hidden" name="name" value="<?= $name ?>">

        <?php
        $json = json_decode(str_replace('%NAME%', $name, file_get_contents($file)), true);

        FormGenerator::render($json, (($form['data'] == 1) ? $form['class']::selectDB($name) : null));
        ?>

        <?php if ($form['ajax'] != NULL): ?>
            <div id="submit-button" class="search"><?= $form['button'] ?></div>
        <?php endif; ?>
    </form>
<?php endif; ?>