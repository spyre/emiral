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

// add_filter('the_title', 'spyre_title');
// add_filter('the_content', 'spyre_content2');
// add_filter('list_cats', 'spyre_categories');

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

// Tools menu - add_management_page
// Settings menu - add_options_page
function oscimp_admin_actions() {
add_options_page("OSCommerce Product Display", "OSCommerce Product Display", 1, "OSCommerce_Product_Display", "oscimp_admin");}

function oscimp_admin() {
    include('oscommerce_import_admin.php');
}

// functie pentru incarcarea produselor
function oscimp_getproducts($product_cnt=1) {
  // built-in WPDB object
  $oscommercedb = new wpdb(get_option('oscimp_dbuser'),get_option('oscimp_dbpwd'), get_option('oscimp_dbname'), get_option('oscimp_dbhost'));

  $retval = '';

  /*
   for ($i=0; $i<$product_cnt; $i++) {
       //Get a random product
       $product_count = 0;
       while ($product_count == 0) {
           $product_id = rand(0,30);
           $product_count = $oscommercedb->get_var("SELECT COUNT(*) FROM products WHERE products_id=$product_id AND products_status=1");
       }

       //Get product image, name and URL
       $product_image = $oscommercedb->get_var("SELECT products_image FROM products WHERE products_id=$product_id");
       $product_name = $oscommercedb->get_var("SELECT products_name FROM products_description WHERE products_id=$product_id");
       $store_url = get_option('oscimp_store_url');
       $image_folder = get_option('oscimp_prod_img_folder');

       //Build the HTML code
       $retval .= '<div class="oscimp_product">';
       $retval .= '<a href="'. $store_url . 'product_info.php?products_id=' . $product_id . '"><img src="' . $image_folder . $product_image . '" /></a><br />';
       $retval .= '<a href="'. $store_url . 'product_info.php?products_id=' . $product_id . '">' . $product_name . '</a>';
       $retval .= '</div>';

   }
   */
   for ($i=0; $i<2; $i++) {

       //Get product image, name and URL
       $product_name = $oscommercedb->get_var("SELECT products_name FROM products_description WHERE product_id=$i");


       $retval .= 'PRODUCT: '.$product_name.'<br/>';


   }

   $retval .= 'PRODUCTS GO HERE<br/>';
   return $retval;
}

add_action('admin_menu', 'oscimp_admin_actions');

?>
