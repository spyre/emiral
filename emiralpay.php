<?php
/*
Plugin Name: Emiral Pay
Plugin URI: http://woothemes.com/woocommerce
Description: Your shipping method plugin
Version: 1.0.0
Author: WooThemes
Author URI: http://woothemes.com
*/

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	

	function calculTarifLivrare($informatii){
		$destination = "https://www.selfawb.ro/tarif.php";
		$data = '';
		$mime_boundary=md5(time());
	
		foreach($informatii as $key=>$value){
			$data .= '--' . $mime_boundary . "\n";
			$data .= 'Content-Disposition: form-data; name="'.$key.'"' . "\n" . "\n";
			$data .= $value . "\n";
		}
	
	
	
		$data .= "--" . $mime_boundary . "--" . "\n" . "\n"; // finish with two eol's!!
		$params = array('http' => array(
				'method' => 'POST',
				'header' => 'Content-Type: multipart/form-data; boundary=' . $mime_boundary . "\n",
				'content' => $data
		));
		$ctx = stream_context_create($params);
		if($ctx)
		{
			$response = @file_get_contents($destination, FILE_TEXT, $ctx);
			if ($response)
			{
				$result_fields=explode(',',$response);
			}
		}
		return $response;
	}
	

	function calculComanda($plicuri, $colete, $greutate, $lungime, $latime, $inaltime, $val_decl){
	
		$informatii = array(
				'username' => 'clienttest',
				'client_id'=> '7032158', // 7032158 nasty   7078796 bun
				'user_pass'=> 'testare',
				'serviciu' => 'Standard', 'localitate_dest'=>'Bucuresti',
				'judet_dest'=>'Ilfov',
	
				'plata_ramburs' => 'destinatar'
		);
		$informatii['plicuri'] = $plicuri;
		$informatii['colete'] = $colete;
		$informatii['greutate']=$greutate;
		$informatii['lungime']=$lungime;
		$informatii['latime']=$latime;
		$informatii['inaltime']=$inaltime;
		$informatii['val_decl']=$val_decl;
	
		// 	print_r($informatii);
		return calculTarifLivrare($informatii);
	}
	
	
	
	function your_shipping_method_init() {
		if ( ! class_exists( 'WC_Your_Shipping_Method' ) ) {
			class WC_Your_Shipping_Method extends WC_Shipping_Method {
				/**
				 * Constructor for your shipping class
				 *
				 * @access public
				 * @return void
				 */
				public function __construct() {
					$this->id                 = 'your_shipping_method'; // Id for your shipping method. Should be uunique.
					$this->method_title       = __( 'Your Shipping Method' );  // Title shown in admin
					$this->method_description = __( 'Description of your shipping method' ); // Description shown in admin

					$this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
					$this->title              = "My Shipping Method"; // This can be added as an setting but for this example its forced.

					$this->init();
				}

				/**
				 * Init your settings
				 *
				 * @access public
				 * @return void
				 */
				function init() {
					// Load the settings API
					$this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
					$this->init_settings(); // This is part of the settings API. Loads settings you previously init.

					// Save settings in admin if you have any defined
					add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
				}

				/**
				 * calculate_shipping function.
				 *
				 * @access public
				 * @param mixed $package
				 * @return void
				 */
				public function calculate_shipping( $package ) {
					$rate = array(
						'id' => $this->id,
						'label' => $this->title,
// 						'cost' => '422.99',
//function calculComanda($plicuri, $colete, $greutate, $lungime, $latime, $inaltime, $val_decl)
						'cost' => calculComanda(3,2,4,10,20,3,40), 
						'calc_tax' => 'per_item'
					);

					// Register the rate
					$this->add_rate( $rate );
				}
			}
		}
	}

	add_action( 'woocommerce_shipping_init', 'your_shipping_method_init' );

	function add_your_shipping_method( $methods ) {
		$methods[] = 'WC_Your_Shipping_Method';
		return $methods;
	}

	add_filter( 'woocommerce_shipping_methods', 'add_your_shipping_method' );
}

// https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/