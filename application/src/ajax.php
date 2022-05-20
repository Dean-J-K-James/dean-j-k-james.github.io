<?php

#
foreach (json_decode(file_get_contents('contents/ajax-includes.json')) as $file) { require_once 'includes/' . $file . '.php'; } require_once 'contents/' . $_REQUEST['ajax'] . '.php';