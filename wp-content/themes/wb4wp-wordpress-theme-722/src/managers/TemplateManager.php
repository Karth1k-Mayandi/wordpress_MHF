<?php

namespace Wb4WpTheme\Managers;

use Wb4WpTheme\Managers\Customize\CustomizeSettings;

/**
 * Manages the templates
 * Class TemplateManager
 *
 * @package Wb4WpTheme\Managers
 */
final class TemplateManager
{
    const HEADER_TEMPLATE = 'wb4wp_header_section';
    const FOOTER_TEMPLATE = 'wb4wp_footer_section';

    public static function get_header_layout_name($setting_name)
    {
        return self::get_layout_or_get_default($setting_name, [
            'navigation-1',
            'navigation-2',
            'navigation-3',
            'navigation-4',
            'navigation-5'
        ]);
    }
    /**
     * Returns the selected header by
     * the user or a layout provided in $layout
     *
     * @return mixed|null
     */
    public static function get_header()
    {
        $layout = self::get_header_layout_name(self::HEADER_TEMPLATE);

        $template = self::get_layout( $layout );
        $meta_data = get_option( 'wb4wp_metadata', null );
        $global_binding = get_option( 'wb4wp_global_binding', null );

        return self::render( $template, [
            'meta_data' => $meta_data,
            'global_binding' => $global_binding,
            'theme_options' => [],
        ] );
    }

    public static function get_footer_layout_name($setting_name)
    {
        return self::get_layout_or_get_default($setting_name,[
            'footer-1',
            'footer-2',
            'footer-3',
            'footer-4',
            'footer-5',
        ]);
    }
    
    /**
     * Returns the selected footer by
     * the user or a layout provided in $layout
     *
     * @return mixed|null
     */
    public static function get_footer()
    {   
        $layout = self::get_footer_layout_name(self::FOOTER_TEMPLATE);

        $template = self::get_layout( $layout );
        $meta_data = get_option( 'wb4wp_metadata', null );
        $global_binding = get_option( 'wb4wp_global_binding', null );

        return self::render( $template, [
            'meta_data' => $meta_data,
            'global_binding' => $global_binding,
            'theme_options' => [],
        ] );
    }

    private static function get_layout_or_get_default($setting_name, $map)
    {
        $layout = CustomizeSettings::get_setting( $setting_name .'_layout_setting' );

        if ( !in_array( $layout, $map ) ) {
            $layout = $map[0];
        }

        return $layout;
    }

    public static function render_template_assets()
    {
        
        $headerLayoutName = self::get_header_layout_name(self::HEADER_TEMPLATE);
        $footerLayoutName = self::get_footer_layout_name(self::FOOTER_TEMPLATE);

        self::render_asset_by_template($headerLayoutName);
        self::render_asset_by_template($footerLayoutName);
    }

    public static function get_theme_version()
    {
        $theme = wp_get_theme();

        return $theme->version;
    }

    private static function render_asset_by_template($layout_name)
    {
        $style_path = '/dist/'.$layout_name.'/'.$layout_name.'.css';
        $has_style = file_exists(__dir__.'/../..'.$style_path);
        $version = self::get_theme_version();

        if ($has_style) {
            wp_enqueue_style($layout_name, get_template_directory_uri() . $style_path, [], $version );
        }

        $script_path =  '/dist/'.$layout_name.'/'.$layout_name.'.js';
        $hasScript = file_exists(__dir__.'/../..'.$script_path);

        if ($hasScript) {
            wp_enqueue_script($layout_name, get_template_directory_uri() . $script_path, [], $version , true );
        }
    }

    /**
     * Generates the layout path
     * and returns it
     *
     * @param $file_name
     *
     * @return string
     */
    private static function get_layout($file_name)
    {
        $template_dir = get_template_directory();
        return "{$template_dir}/dist/{$file_name}/{$file_name}.php";
    }

    private static function render($template, $variables = [])
    {
        $output = '';

        if (file_exists($template)) {
            extract($variables);
            ob_start();

            include_once($template);

            $output = ob_get_clean();
        }

        return $output;
    }

}