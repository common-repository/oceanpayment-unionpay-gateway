<?php
/*
	Plugin Name: Oceanpayment Unionpay Gateway
	Plugin URI: http://www.oceanpayment.com/
	Description: WooCommerce Oceanpayment Unionpay Gateway.
	Version: 6.0
	Author: Oceanpayment
	Requires at least: 4.0
	Tested up to: 6.1
    Text Domain: oceanpayment-unionpay-gateway
*/


/**
 * Plugin updates
 */

load_plugin_textdomain( 'wc_oceanunionpay', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );

add_action( 'plugins_loaded', 'woocommerce_oceanunionpay_init', 0 );

/**
 * Initialize the gateway.
 *
 * @since 1.0
 */
function woocommerce_oceanunionpay_init() {

	if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;

	require_once( plugin_basename( 'class-wc-oceanunionpay.php' ) );

	add_filter('woocommerce_payment_gateways', 'woocommerce_oceanunionpay_add_gateway' );

} // End woocommerce_oceanunionpay_init()

/**
 * Add the gateway to WooCommerce
 *
 * @since 1.0
 */
function woocommerce_oceanunionpay_add_gateway( $methods ) {
	$methods[] = 'WC_Gateway_Oceanunionpay';
	return $methods;
} // End woocommerce_oceanunionpay_add_gateway()