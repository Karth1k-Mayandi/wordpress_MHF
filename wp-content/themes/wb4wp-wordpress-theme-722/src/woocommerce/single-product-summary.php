<?php

use Wb4WpTheme\Managers\Customize\CustomizeSettings;
/**
 * Remove the breadcrumbs
 */
add_action( 'init', 'wb4wp_remove_wc_breadcrumbs' );

function wb4wp_remove_wc_breadcrumbs()
{
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}

// Add Breadcrumbs to right single product section

add_action( 'woocommerce_single_product_summary', 'wb4wp_add_wc_breadcrumbs', 0 );

function wb4wp_add_wc_breadcrumbs()
{   if( CustomizeSettings::get_setting( 'wb4wp_wc_single_product_section_show_breadcrumbs_toggle_setting' ) && function_exists( 'woocommerce_breadcrumb' ) ) {
        woocommerce_breadcrumb();
    }
}

// Add additional wrapper divs
add_action( 'woocommerce_before_single_product_summary', 'wb4wp_before_single_product_summary_start', 0 );

if ( !function_exists( 'wb4wp_before_single_product_summary_start' ) ) {
    function wb4wp_before_single_product_summary_start()
    {
        echo "
            <div class='before-product--product-info'>
            <div class='before-product--summary-wrapper'>
        ";
    }
}

add_action( 'woocommerce_before_single_product_summary', 'wb4wp_before_single_product_summary_end', 99 );

if ( !function_exists( 'wb4wp_before_single_product_summary_end' ) ) {
    function wb4wp_before_single_product_summary_end()
    {
        echo '</div>';
    }
}

add_action( 'woocommerce_single_product_summary', 'wb4wp_single_product_summary_end', 99 );

if ( !function_exists( 'wb4wp_single_product_summary_end' ) ) {
    function wb4wp_single_product_summary_end()
    {
        echo '</div>';
    }
}

add_filter( 'woocommerce_product_tabs', 'wb4wp_adjust_product_tabs', 98 );

if ( !function_exists( 'wb4wp_adjust_product_tabs' ) ) {
    function wb4wp_adjust_product_tabs( $tabs )
    {
        if(!CustomizeSettings::get_setting( 'wb4wp_wc_single_product_section_show_description_tab_toggle_setting' )) {
            unset( $tabs['description'] );  
        }

        if(!CustomizeSettings::get_setting( 'wb4wp_wc_single_product_section_show_additional_information_tab_toggle_setting' )) {
            unset( $tabs['additional_information'] );
        }

        if(!CustomizeSettings::get_setting( 'wb4wp_wc_single_product_section_show_reviews_tab_toggle_setting' )) {
            unset( $tabs['reviews'] );
        }

        return $tabs;

    }
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'wb4wp_template_single_meta', 40);

if ( !function_exists( 'wb4wp_template_single_meta' ) ) {
    function wb4wp_template_single_meta()
    {
        if( CustomizeSettings::get_setting( 'wb4wp_wc_single_product_section_show_meta_data_toggle_setting' )  && function_exists( 'woocommerce_template_single_meta' ) ) {
            woocommerce_template_single_meta();
        }
    }
}