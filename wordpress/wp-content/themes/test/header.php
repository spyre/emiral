<html>
<head>
  <title>
      <?php bloginfo('name'); ?>
  </title>
  <?php
  wp_head();
  ?>
</head>
<body>
<a href="<?php echo home_url(); ?>"><h2><?php bloginfo('name'); ?></h2></a>
<h3><?php bloginfo('description'); ?></h3>
<nav>
    <?php

    wp_nav_menu(array('theme_location' => 'meniu_sus'));
    ?>
</nav>
