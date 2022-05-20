<?php

/**
 * 
 */
class DefinitionBySlug
{

    /**
     * 
     */
    public static function selectDB($slug)
    {
        global $dbh;

        $sth = $dbh->prepare("SELECT * FROM blogs WHERE slug = :slug AND active = 1");
        $sth->bindParam(':slug', $slug, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

}
