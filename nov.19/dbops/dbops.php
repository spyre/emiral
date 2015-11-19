<?php
/*
* Plugin Name: DBOPS
* Plugin URI: https://github.com/spyre/emiral
* Description: Operatii baze de date din WP
* Author: Spyre
* Author URI: https://github.com/spyre/emiral
* License: GPL2
*/


function getConnection(){
  $host = 'localhost';
  $db = 'sakila';
  $pwd = '';
  $usr = 'root';
  $conn = new wpdb($usr, $pwd, $db, $host);
  return $conn;
}



function getFilmTitle($id){
  $conn = getConnection();
  $title = $conn->get_var( "SELECT title FROM film WHERE film_id = ".$id );
  return $title;
}

function getFilmInfo($id){
  $conn = getConnection();
  $rand = $conn->get_row('select * from film where film_id = '.$id);
  return $rand;
}

function getFilmTitleCol(){
  $conn = getConnection();
  $colTitlu = $conn->get_col('select title from film');
  return $colTitlu;
}

function test(){
	
	echo 'TEST ***********<br/>';
}

function getPostIdsByCustomFields(){
	
	global $wpdb;
	
	$mkey = 'proglanguage';
	$mkey_value = 'scala';
	
	$query = "SELECT      key3.post_id
	FROM        wp_postmeta key3
	INNER JOIN  wp_postmeta key1 
	            ON key1.post_id = key3.post_id
	            AND key1.meta_key = %s 

	WHERE       key3.meta_key =  %s
	            AND key3.meta_value = %s
	ORDER BY    key1.meta_value, key3.meta_value";
	$postids = $wpdb->get_col($wpdb->prepare($query, $mkey, $mkey, $mkey_value));
	print_r($postids);
}

?>
