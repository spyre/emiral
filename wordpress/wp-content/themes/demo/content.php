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

  echo 'META:';
  the_meta();

  echo '<br/>Specific Meta:<br/>';
  echo get_post_meta($post->ID, 'cs_description', true);


  if(is_search()){
    echo '<h3>SEARCH, showing just excerpt!</h3>';
    the_excerpt();
  }else{
    the_content();
  }

  // end meta
    ?>

</p>
</article>
