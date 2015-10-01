<?php
/*
* Plugin Name: Spireplugin
* Plugin URI: https://github.com/spyre/emiral
* Description: Demo by Spyre
* Author: Spyre
* Author URI: https://github.com/spyre/emiral
* License: GPL2
*/

// filters - modify text / variables before persisting to DB / before showing to user_error
// actions - wordpress core events

add_filter('the_title', 'spyre_title');
add_filter('the_content', 'spyre_content2');
add_filter('list_cats', 'spyre_categories');

/**
* modificare titlu
*/

function spyre_title($text){
  return "&lt;&lt;&lt;".$text."&gt;&gt;&gt;";
}

function spyre_content($text){
  return strtoupper($text);
}

function spyre_content2($content){

  if(!is_singular('post')){ // if not a singular post page
    return $content;
  }

  // categories of post
  // get_the_ID -> current post ID
  $categories = get_the_terms(get_the_ID(), 'category');
  // array with objects for each category ^
  $categoriesIds = array();
  foreach($categories as $category){
    $categoriesIds[] = $category->term_id;
  }

  $loop = new WP_Query(array(
    'category_in' => $categoriesIds,
    'posts_per_page' => 4,
    'post_not_in' => array(get_the_ID()),
    'orderby' => 'rand'
  ));

  // if there are posts in this loop
  if($loop->have_posts()){
    $content .= 'RELATED POSTS<br/><ul>';
    while($loop->have_posts()){
      $loop->the_post(); // call get_the_ID() would return id of this post
      $content .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
    }
    $content .='</ul>';
  }
  wp_reset_query();
  return $content;
}


function spyre_categories($text){
  // return strtolower($text);
  return $text;
}
?>
