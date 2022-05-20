<?php

#
foreach (parse_ini_file("config.ini") as $k => $v) { define($k, $v); }
