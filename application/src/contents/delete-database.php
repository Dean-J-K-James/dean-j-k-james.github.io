<?php

#Deletes the row from the database.
if ($_POST['id'] != 0)
{
    $_SESSION['ajax']['form']['class']::deleteDB($_POST['id']);
}