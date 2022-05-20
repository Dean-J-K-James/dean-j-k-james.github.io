<?php

#Queries the database to get the login data of the user.
$login = Login::selectDB($_POST['username'], $_POST['password']);

#If the login data is successfully retrieved, log the user in.
if ($login)
{
    #Logs the user in by setting the login session variable.
    $_SESSION['login'] = $login;

    #Redirect to the home page.
    header('Location: ' . create_link(HOMEPGE));
    exit;
}

#Redirect to the login page.
header('Location: ' . create_link("login"));
exit;
