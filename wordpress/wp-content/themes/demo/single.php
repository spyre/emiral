<?php

get_header();

  if (have_posts()):
    while(have_posts()):

      the_post();
      // echo 'AUTHOR: <br/>';
      // echo get_author_posts_url(get_the_author_meta('ID'));
      // echo 'END AUTHOR<br/>';
    ?>
    <article class="post">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p style="info-class" class="subinfo_post"><?php the_time('m/d/y');  ?> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
      Posted in
      <?php
      $categories = get_the_category();
      $separator = ', ';
      $output = '';
      foreach($categories as $category){
        $output.= '<a href="'.get_category_link($category->term_id).'">'. $category->cat_name.'</a>'.$separator;
      }

      echo $output;
        ?>

    </p>
  </article>
    <?php

    the_content();
  endwhile;

else:

  echo '<p>No content found</p>';
endif;

echo 'PRODUSE:::<br/>';
echo oscimp_getproducts();
get_footer();
 ?>
