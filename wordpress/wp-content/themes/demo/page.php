<?php


get_header();

  if (have_posts()):
    while(have_posts()):

      the_post();


// n1
  echo '<br/><h3>Children for <i>'.'<a href="'.get_the_permalink(get_top_ancestor_id()).'">'.get_the_title(get_top_ancestor_id()).'</a></i>:</h3>';
  $args = array(
    // 'child_of' => $post->ID,
    'child_of' => get_top_ancestor_id(),
    'title_li' => 'PAGINI Child'
  );
  wp_list_pages($args);
// /n1



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

echo '<h2>PAGE.php</h2>';
 ?>
