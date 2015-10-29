<?php

/*
Template Name: special layout Template

*/

get_header();

  if (have_posts()):
    while(have_posts()):

      the_post();

    ?>
    <article class="post">
    <h2><?php the_title(); ?></h2>
  </article>
    <?php

    the_content();
  endwhile;

else:

  echo '<p>No content found</p>';
endif;

get_footer();

echo '<h2>SPECIAL-TEMPLATE.php</h2>';
 ?>
