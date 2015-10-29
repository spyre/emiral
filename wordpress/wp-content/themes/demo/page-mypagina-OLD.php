<?php
  get_header();
  while(have_posts()):
    the_post();
    the_title();
    echo '<br/>';
    the_content();
    echo '<br/><br/>';
  endwhile;
  get_footer();
echo '<h2>PAGE-MYPAGINA.php</h2>';
 ?>
