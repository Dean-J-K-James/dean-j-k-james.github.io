<?php

#Destroys the session, removing any login data and any sensitive information.
session_destroy();

#Redirects to the home page.
header('Location: ' . create_link(HOMEPGE));
exit;
