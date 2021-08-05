<?php

use Wb4WpTheme\Managers\ColorManager;
use Wb4WpTheme\Managers\Customize\CustomizeSettings;

function get_font_setting( $full_setting_name )
{
    $setting = CustomizeSettings::get_setting( $full_setting_name );
    $exploded = explode( ':', $setting );
    return [
        'font' => $exploded[0],
        'weight' => $exploded[1]
    ];
}

$fonts_body_setting = get_font_setting( 'wb4wp_fonts_section_body_setting' );
$fonts_heading_setting = get_font_setting( 'wb4wp_fonts_section_heading_setting' );
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title>
        <?php
        $metadata = get_option( 'wb4wp_metadata', null );
        echo (!empty( $metadata ) && !empty( $metadata['siteName'] )) ? $metadata['siteName'] : get_bloginfo( 'name' );
        ?>
    </title>
    <style>
        /** CSS Values 2 */
        :root {
            --wb4wp-background: <?= CustomizeSettings::get_setting( 'wb4wp_color_section_background_setting') ?>;
            --wb4wp-background-stronger: <?= ColorManager::get_background_color_strong() ?>;
            --wb4wp-background-strongest: <?= ColorManager::get_background_color_stronger() ?>;
            --wb4wp-background-lighter: <?= ColorManager::get_background_color_lighter() ?>;

            --wb4wp-text-color: <?= ColorManager::get_title_color_on_background('wb4wp_color_section_text_setting', null) ?>;
            --wb4wp-text-color-softer: <?= ColorManager::get_color_softer(null) ?>;
            --wb4wp-text-color-20: rgba(33, 33, 33, .2);
            --wb4wp-text-color-75: rgba(33, 33, 33, .75);
            --wb4wp-text-color-contrast: rgb(255, 255, 255);

            --wb4wp-accent1: <?= ColorManager::get_background_color_by_name('wb4wp_color_section_accent1_setting', null) ?>;
            --wb4wp-text-accent1: <?= ColorManager::get_title_color_on_background('wb4wp_color_section_text_setting', 'wb4wp_color_section_accent1_setting') ?>;
            --wb4wp-text-accent1-softer: <?= ColorManager::get_color_softer(ColorManager::get_title_color_on_background('wb4wp_color_section_text_setting', 'wb4wp_color_section_accent1_setting')) ?>;
            --wb4wp-accent1-stronger: <?= ColorManager::get_color_stronger(ColorManager::get_background_color_by_name('wb4wp_color_section_accent1_setting', null)) ?>;
            --wb4wp-title-accent1: <?= ColorManager::get_title_color_on_background('wb4wp_color_section_accent2_setting', 'wb4wp_color_section_accent1_setting') ?>;
            --wb4wp-title-accent1-text: <?= ColorManager::get_text_color_for_color(ColorManager::get_title_color_on_background('wb4wp_color_section_accent2_setting', 'wb4wp_color_section_accent1_setting')) ?>;

            --wb4wp-accent2: <?= ColorManager::get_background_color_by_name('wb4wp_color_section_accent2_setting', null) ?>;
            --wb4wp-text-accent2: <?= ColorManager::get_text_color_on_background('wb4wp_color_section_accent2_setting') ?>;
            --wb4wp-text-accent2-softer: <?= ColorManager::get_color_softer(ColorManager::get_text_color_on_background('wb4wp_color_section_accent2_setting')) ?>;
            --wb4wp-accent2-stronger: <?= ColorManager::get_color_stronger(ColorManager::get_background_color_by_name('wb4wp_color_section_accent2_setting', null)) ?>;
            --wb4wp-title-accent2: <?= ColorManager::get_title_color_on_background('wb4wp_color_section_accent2_setting', 'wb4wp_color_section_accent2_setting') ?>;

            --wb4wp-primary-color: <?= ColorManager::get_primary_color() ?>;
            --wb4wp-primary-color-text: <?= ColorManager::get_primary_color_text() ?>;
            --wb4wp-primary-color-light: <?= ColorManager::get_primary_color_light() ?>;
            --wb4wp-primary-color-lighter: <?= ColorManager::get_primary_color_lighter() ?>;
            --wb4wp-primary-color-lightest: <?= ColorManager::get_primary_color_lightest() ?>;
            --wb4wp-primary-color-border: <?= ColorManager::get_primary_color_border() ?>;
            --wb4wp-primary-color-stronger: <?= ColorManager::get_primary_color_stronger() ?>;

            --wb4wp-border-color: <?= ColorManager::get_border_color() ?>;

            --wb4wp-font-body: '<?= $fonts_body_setting['font']; ?>';
            --wb4wp-font-body-weight: <?= $fonts_body_setting['weight']; ?>;
            --wb4wp-font-heading: '<?= $fonts_heading_setting['font']; ?>';
            --wb4wp-font-heading-weight: <?= $fonts_heading_setting['weight']; ?>;
            --wb4wp-font-size-override: <?= ((float)CustomizeSettings::get_setting( 'wb4wp_fonts_section_font_size_setting' ) * 100) . "%" ?>;
            --wb4wp-font-size-factor: <?= (float)CustomizeSettings::get_setting( 'wb4wp_fonts_section_font_size_setting' ) ?>;

        }

        body #page.kv-site .kv-page-content {
            --kv-ee-global-font-size-factor: var(--wb4wp-font-size-factor);
            --kv-ee-heading-font-family: var(--wb4wp-font-heading);
            --kv-ee-heading-font-weight: var(--wb4wp-font-heading-weight);
            --kv-ee-body-font-family: var(--wb4wp-font-body);
            --kv-ee-body-font-weight: var(--wb4wp-font-body-weight);
        }
    </style>

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?display=swap&family=<?= str_replace( ' ', '+', CustomizeSettings::get_setting( 'wb4wp_fonts_section_body_setting' ) ) ?>|<?= str_replace( ' ', '+', CustomizeSettings::get_setting( 'wb4wp_fonts_section_heading_setting' ) ) ?>' />

    <?php wp_head(); ?>

    <?php
    $post = get_post();

    $assets_path = ABSPATH . 'wp-content/uploads/wb4wp-page-assets/';

    if ( ! file_exists( $assets_path ) && defined( WB4WP_PLUGIN_DIR ) ) {
        $assets_path = WB4WP_PLUGIN_DIR . '/page-assets/';
    }

    if ( !empty( $post ) && file_exists( $assets_path ) ) {
        $asset_file = $assets_path . 'assets_' . $post->ID . '.json';

        if ( file_exists( $asset_file ) ) {
            $assets = json_decode( file_get_contents( $asset_file ) );

            if ( !empty( $assets ) ) {
                if ( !empty( $assets->fonts ) ) {
                    echo "<link rel='stylesheet' href='" . $assets->fonts . "'>";
                }

                if ( !empty( $assets->baseStyle ) ) {
                    echo "<style type='text/css'>" . $assets->baseStyle . "</style>";
                }

                if ( !empty( $assets->siteModel ) ) {
                    // Set partnerId to 999 for now. TODO make a useHosting api setting
                    echo "<script>window._isPublished=true;window._site=" . json_encode( $assets->siteModel ) . ";window._site.partnerId = 999;</script>";
                }

                if ( !empty( $assets->featureScript ) ) {
                    echo "<script>" . $assets->featureScript . "</script>";
                }
            }
        }
    }
    ?>

    <link href="https://components.mywebsitebuilder.com/fonts/font-awesome.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?= Wb4WpTheme\Managers\TemplateManager::get_header(); ?>

	<div id="page" class="site kv-site kv-main">
