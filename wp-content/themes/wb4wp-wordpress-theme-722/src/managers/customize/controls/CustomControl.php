<?php

namespace Wb4WpTheme\Managers\Customize\Controls;

use WP_Customize_Control;

class CustomControl extends WP_Customize_Control
{

    /**
     * Gets the URI for a stylesheet by name.
     *
     * Example:
     * <pre>
     *   get_stylesheet_uri( 'toggle-control' );
     * </pre>
     *
     * @param $stylesheet_name string
     *
     * @return string
     */
    protected function get_stylesheet_uri( $stylesheet_name )
    {
        $template_directory_uri = get_template_directory_uri();
        return "{$template_directory_uri}/src/managers/customize/controls/{$stylesheet_name}.css";
    }

}