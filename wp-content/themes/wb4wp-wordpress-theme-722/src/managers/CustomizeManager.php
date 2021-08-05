<?php

namespace Wb4WpTheme\Managers;

use Wb4WpTheme\Managers\Customize\CustomizeControls;
use Wb4WpTheme\Managers\Customize\CustomizeSettings;

final class CustomizeManager extends CustomizeControls
{

    public function register_controls()
    {
        $this->add_header_controls();
        $this->add_footer_controls();

        $this->add_style_controls();
        $this->add_logo_controls();

        $this->add_blog_pages_controls();
        $this->add_woo_commerce_pages_controls();

        $this->add_contact_information_controls();
        $this->add_social_accounts_controls();
    }

    private function add_header_controls()
    {
        $section_settings = CustomizeSettings::get_setting_list()['header'];

        $section_name = $this->register_section(
            'header',
            __( 'Navigation', 'wb4wp_theme' ),
            __( 'Customize your header navigation', 'wb4wp_theme' )
        );

        $this->register_section_settings( $section_name, $section_settings );
    }

    private function add_footer_controls()
    {
        $section_settings = CustomizeSettings::get_setting_list()['footer'];

        $section_name = $this->register_section(
            'footer',
            __( 'Footer', 'wb4wp_theme' ),
            __( 'Customize your footer', 'wb4wp_theme' ),
            3
        );

        if ( !WordpressManager::has_sitemap() ) {
            unset( $section_settings['link_to_sitemap'] );
        }

        $this->register_section_settings( $section_name, $section_settings );
    }

    private function add_style_controls()
    {
        $color_section_settings = CustomizeSettings::get_setting_list()['color'];
        $fonts_section_settings = CustomizeSettings::get_setting_list()['fonts'];

        $section_name = $this->register_section(
            'style',
            __( 'Style', 'wb4wp_theme' ),
            null,
            3
        );

        $this->register_composite_section_settings( $section_name, [
            'color' => $color_section_settings,
            'fonts' => $fonts_section_settings
        ] );
    }

    private function add_logo_controls()
    {
        $section_settings = CustomizeSettings::get_setting_list()['logo'];

        $section_name = $this->register_section(
            'logo',
            __( 'Logo', 'wb4wp_theme' ),
            __( 'Customize your logo', 'wb4wp_theme' ),
            3
        );

        $this->register_section_settings( $section_name, $section_settings );
    }

    private function add_blog_pages_controls()
    {
        $panel_name = $this->register_panel(
            'blog_pages',
            __( 'Blog pages', 'wb4wp_theme' ),
            null,
            4
        );

        $single_post_settings = CustomizeSettings::get_setting_list()['single_post'];
        $single_post_section_name = $this->register_section(
            'single_post',
            __( 'Single post', 'wb4wp_theme' ),
            __( 'Customize the page for a single blog post.', 'wb4wp_theme' ),
            4,
            $panel_name
        );

        $this->register_section_settings( $single_post_section_name, $single_post_settings );

//        TODO: Re-add for Theme v1.1
//        $blog_overview_settings = CustomizeSettings::get_setting_list()['blog_overview'];
//        $blog_overview_section_name = $this->register_section(
//            'blog_overview',
//            __( 'Blog Overview', 'wb4wp_theme' ),
//            __( 'Customize the overview for your blog posts.', 'wb4wp_theme' ),
//            4,
//            $panel_name
//        );
//
//        $this->register_section_settings( $blog_overview_section_name, $blog_overview_settings );
    }

    private function add_woo_commerce_pages_controls()
    {
        $panel_name = $this->register_panel(
            'woo_commerce-pages',
            __( 'WooCommerce pages', 'wb4wp_theme' ),
            null,
            5
        );

        $single_product_settings = CustomizeSettings::get_setting_list()['woocommerce_single_product'];
        $single_product_section_name = $this->register_section(
            'wc_single_product',
            __( 'Product page', 'wb4wp_theme' ),
            __( 'Customize the page for a single product.', 'wb4wp_theme' ),
            5,
            $panel_name
        );

        $this->register_section_settings( $single_product_section_name, $single_product_settings );

        $products_list_settings = CustomizeSettings::get_setting_list()['woocommerce_shop'];
        $products_list_section_name = $this->register_section(
            'wc_shop',
            __( 'Shop page', 'wb4wp_theme' ),
            __( 'Customize your shop pages / overview of products.', 'wb4wp_theme' ),
            4,
            $panel_name
        );

        $this->register_section_settings( $products_list_section_name, $products_list_settings );

        $products_list_settings = CustomizeSettings::get_setting_list()['woocommerce_shopping_cart'];
        $products_list_section_name = $this->register_section(
            'wc_shopping_cart',
            __( 'Shopping cart page', 'wb4wp_theme' ),
            __( 'Customize the shopping cart page', 'wb4wp_theme' ),
            6,
            $panel_name
        );

        $this->register_section_settings( $products_list_section_name, $products_list_settings );

        $products_list_settings = CustomizeSettings::get_setting_list()['woocommerce_checkout'];
        $products_list_section_name = $this->register_section(
            'wc_checkout',
            __( 'Checkout page', 'wb4wp_theme' ),
            __( 'Customize the checkout page', 'wb4wp_theme' ),
            6,
            $panel_name
        );

        $this->register_section_settings( $products_list_section_name, $products_list_settings );
    }

    private function add_contact_information_controls()
    {
        $section_settings = CustomizeSettings::get_setting_list()['contact_information'];

        $section_name = $this->register_section(
            'contact_information',
            __( 'My business', 'wb4wp_theme' ),
            __( 'Customize your contact information', 'wb4wp_theme' ),
            5
        );

        $this->register_section_settings( $section_name, $section_settings );
    }

    private function add_social_accounts_controls()
    {
        $section_settings = CustomizeSettings::get_setting_list()['social_accounts'];

        $section_name = $this->register_section(
            'social_accounts',
            __( 'Social accounts', 'wb4wp_theme' ),
            __( "Add the URLs to your social accounts here. These will be used when using the 'Social buttons' option in the header and/or footer, allowing users to go to your social accounts directly.", 'wb4wp_theme' ),
            5
        );

        $this->register_section_settings( $section_name, $section_settings );
    }

}
