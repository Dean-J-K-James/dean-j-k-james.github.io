<?php

/**
 * 
 */
class Page
{

    /**
     * 
     */
    public static function selectDB($slug)
    {
        global $dbh;

        $sth = $dbh->prepare("SELECT * FROM pages WHERE slug = :slug");
        $sth->bindParam(':slug', $slug, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

}
