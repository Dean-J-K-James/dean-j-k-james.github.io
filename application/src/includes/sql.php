<?php

$dbh = new PDO("mysql:host=localhost;dbname=" . DB_NAME1 . ";charset=utf8", DB_USER1, DB_PASS1);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbh_dat = new PDO("mysql:host=localhost;dbname=" . DB_NAME2 . ";charset=utf8", DB_USER2, DB_PASS2);
$dbh_dat->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
