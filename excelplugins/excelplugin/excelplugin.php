<?php
/*
 * Plugin Name: Excel Plugin
 * Plugin URI: https://github.com/spyre/emiral
 * Description: Import / Export as Excel / SQL
 * Author: Spyre
 * Author URI: https://github.com/spyre/emiral
 * License: GPL2
 */
include 'MyCode\001ReadExcel.php';
function getConnection2() {
	$host = 'localhost';
	$db = 'sakila';
	$pwd = '';
	$usr = 'root';
	$conn = new wpdb ( $usr, $pwd, $db, $host );
	return $conn;
}


add_action ( 'admin_menu', 'excel_admin_actions' );

function excel_admin_actions() {
	add_options_page ( "EXCEL Php Worksheets", "EXCEL Php Worksheets", 1, "EXCEL_Php_Worksheets", "excel_admin" );
}

function excel_admin() {
	include('excel_php_admin.php');
}


?>
