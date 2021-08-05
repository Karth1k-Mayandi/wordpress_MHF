<?php


namespace Wb4WpTheme\Managers;


class WordpressManager
{

    public static function has_sitemap()
    {
        return get_option( 'blog_public' );
    }

    public static function get_sitemap_url()
    {
        return get_site_url( null, '/sitemap.xml' );
    }

}