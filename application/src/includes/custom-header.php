<?php

#Sets up default headers to prevent caching.
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + (-1 * 60)) . " GMT");

#Starts the session.
session_name("custom-session-dean");
session_start();

#Turns on error reporting for easier debugging.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "error.log");
error_reporting(E_ALL);
