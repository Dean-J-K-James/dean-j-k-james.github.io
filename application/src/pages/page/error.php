<?php

switch (isset($_REQUEST['name']) ? $_REQUEST['name'] : "")
{
    case 'page-not-found':
        echo '<p>Unfortunately, that page cannot be found!</p>';
        break;
    case 'no-permission':
        echo '<p>Your account does not have permission to use this page!</p>';
        break;
    default:
        echo '<p>Unknown Error!</p>';
        break;
}