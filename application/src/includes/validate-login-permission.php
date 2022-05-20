<?php

#
if ($_SESSION['page']['brand'] != 'index' && !in_array($_SESSION['brand']['brand'], json_decode($_SESSION['login']['account_type'], true))) { header('Location: ' . create_link(HOMEPGE)); exit; }
