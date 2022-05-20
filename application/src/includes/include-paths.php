<?php

define("BRAND", $_SESSION['page']['brand']);
set_include_path($_SERVER['DOCUMENT_ROOT'] . APPPATH . '/application/' . BRAND . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . APPPATH . '/src/');
