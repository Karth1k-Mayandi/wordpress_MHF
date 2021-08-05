<?php

namespace Wb4WpTheme\Managers\Customize;

use Wb4WpTheme\Managers\Customize\Controls\ToggleControl;
use WP_Customize_Color_Control;
use WP_Customize_Manager;

abstract class CustomizeControls
{
    /**
     * The {@link WP_Customize_Manager} instance.
     *
     * @var WP_Customize_Manager
     */
    private $wp_customize;

    public function __construct( $wp_customize )
    {
        $this->wp_customize = $wp_customize;
    }

    public static function get_full_section_name( $section_name )
    {
        return "wb4wp_{$section_name}_section";
    }

    public static function get_full_setting_name( $full_section_name, $setting_name )
    {
        return "{$full_section_name}_{$setting_name}_setting";
    }

    protected function register_panel( $panel_name, $title, $description, $priority = 2 )
    {
        $full_panel_name = "wb4wp_{$panel_name}_panel";
        $this->wp_customize->add_panel( $full_panel_name, [
            'priority' => $priority,
            'title' => $title,
            'description' => $description,
        ] );
        return $full_panel_name;
    }

    protected function register_section( $section_name, $title, $description, $priority = 2, $panel = null )
    {
        $full_section_name = $this->get_full_section_name( $section_name );
        $this->wp_customize->add_section( $full_section_name, [
            'priority' => $priority,
            'title' => $title,
            'description' => $description,
            'panel' => $panel,
        ] );

        return $full_section_name;
    }

    protected function register_section_settings( $section_name, $section_settings )
    {
        foreach ( $section_settings as $setting_name => $setting ) {
            $this->register_section_setting(
                $section_name,
                $setting_name,
                $setting
            );
        }
    }

    protected function register_composite_section_settings( $section_name, $composite_section_settings )
    {
        foreach ( $composite_section_settings as $composite_section => $section_settings ) {
            $composite_section_name = "{$section_name}:{$composite_section}";
            $this->register_section_settings( $composite_section_name, $section_settings );
        }
    }

    private function register_section_setting( $section_name, $setting_name, $setting )
    {
        $this->add_setting_with_control(
            $section_name,
            $setting_name,
            $setting
        );
    }

    /**
     * Adds a setting and a control to the Wp Theme customizer api.
     *
     * @param $section_name string
     * @param $setting_name string
     * @param $setting array
     */
    private function add_setting_with_control( $section_name, $setting_name, $setting )
    {
        $section_is_composite = strpos( $section_name, '_section:' ) !== false;
        if ( $section_is_composite ) {
            $composite_section_name_segments = explode( ':', $section_name );
            $section_name = $composite_section_name_segments[0];
            $child_section_name = $composite_section_name_segments[1];

            $full_child_section_name = $this->get_full_section_name( $child_section_name );
            $full_setting_name = self::get_full_setting_name( $full_child_section_name, $setting_name );
        } else {
            $full_setting_name = self::get_full_setting_name( $section_name, $setting_name );
        }

        $default_value = $setting['default'];

        switch ( $setting['type'] ) {
            case 'color':
                $this->wp_customize->add_setting( $full_setting_name, [
                    'type' => 'option',
                    'default' => $default_value,
                    'transport' => 'refresh',
                    'sanitize_callback' => 'sanitize_hex_color',
                ] );

                $this->wp_customize->add_control(
                    new WP_Customize_Color_Control(
                        $this->wp_customize,
                        "{$full_setting_name}_control",
                        array_merge( $setting, [
                            'section' => $section_name,
                            'settings' => $full_setting_name
                        ] )
                    )
                );
                break;

            case 'toggle':
                $this->wp_customize->add_setting( $full_setting_name, [
                    'type' => 'option',
                    'default' => $default_value,
                    'transport' => 'refresh',
                    'sanitize_callback' => function ( $checked ) {
                        return $checked ? 'true' : 'false';
                    }
                ] );

                $this->wp_customize->add_control( new ToggleControl(
                    $this->wp_customize,
                    $full_setting_name,
                    array_merge( $setting, [
                        'section' => $section_name,
                        'settings' => $full_setting_name,
                    ] )
                ) );
                break;

            default:
                $this->wp_customize->add_setting( $full_setting_name, [
                    'type' => 'option',
                    'default' => $default_value,
                    'transport' => 'refresh'
                ] );

                $this->wp_customize->add_control( "{$full_setting_name}_control", array_merge( $setting, [
                    'section' => $section_name,
                    'settings' => $full_setting_name
                ] ) );
        }
    }

}