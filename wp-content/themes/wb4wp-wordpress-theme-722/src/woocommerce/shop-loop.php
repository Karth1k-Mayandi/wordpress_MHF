<?php
use Wb4WpTheme\Managers\Customize\CustomizeSettings;

add_action( 'woocommerce_before_shop_loop', 'wb4wp_before_shop_loop_start', 0 );

if ( !function_exists( 'wb4wp_before_shop_loop_start' ) ) {
    function wb4wp_before_shop_loop_start()
    {
        echo '<div class="shop-top-info-wrapper">';
    }
}

add_action( 'woocommerce_before_shop_loop', 'wb4wp_before_shop_loop_end', 99 );

if ( !function_exists( 'wb4wp_before_shop_loop_end' ) ) {
    function wb4wp_before_shop_loop_end()
    {
        echo '</div>';
    }
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_shop_loop', 'wb4wp_woocommerce_catalog_ordering', 30 );

if ( !function_exists( 'wb4wp_woocommerce_catalog_ordering' ) ) {
    function wb4wp_woocommerce_catalog_ordering()
    {
        if( CustomizeSettings::get_setting( 'wb4wp_wc_shop_section_show_sorting_filter_toggle_setting' )  && function_exists( 'woocommerce_template_single_meta' ) ) {
            woocommerce_catalog_ordering();
        }
    }
}