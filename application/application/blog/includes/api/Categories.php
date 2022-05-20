<?php

/**
 * 
 */
class Categories
{

    /**
     * 
     */
    public static function selectDB()
    {
        global $dbh;

        $sth = $dbh->prepare("SELECT DISTINCT category FROM blogs WHERE active = 1");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_COLUMN);
    }

}
