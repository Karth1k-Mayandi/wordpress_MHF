<?php

namespace Wb4WpTheme\Managers;

use Wb4WpTheme\Managers\Customize\CustomizeSettings;

/**
 * Manages the templates
 * Class ColorManager
 *
 * @package Wb4WpTheme\Managers
 */
final class ColorManager
{
    const COLOR_BLACK = '#000000';
    const COLOR_WHITE = '#ffffff';
    // https://www.w3.org/TR/WCAG20/#visual-audio-contrast-contrast
    const MIN_CONTRAST_RATIO = 4.5;

    public static function get_background_color_by_name ($color_name) {
        return CustomizeSettings::get_setting($color_name);
    }

    public static function get_title_color_on_background ($color_name, $background_color_name) {
        $primary_color = CustomizeSettings::get_setting($color_name);

        if (!$background_color_name) {
            $background_color_name = 'wb4wp_color_section_background_setting';
        }

        $background_color = CustomizeSettings::get_setting($background_color_name);

        if (ColorManager::calculateLuminosityRatio($background_color, $primary_color) >= self::MIN_CONTRAST_RATIO) {
            return $primary_color;
        }

        // Fallbacks
        $primary_color = CustomizeSettings::get_setting( 'wb4wp_color_section_accent1_setting');
        $primary2_color = CustomizeSettings::get_setting( 'wb4wp_color_section_accent2_setting');
        $text_color = CustomizeSettings::get_setting( 'wb4wp_color_section_text_setting');

        if (ColorManager::calculateLuminosityRatio($background_color, $primary_color) >= self::MIN_CONTRAST_RATIO) {
            return $primary_color;
        } else if (ColorManager::calculateLuminosityRatio($background_color, $primary2_color) >= self::MIN_CONTRAST_RATIO) {
            return $primary2_color;
        } else if (ColorManager::calculateLuminosityRatio($background_color, $text_color) >= self::MIN_CONTRAST_RATIO) {
            return $text_color;
        } else if (ColorManager::calculateLuminosity($background_color, self::COLOR_BLACK) > 0.3) {
            return self::COLOR_BLACK;
        } else {
            return self::COLOR_WHITE;
        }
    }


    public static function get_text_color_on_background($color_name)
    {
        $background_color = CustomizeSettings::get_setting($color_name);

        // > 0.5 == color is more white then black. so we need to make it "darker"
        if(ColorManager::calculateLuminosity($background_color) > 0.3) {
            // 10% color is light so text must be black
            return self::COLOR_BLACK;
        } else {
            // 10% lighter
            return self::COLOR_WHITE;
        }
    }

    public static function get_text_color_for_color($color)
    {
        // > 0.5 == color is more white then black. so we need to make it "darker"
        if(ColorManager::calculateLuminosity($color) > 0.3) {
            // 10% color is light so text must be black
            return self::COLOR_BLACK;
        } else {
            // 10% lighter
            return self::COLOR_WHITE;
        }
    }

    public static function get_primary_color()
    {
        $background_color = CustomizeSettings::get_setting( 'wb4wp_color_section_background_setting');
        $primary_color = CustomizeSettings::get_setting( 'wb4wp_color_section_accent1_setting');
        $primary2_color = CustomizeSettings::get_setting( 'wb4wp_color_section_accent2_setting');
        $text_color = CustomizeSettings::get_setting( 'wb4wp_color_section_text_setting');

        if (ColorManager::calculateLuminosityRatio($background_color, $primary_color) >= self::MIN_CONTRAST_RATIO) {
            return $primary_color;
        } else if (ColorManager::calculateLuminosityRatio($background_color, $primary2_color) >= self::MIN_CONTRAST_RATIO) {
            return $primary2_color;
        } else if (ColorManager::calculateLuminosityRatio($background_color, $text_color) >= self::MIN_CONTRAST_RATIO) {
            return $text_color;
        } else if (ColorManager::calculateLuminosity($background_color, self::COLOR_BLACK) > 0.5) {
            return self::COLOR_BLACK;
        } else {
            return self::COLOR_WHITE;
        }
    }

    public static function get_text_color()
    {
        $background_color = CustomizeSettings::get_setting( 'wb4wp_color_section_background_setting');
        $text_color = CustomizeSettings::get_setting( 'wb4wp_color_section_text_setting');
        $primary_color = CustomizeSettings::get_setting( 'wb4wp_color_section_accent1_setting');
        $primary2_color = CustomizeSettings::get_setting( 'wb4wp_color_section_accent2_setting');

        if (ColorManager::calculateLuminosityRatio($background_color, $text_color) >= self::MIN_CONTRAST_RATIO) {
            return $text_color;
        } else if (ColorManager::calculateLuminosityRatio($background_color, $primary_color) >= self::MIN_CONTRAST_RATIO) {
            return $primary_color;
        } else if (ColorManager::calculateLuminosityRatio($background_color, $primary2_color) >= self::MIN_CONTRAST_RATIO) {
            return $primary2_color;
        } else if (ColorManager::calculateLuminosity($background_color, self::COLOR_BLACK) > 0.5) {
            return self::COLOR_BLACK;
        } else {
            return self::COLOR_WHITE;
        }
    }

    public static function get_color_softer($text_color)
    {
        if ($text_color == null) {
            $text_color = ColorManager::get_text_color();
        }

        return ColorManager::setOpacityInColor($text_color, 0.75);
    }

    public static function get_color_stronger($text_color)
    {
        if ($text_color == null) {
            $text_color = ColorManager::get_text_color();
        }

        return ColorManager::adjustBrightness($text_color, -0.10);
    }

    public static function get_primary_color_text()
    {
        $primary_color = ColorManager::get_primary_color();

        // > 0.5 == color is more white then black. so we need to make it "darker"
        if(ColorManager::calculateLuminosity($primary_color) > 0.3) {
            // 10% color is light so text must be black
            return self::COLOR_BLACK;
        } else {
            // 10% lighter
            return self::COLOR_WHITE;
        }
    }

    public static function get_primary_color_border()
    {
        $primary_color = ColorManager::get_primary_color();

        // > 0.5 == color is more white then black. so we need to make it "darker"
        if(ColorManager::calculateLuminosity($primary_color) > 0.3) {
            // 10% color is light so text must be black
            return 'rgba(0,0,0,0.1)';
        } else {
            // 10% lighter
            return 'rgb(255,255,255,.1)';
        }
    }

    public static function get_background_color_strong()
    {
        $background_color = CustomizeSettings::get_setting( 'wb4wp_color_section_background_setting');

        // > 0.5 == color is more white then black. so we need to make it "darker"
        if(ColorManager::calculateLuminosity($background_color) > 0.5) {
            // 10% DARKER
            return ColorManager::adjustBrightness($background_color, -0.10);
        } else {
            // 10% lighter
            return ColorManager::adjustBrightness($background_color, 0.10);
        }
    }


    public static function get_background_color_stronger()
    {
        $background_color = CustomizeSettings::get_setting( 'wb4wp_color_section_background_setting');

        // > 0.5 == color is more white then black. so we need to make it "darker"
        if(ColorManager::calculateLuminosity($background_color) > 0.5) {
            // 10% DARKER
            return ColorManager::adjustBrightness($background_color, -0.20);
        } else {
            // 10% lighter
            return ColorManager::adjustBrightness($background_color, 0.20);
        }
    }

    public static function get_background_color_lighter()
    {
        $primary_color = CustomizeSettings::get_setting( 'wb4wp_color_section_background_setting');

        // > 0.5 == color is more white then black. so we need to make it "darker"
        if(ColorManager::calculateLuminosity($primary_color) < 0.5) {
            // 10% DARKER
            return ColorManager::adjustBrightness($primary_color, -0.10);
        } else {
            // 10% lighter
            return ColorManager::adjustBrightness($primary_color, 0.10);
        }
    }

    public static function get_primary_color_stronger()
    {
        $primary_color = ColorManager::get_primary_color();

        if(ColorManager::calculateLuminosity($primary_color) > 0.3) {
            // 10% DARKER
            $primary_color_darker = ColorManager::adjustBrightness($primary_color, -0.28);

            if (ColorManager::calculateLuminosityRatio(self::COLOR_BLACK, $primary_color_darker) >= self::MIN_CONTRAST_RATIO) {
                return $primary_color_darker;
            }

            return self::COLOR_WHITE;
        } else {
            // 10% lighter
            $primary_color_lighter = ColorManager::adjustBrightness($primary_color, 0.20);

            if (ColorManager::calculateLuminosityRatio(self::COLOR_WHITE, $primary_color_lighter) <= self::MIN_CONTRAST_RATIO) {
                return $primary_color_lighter;
            }

            return self::COLOR_BLACK;
        }
    }

    public static function get_primary_color_light()
    {
        $primary_color = ColorManager::get_primary_color();

        // > 0.5 == color is more white then black. so we need to make it "darker"
        if(ColorManager::calculateLuminosity($primary_color) > 0.5) {
            // 10% DARKER
            return ColorManager::adjustBrightness($primary_color, -0.10);
        } else {
            // 10% lighter
            return ColorManager::adjustBrightness($primary_color, 0.10);
        }
    }

    public static function get_primary_color_lighter()
    {
        $primary_color = ColorManager::get_primary_color();

        if(ColorManager::calculateLuminosity($primary_color) > 0.5) {
            // 20% DARKER
            return ColorManager::adjustBrightness($primary_color, -0.20);
        } else {
            // 20% lighter
            return ColorManager::adjustBrightness($primary_color, 0.20);
        }
    }

    public static function get_primary_color_lightest()
    {
        $primary_color = ColorManager::get_primary_color();

        if(ColorManager::calculateLuminosity($primary_color) > 0.5) {
            // 20% DARKER
            return ColorManager::adjustBrightness($primary_color, -0.50);
        } else {
            // 20% lighter
            return ColorManager::adjustBrightness($primary_color, 0.50);
        }
    }

    public static function get_border_color()
    {
        $background_color = CustomizeSettings::get_setting( 'wb4wp_color_section_background_setting');

        // > 0.5 == color is more white then black. so we need to make it "darker"
        if(ColorManager::calculateLuminosity($background_color) < 0.5) {
            // light border
            return 'rgb(255,255,255,.1)';
        } else {
            // dark border
            return 'rgba(0,0,0,0.1)';
        }
    }

    /**
     * Increases or decreases the brightness of a color by a percentage of the current brightness.
     *
     * @param string  $hexCode        Supported formats: `#FFF`, `#FFFFFF`, `FFF`, `FFFFFF`
     * @param float   $adjustPercent  A number between -1 and 1. E.g. 0.3 = 30% lighter; -0.4 = 40% darker.
     *
     * @return string
     */
    public static function adjustBrightness($hexCode, $adjustPercent) {
        $hexCode = ltrim($hexCode, '#');

        if (strlen($hexCode) == 3) {
            $hexCode = $hexCode[0] . $hexCode[0] . $hexCode[1] . $hexCode[1] . $hexCode[2] . $hexCode[2];
        }

        $hexCode = array_map('hexdec', str_split($hexCode, 2));

        foreach ($hexCode as & $color) {
            $adjustableLimit = $adjustPercent < 0 ? $color : 255 - $color;
            $adjustAmount = ceil($adjustableLimit * $adjustPercent);

            $color = str_pad(dechex($color + $adjustAmount), 2, '0', STR_PAD_LEFT);
        }

        return '#' . implode($hexCode);
    }

    // calculates the luminosity of an given RGB color
    // the color code must be in the format of RRGGBB
    // the luminosity equations are from the WCAG 2 requirements
    // http://www.w3.org/TR/WCAG20/#relativeluminancedef

    private static function calculateLuminosity($color) {
        // remove #
        $color = ltrim($color, '#');

        $r = hexdec(substr($color, 0, 2)) / 255; // red value
        $g = hexdec(substr($color, 2, 2)) / 255; // green value
        $b = hexdec(substr($color, 4, 2)) / 255; // blue value
        if ($r <= 0.03928) {
            $r = $r / 12.92;
        } else {
            $r = pow((($r + 0.055) / 1.055), 2.4);
        }

        if ($g <= 0.03928) {
            $g = $g / 12.92;
        } else {
            $g = pow((($g + 0.055) / 1.055), 2.4);
        }

        if ($b <= 0.03928) {
            $b = $b / 12.92;
        } else {
            $b = pow((($b + 0.055) / 1.055), 2.4);
        }
        // calc luminosity
        return 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;
    }

    // calculates the luminosity ratio of two colors
    // the luminosity ratio equations are from the WCAG 2 requirements
    // http://www.w3.org/TR/WCAG20/#contrast-ratiodef

    private static function calculateLuminosityRatio($color1, $color2) {
        $l1 = ColorManager::calculateLuminosity($color1);
        $l2 = ColorManager::calculateLuminosity($color2);

        if ($l1 > $l2) {
            $ratio = (($l1 + 0.05) / ($l2 + 0.05));
        } else {
            $ratio = (($l2 + 0.05) / ($l1 + 0.05));
        }
        return $ratio;
    }

    /**
     * Convert hexdec color string to rgb(a) string
     *
     * If we want make opacity, we have to convert hexadecimal into rgb(a), because wordpress customizer give to us hexadecimal colour
     */
    private static function setOpacityInColor( $color, $opacity = false ) {
        $default = 'rgb( 0, 0, 0 )';

        /**
         * Return default if no color provided
         */
        if( empty( $color ) ) {
            return $default;
        }
        $color = ltrim($color, '#');

        /**
         * Check if color has 6 or 3 characters and get values
         */
        if ( strlen($color) == 6 ) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }

        $rgb =  array_map( 'hexdec', $hex );

        /**
         * Check if opacity is set(rgba or rgb)
         */
        if( $opacity ) {
            if( abs( $opacity ) > 1 ) {
                $opacity = 1.0;
            }

            $output = 'rgba( ' . implode( "," ,$rgb ) . ',' . $opacity . ' )';
        } else {
            $output = 'rgb( ' . implode( "," , $rgb ) . ' )';
        }

        /**
         * Return rgb(a) color string
         */
        return $output;
    }

}