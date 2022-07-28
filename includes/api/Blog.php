<?php

/**
 * 
 */
class Blog
{

    /**
     * 
     */
    public static function selectALL($category)
    {
        global $CONFIG;

        $blogs = [];

        foreach (glob($_SERVER['DOCUMENT_ROOT'] . $CONFIG->APPPATH . '/application/metadata/name/*.ini', GLOB_BRACE) as $file)
        {
            $blog = new Config();
            $blog->load($file);
            $blog->BLOG_SLUG = pathinfo($file, PATHINFO_FILENAME);

            if (str_contains($blog->CATEGORY, $category))
            {
                $blogs[] = $blog;
            }
        }

        return $blogs;
    }

}
