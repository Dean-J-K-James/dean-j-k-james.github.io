<?php
$page = $_REQUEST['page'];
$json = json_decode(file_get_contents(load_file('contents/' . $page . '-table.json')), true);
?>

<a id="submit-button" href="<?= create_link($json['act'] . '/0') ?>">Create New</a>