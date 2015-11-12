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


?>
