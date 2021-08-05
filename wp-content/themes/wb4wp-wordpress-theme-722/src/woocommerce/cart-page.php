<?php
use Wb4WpTheme\Managers\Customize\CustomizeSettings;

add_filter( 'woocommerce_cart_item_thumbnail', 'wb4wp_woocommerce_remove_item_thumbnail' );

if ( !function_exists( 'wb4wp_woocommerce_remove_item_thumbnail' ) ) {
  function wb4wp_woocommerce_remove_item_thumbnail($thumbnail)
  {
      if( CustomizeSettings::get_setting( 'wb4wp_wc_shopping_cart_section_show_product_image_toggle_setting' ) ) {
        return $thumbnail;
      }

      return false;
  }
} 

add_filter( 'woocommerce_coupons_enabled', 'wb4wp_woocommerce_cart_coupon' );

if ( !function_exists( 'wb4wp_woocommerce_cart_coupon' ) ) {
    function wb4wp_woocommerce_cart_coupon()
    {
        return CustomizeSettings::get_setting( 'wb4wp_wc_shopping_cart_section_show_coupon_field_toggle_setting' );
    }
}