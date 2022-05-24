<?php

/**
 * 
 */
class HTML
{

    /**
     * 
     */
    public static function menu_link($link, $name)
    {
        echo ''
        . '<a href="' . create_link($link) . '" class="p-08 py-0' . (strpos(get_link(), create_link($link)) !== false ? ' active' : '') . '">' . $name . '</a>';
    }

    /**
     * 
     */
    public static function side_link($link, $name, $subtitle)
    {
        echo ''
        . '<a href="' . create_link($link) . '" class="card flex-col flex-04 p-08' . (create_link($link) == get_link() ? ' active' : '') . '">'
        . '<p class="title">' . $name . '</p>'
        . '<p class="subtitle">' . $subtitle . '</p>'
        . '</a>';
    }

    /**
     * 
     */
    public static function card_two_column($image, $name, $desc, $subtitle, $tags, $link)
    {
        echo ''
        . '<div class="card flex-row flex-04">'
        . '<img src="' . $image . '" alt="' . $name . '" style="height: 128px">'
        . '<div class="flex-col flex-fill flex-08 p-08">'
        . '<h3>' . $name . '</h3>'
        . '<p class="subtitle">' . $subtitle . '</p>'
        . '<p>' . $desc . '</p>'
        . '<div class="flex-row flex-04">';

        foreach ($tags as $tag)
        {
            echo '<div class="tag">' . ucwords(str_replace('-', ' ', $tag)) . '</div>';
        }

        echo ''
        . '</div>'
        . '<div class="flex-fill"></div>'
        . '</div>'
        . '<a class="stretch" href="' . create_link($link) . '"></a>'
        . '</div>';
    }

}
