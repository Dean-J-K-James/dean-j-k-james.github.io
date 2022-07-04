<?php

#
$ob = ob_get_flush();

#
if (GEN_SRC == true) { $f = SRCPATH . $_SERVER['REQUEST_URI'] . '/'; if (!file_exists($f)) { mkdir($f, 0777, true); } file_put_contents($f . 'index.html', clean_buffer($ob)); }