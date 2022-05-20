<?php

#
foreach (json_decode(file_get_contents('contents/index-includes.json')) as $file) { require_once 'includes/' . $file . '.php'; }