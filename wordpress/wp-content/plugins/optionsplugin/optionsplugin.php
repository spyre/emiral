<?php
/*
* Plugin Name: optionsplugin
* Plugin URI: https://github.com/spyre/emiral
* Description: Descarcare optiuni
* Author: Spyre
* Author URI: https://github.com/spyre/emiral
* License: GPL2
*/

// filters - modify text / variables before persisting to DB / before showing to user_error
// actions - wordpress core events

$table1 = '';
$table2 = '';
$joinTable = '';

$sql = 'select actor.first_name, actor.last_name, film.title from actor inner join film_actor on film_actor.actor_id = actor.actor_id	inner join film on film.film_id = film_actor.film_id;';

function getConnection(){
  $host = 'localhost';
  $db = 'sakila';
  $pwd = '1234';
  $usr = 'root';
  $conn = new wpdb($usr, $pwd, $db, $host);
  return $conn;
}

function getFilmsByActor($actorId){
  $conn = getConnection();
  $sql = 'select film.* from actor inner join film_actor on film_actor.actor_id = actor.actor_id	inner join film on film.film_id = film_actor.film_id where actor.actor_id = '.$actorId;
  $results = $conn->get_results($sql, ARRAY_A);
  return $results;
}

function getActorsByFilm($filmId){
  $conn = getConnection();
  $sql = 'select actor.* from actor inner join film_actor on film_actor.actor_id = actor.actor_id	inner join film on film.film_id = film_actor.film_id where film.film_id = '.$filmId;
  $results = $conn->get_results($sql, ARRAY_A);
  return $results;
}

function getFilms(){
  $conn = getConnection();
  $sql = 'select * from film';
  $results = $conn->get_results($sql, ARRAY_A);
  return $results;
}

/*
function getRelatedColumn($requiredColumns, $results){
  $elementsAssociated = array();
  foreach($results as $result){

  }
}
*/

function demo1(){

}
