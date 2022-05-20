<?php

#
foreach (json_decode($_SESSION['brand']['js'], true) as $file) { echo '<script src="' . APPPATH . '/assets/js/' . $file . '.js' . '" defer></script>'; }

#
foreach (json_decode($_SESSION['page' ]['js'], true) as $file) { echo '<script src="' . APPPATH . '/assets/js/' . $file . '.js' . '" defer></script>'; }