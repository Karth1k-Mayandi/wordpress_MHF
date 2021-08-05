<?php


namespace Wb4WpTheme\Managers;


use WP_Post;

class BlogManager
{

    /**
     * Gets the blog overview page URL.
     *
     * @return string
     */
    public static function get_overview_url()
    {
        return get_site_url();
    }

    /**
     * Gets the most recent (published) post URL.
     *
     * @param string $post_status
     *
     * @link https://developer.wordpress.org/reference/functions/get_posts/
     *
     * @return string|null
     */
    public static function get_most_recent_post_url( $post_status = 'publish' )
    {
        $recent_posts = wp_get_recent_posts( [
            'numberposts' => 1,
            'post_status' => $post_status
        ] );

        if ( empty( $recent_posts ) || count( $recent_posts ) === 0 ) {
            return null;
        }

        return get_permalink( current( $recent_posts )['ID'] );
    }

}