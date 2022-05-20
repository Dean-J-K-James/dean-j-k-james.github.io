<?php

#
if ($_SESSION['page']['slug'] != 'login' && isset($_SESSION['login']) == false) { header('Location: ' . create_link('login')); exit; }

#
if ($_SESSION['page']['slug'] == 'login' && isset($_SESSION['login']) != false) { header('Location: ' . create_link('home' )); exit; }