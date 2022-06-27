<?php

/**
 * 
 */
class Download
{

    /**
     * 
     */
    public static function selectDB($slug)
    {
        global $dbh;

        $sth = $dbh->prepare('SELECT * FROM downloads WHERE slug = :slug');
        $sth->bindParam(':slug', $slug, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetch();
    }

}
