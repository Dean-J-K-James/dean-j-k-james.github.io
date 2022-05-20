<?php

/**
 * 
 */
class Login
{

    /**
     * 
     */
    public static function selectDB($username, $password)
    {
        global $dbh;

        $password = sha1($password . '%COBven002');

        $sth = $dbh->prepare('SELECT id, username, access_level, account_type FROM users WHERE username = :username && password = :password');
        $sth->bindParam(':username', $username, PDO::PARAM_STR);
        $sth->bindParam(':password', $password, PDO::PARAM_STR);
        $sth->execute();

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

}
