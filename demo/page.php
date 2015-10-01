<?php

get_header();

  if (have_posts()):
    while(have_posts()):

      the_post();

    ?>
    <article class="post">
    <h2><?php the_title(); ?></h2><br/>DOAR PE PAGINI<br/>
  </article>
    <?php

    the_content();
  endwhile;

else:

  echo '<p>No content found</p>';
endif;

get_footer();
 ?>
