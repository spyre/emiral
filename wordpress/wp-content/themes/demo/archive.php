<?php

get_header();


  echo '<h3 style="background-color: red;">Archive.php</h3>';


  if (have_posts()):
  ?>
    <h2>
      <?php
        if(is_category()){
          // echo 'This is a category archive';
          single_cat_title();
        }else if(is_tag()){
          // echo 'Tag archive';
          single_tag_title();
        }else if(is_author()){
          // echo 'Author archive';
          the_post(); // !!! OPTIONAL
          echo 'Author archives: '.get_the_author();
          rewind_posts();
        }else if (is_day()){
          // echo 'Day archive';
          echo 'Daily archives:  '.get_the_date();
        }else if(is_month()){
          echo 'Month archive '.get_the_date('F Y');
        }else if (is_year()){
          echo 'Year archive '.get_the_date('Y');
        }else{
          echo 'Default Archive:';
        }

       ?>
    </h2>

    <?php
    while(have_posts()):
      the_post();

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

    // the_content();
    the_excerpt();
  endwhile;

else:

  echo '<p>No content found</p>';
endif;

get_footer();
 ?>
