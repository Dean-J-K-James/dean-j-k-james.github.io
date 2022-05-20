<?php

/**
 * 
 */
class Log
{

    /**
     * 
     */
    public static function insertDB($data)
    {
        global $dbh;

        $sth = $dbh->prepare("INSERT INTO logs (post_data, get_data, custom_data) VALUES (:p, :g, :d)");
        $sth->bindValue(':p', json_encode($_POST), PDO::PARAM_STR);
        $sth->bindValue(':g', json_encode($_GET ), PDO::PARAM_STR);
        $sth->bindValue(':d', json_encode($data ), PDO::PARAM_STR);
        $sth->execute();
    }

}
