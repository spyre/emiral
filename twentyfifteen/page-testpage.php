<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<h3>TESUTO</h3>
	<?php 
		echo get_search_form();
	?>
	
	<br/>
	
	<h4>Special Search form</h4>
	<form role="search" method="get" id="searchform" action="http://localhost/zecl_workspace/wp3/">
	<div>
		<label for="s">Search for:</label>
		<input type="text" value="" name="s" id="s" />
		<input type="hidden" value="1" name="sentence" />
		<input type="hidden" value="product" name="post_type" />
		<input type="submit" id="searchsubmit" value="Search" />
		</div>
	</form>
	
	<br/>
	<h4>Page search form</h4>
	<form action="http://localhost/zecl_workspace/wp3/" method="get">
		<label for="search">Search in <?php echo home_url( '/' ); ?></label>
		<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
		<input type="hidden" value="page" name="post_type" id="post_type" />
		<input type="submit" id="searchsubmit" value="Search Page" />
	</form>


	<br/>
<?php get_footer(); ?>
