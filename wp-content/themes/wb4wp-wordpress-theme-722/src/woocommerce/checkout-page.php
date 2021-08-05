<?php
use Wb4WpTheme\Managers\Customize\CustomizeSettings;

// TODO: Add in next version
// add_filter( 'woocommerce_checkout_coupon_message', 'wb4wp_woocommerce_checkout_coupon_message' );

// if ( !function_exists( 'wb4wp_woocommerce_checkout_coupon_message' ) ) {
//     function wb4wp_woocommerce_checkout_coupon_message($message)
//     {
//         if( CustomizeSettings::get_setting( 'wb4wp_wc_checkout_section_show_coupon_code_message_toggle_setting' )) {
//           return $message;
//         }

//         return false;
//     }
// }

add_filter( 'woocommerce_enable_order_notes_field', 'wb4wp_woocommerce_enable_order_notes_field' );

if ( !function_exists( 'wb4wp_woocommerce_enable_order_notes_field' ) ) {
    function wb4wp_woocommerce_enable_order_notes_field()
    {
        return CustomizeSettings::get_setting( 'wb4wp_wc_checkout_section_show_order_notes_toggle_setting' );
    }
}