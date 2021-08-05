<?php


namespace Wb4WpTheme\Helpers;


class FontHelper
{
    private static $instance;

    private $heading_fonts;
    private $body_fonts;

    public static function instance()
    {
        if ( !isset( self::$instance ) ) {
            self::$instance = new FontHelper();
            self::$instance->initialize();;
        }

        return self::$instance;
    }

    public function get_heading_fonts()
    {
        return $this->heading_fonts;
    }

    public function get_body_fonts()
    {
        return $this->body_fonts;
    }

    private function __construct()
    {
    }

    private function initialize()
    {
        $font_styles_json = file_get_contents( __DIR__ . '/font-styles.json', true );
        $font_styles = json_decode( $font_styles_json );

        $this->heading_fonts = [];
        $this->body_fonts = [];

        $font_styles_used_in_pair = [];
        foreach ( $font_styles as $font_name => $font_config ) {
            if ( empty( $font_config->pair->name ) ) {
                continue;
            }

            $this->heading_fonts[] = [
                'name' => current( explode( ':', $font_name ) ),
                'weight' => $font_config->weight,
            ];

            $font_styles_used_in_pair[$font_config->pair->name] = true;
        }

        foreach ( $font_styles as $font_name => $font_config ) {
            if ( empty( $font_styles_used_in_pair[$font_name] ) ) {
                continue;
            }

            $this->body_fonts[] = [
                'name' => current( explode( ':', $font_name ) ),
                'weight' => $font_config->weight,
            ];
        }
    }

}