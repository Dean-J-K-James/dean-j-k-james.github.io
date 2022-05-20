<?php

/**
 * 
 */
class Brand
{

    /**
     * 
     */
    public static function selectAllDB()
    {
        global $dbh;

        $sth = $dbh->prepare("SELECT * FROM brands WHERE brand <> 'index'");
        $sth->execute();
        return $sth->fetchAll();
    }

    /**
     * 
     */
    public static function selectDB($brand)
    {
        global $dbh;

        $sth = $dbh->prepare("SELECT * FROM brands WHERE brand = :brand");
        $sth->bindParam(':brand', $brand, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetch();
    }

}
