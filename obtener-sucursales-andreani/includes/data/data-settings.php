<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Array of settings
 */
return array(
	'enabled'           => array(
		'title'           => __( 'Activar Andreani - Sucursales', 'woocommerce-shipping-andreani' ),
		'type'            => 'checkbox',
		'label'           => __( 'Activar este método de envió', 'woocommerce-shipping-andreani' ),
		'default'         => 'no'
	),

	'title'             => array(
		'title'           => __( 'Título', 'woocommerce-shipping-andreani' ),
		'type'            => 'text',
		'description'     => __( 'Controla el título que el usuario ve durante el pago.', 'woocommerce-shipping-andreani' ),
		'default'         => __( 'Andreani - Sucursales', 'woocommerce-shipping-andreani' ),
		'desc_tip'        => true
	),
 
//    'api'              => array(
// 		'title'           => __( 'Configuración de la API', 'woocommerce-shipping-andreani' ),
// 		'type'            => 'title',
// 		'description'     => __( '', 'woocommerce-shipping-andreani' ),
//     ),
	
//    'api_key'          => array(
// 		'title'           => __( 'Kuad API Key', 'woocommerce-shipping-andreani' ),
// 		'type'            => 'text',
// 		'description'     => __( 'Kuad API Key', 'woocommerce-shipping-andreani' ),
// 		'default'         => __( '', 'woocommerce-shipping-andreani' ),
//     'placeholder' => __( '', 'meta-box' ),
//     ),
	
	
   'ajuste_precio'    => array(
		'title'           => __( 'Costo a Sucursal', 'woocommerce-shipping-andreani' ),
		'type'            => 'text',
		'description'     => __( 'Agregar costo a Sucursal.', 'woocommerce-shipping-andreani' ),
		'default'         => __( '', 'woocommerce-shipping-andreani' ),
    'placeholder' => __( '1', 'meta-box' ),		
    ),	
   'precio_gratis'    => array(
		'title'           => __( 'Envio Gratis', 'woocommerce-shipping-andreani' ),
		'type'            => 'text',
		'description'     => __( 'Envio gratis para montos superiores a:', 'woocommerce-shipping-andreani' ),
		'default'         => __( '', 'woocommerce-shipping-andreani' ),
    'placeholder' => __( '1', 'meta-box' ),		
    ),	
);