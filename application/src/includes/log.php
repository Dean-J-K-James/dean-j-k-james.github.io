<?php

$data          = [];
$data['page']  = isset($_SESSION['page' ]) ? $_SESSION['page' ]['slug' ] : "not set";
$data['brand'] = isset($_SESSION['brand']) ? $_SESSION['page' ]['brand'] : "not set";
$data['user']  = isset($_SESSION['login']) ? $_SESSION['login']['id'   ] : "not set";

Log::insertDB($data);
