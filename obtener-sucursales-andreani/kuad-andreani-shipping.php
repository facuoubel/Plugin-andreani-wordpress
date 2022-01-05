<?php
/**
 * Plugin Name: Andreani Sucursales
 * Plugin Uri: https://kuadsystem.com
 * Description: Obtener sucursales de entrega en el checkout.
 * Version: 1.0
 * Requires at least: 5.2
 * Requires PHP:      7.3.5
 * Author: Kuad System
 * Author URI:        https://kuadsystem.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       kuadsystem
*/

// Global API URL

function andreani_start() {
	global $wp_session;
}
add_action('init','andreani_start');

$wp_session['url_andreani'] = 'https://apisqa.andreani.com/v2/sucursales';

require_once( 'includes/functions.php' );

// PAGE LINKS
function wc_andreani_plugin_links( $links ) {

	$plugin_links = array(
		'<a href="https://kuadsystem.com">' . __( 'Soporte', 'woocommerce-shipping-andreani' ) . '</a>',
	);

	return array_merge( $plugin_links, $links );
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wc_andreani_plugin_links' );

// WOOCOMERCE ESTA ACTIVO
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	/**
	 * woocommerce_init_shipping_table_rate function.
	 *
	 * @access public
	 * @return void
	 */
	function wc_andreani_init() {
		include_once( 'includes/class-wc-shipping-andreani.php' );
	}
  add_action( 'woocommerce_shipping_init', 'wc_andreani_init' ); 

	/**
	 * wc_andreani_add_method function.
	 *
	 * @access public
	 * @param mixed $methods
	 * @return void
	 */
	function wc_andreani_add_method( $methods ) {
		$methods[ 'andreani_kuad' ] = 'WC_Shipping_ANDREANI';
		return $methods;
	}

	add_filter( 'woocommerce_shipping_methods', 'wc_andreani_add_method' );

	/**
	 * wc_andreani_scripts function.
	 */
	function wc_andreani_scripts() {
		wp_enqueue_script( 'jquery-ui-sortable' );
	}

	add_action( 'admin_enqueue_scripts', 'wc_andreani_scripts' );

	$ca_settings = get_option( 'woocommerce_andreani_settings', array() ); 
	
}       