<?php

#
foreach (json_decode($_SESSION['brand']['dependencies'], true) as $dependency) { require_once 'includes/' . $dependency . '.php'; }

#
foreach (json_decode($_SESSION['page' ]['dependencies'], true) as $dependency) { require_once 'includes/' . $dependency . '.php'; }