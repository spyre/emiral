<?php

get_header();

  if (have_posts()):
    while(have_posts()):

      the_post();
      echo 'POST FORMAT: '.get_post_format().'<br/><br/>';
      get_template_part('content', get_post_format());

    ?>

    <?php


  endwhile;

else:

  echo '<p>No content found</p>';
endif;

get_footer();
 ?>



 <br/><h2>TESTE</h2>
 <?php print_r(getActorsByFilm(10)); ?>
 <br/>
 <br/>
 <select id="leftselect">
 <?php
 foreach(getFilms() as $film){
   echo "<option  value='".$film['film_id']."'>".$film['title'].'</option>';
   //print_r($film);
   //echo '<br/><br/>';
 }
  ?>
</select>

<br/><br/>
<select id="rightselect">
</select>
