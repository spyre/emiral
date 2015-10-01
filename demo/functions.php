<?php

  // documentatie: A safe way to add/enqueue a stylesheet file to the WordPress generated page.
  function demo_resources(){ // css or JS files
    wp_enqueue_style('style', get_stylesheet_uri());
  }

  // adaugare actiune pentru rularea acesteia

  // documentatie oficiala: wp_enqueue_scripts is the proper hook to use when enqueuing items that are meant to appear on the front end. Despite the name, it is used for enqueuing both scripts and styles.
  add_action('wp_enqueue_scripts', 'demo_resources');

  // navigation menus ==> control menus from admin screen
  register_nav_menus(array(
    'primary'=> __('Primary Menu'),
    'footer'=> __('Footer Menu'),
  ));
 ?>
