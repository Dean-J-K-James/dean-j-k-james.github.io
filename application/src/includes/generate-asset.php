<?php

$path = load_file($_REQUEST['file']); 

if (GEN_SRC == true)
{
    $fold = dirname(SRCPATH . 'assets/' . $_REQUEST['file']) . '/'; if (!file_exists($fold)) { mkdir($fold, 0777, true); } copy($path, $fold . basename($path));
}

switch (pathinfo($path, PATHINFO_EXTENSION))
{
    case 'css':
        header('content-type: text/css');
        break;
    case 'js':
        header('content-type: text/javascript');
        break;
    case 'png':
        header('content-type: image/png');
        break;
}

echo file_get_contents($path);
