<?php

/**
 * 
 */
class Definitions
{

    /**
     * 
     */
    public static function selectDB($category = '')
    {
        global $dbh;

        $sth = $dbh->prepare("SELECT * FROM blogs WHERE category LIKE :category AND active = 1");
        $sth->bindValue(':category', '%' . $category . '', PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

}
