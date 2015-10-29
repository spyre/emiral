<?php

  // documentatie: A safe way to add/enqueue a stylesheet file to the WordPress generated page.
  function demo_resources(){ // css or JS files
    wp_enqueue_style('style', get_stylesheet_uri());
  }


  function pause_f(){

  }
  // adaugare actiune pentru rularea acesteia

  // documentatie oficiala: wp_enqueue_scripts is the proper hook to use when enqueuing items that are meant to appear on the front end. Despite the name, it is used for enqueuing both scripts and styles.
  add_action('wp_enqueue_scripts', 'demo_resources');
  add_action('wp_enqueue_scripts', 'pause_f');

  // navigation menus ==> control menus from admin screen
  register_nav_menus(array(
    'primary'=> __('Primary Menu'),
    'footer'=> __('Footer Menu'),
  ));

  // get top ancestor

  function get_top_ancestor_id(){

    global $post;

    if($post->post_parent){ // current page has parent
      $ancestors = array_reverse(get_post_ancestors($post->ID));
      return $ancestors[0]; // first = direct parent
    }
    return $post->ID;
  }


  add_theme_support('post-formats', array('aside', 'gallery', 'link'));


// AJAX
  add_action( 'wp_enqueue_scripts', 'add_my_script' );
  function add_my_script() {
      wp_enqueue_script(
          'selectscript', // name your script so that you can attach other scripts and de-register, etc.
          get_template_directory_uri() . '/js/selectscript.js', // this is the location of your script file
          array('jquery') // this array lists the scripts upon which your script depends
      );
  }
 ?>
