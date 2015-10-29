New Theme :)

<?php

  get_header();

  while(have_posts()){
    echo 'THE POST - displays nothing <br/>';
    // Iterate the post index in The Loop. Retrieves the next post, sets up the post, sets the 'in the loop' property to true.
    the_post();
    echo '<br/>';
    echo 'The title:<br/>';
    the_title();
    echo 'The content:<br/>';
    echo '<br/>';
    the_content();
    echo '<br/>';
  }

  get_footer();
?>
