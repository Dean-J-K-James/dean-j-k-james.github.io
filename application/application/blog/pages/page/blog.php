<?php
$data = DefinitionBySlug::selectDB($_GET['name']);

$_SESSION['page']['name']        = $data['name'];
$_SESSION['page']['description'] = $data['description'];
$_SESSION['page']['thumbnail']   = "https://thecodingdodo.com/assets/contents/" . $data['slug'] . "/thumbnail.png";
$_SESSION['page']['canonical']   = "https://thecodingdodo.com/blog/" . $data['slug'];
?>

<article class="flex-col flex-32">
    <?php
    require_once 'pages/page/blog-head.php';
    require_once 'pages/page/blog-demo.php';
    require_once 'pages/page/blog-body.php';
    ?>
</article>