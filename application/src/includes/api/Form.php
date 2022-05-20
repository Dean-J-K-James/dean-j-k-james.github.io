<?php

/**
 * 
 */
class Form
{

    /**
     * 
     */
    public static function selectDB($page)
    {
        global $dbh;

        $sth = $dbh->prepare("SELECT * FROM forms WHERE page = :page");
        $sth->bindParam(':page', $page, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetch();
    }

}
