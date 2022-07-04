<?php

#
if ($_GET['page'] == 'home') { $_GET['page'] = HOMEPGE; }

define("PAGE", isset($_REQUEST['page']) ? $_REQUEST['page'] : 'unknown');
define("NAME", isset($_REQUEST['name']) ? $_REQUEST['name'] : 'unknown');

#
$_SESSION['page']  = Page::selectDB ($_GET['page']);              if ($_SESSION['page']  == false) { header('Location: ' . create_link("404/page-not-found")); exit; }

#
$_SESSION['brand'] = Brand::selectDB($_SESSION['page']['brand']); if ($_SESSION['brand'] == false) { header('Location: ' . create_link("404/page-not-found")); exit; }
