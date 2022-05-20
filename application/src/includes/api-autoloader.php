<?php

#
spl_autoload_register(function ($class_name) { require_once 'includes/api/' . $class_name . '.php'; });
