<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	<!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>-->

	
	<script type="text/javascript">
		


		jQuery(document).ready(function(){

			var container = jQuery('.woocommerce-billing-fields');
			jQuery('<label />', { 'for': 'tip_persoana', text: 'Persoana Fizica' }).appendTo(container);
			jQuery('<input />', { type: 'checkbox', id: 'tip_persoana', value: 'test' }).appendTo(container);
			

			jQuery('#tip_persoana').click(function(){
				if(jQuery(this).attr('checked')) {
				    // alert('persoana fizica');
				    jQuery('label[for="billing_cui"]').hide();
				    jQuery('label[for="billing_cnp"]').show();
				    jQuery('#billing_cui').hide();
				    jQuery('#billing_cnp').show();
				} else {
				    // alert('persoana juridica');
				    jQuery('label[for="billing_cui"]').show();
				    jQuery('label[for="billing_cnp"]').hide();				    
				    jQuery('#billing_cui').show();
				    jQuery('#billing_cnp').hide();		
				}
			});
			
			// alert(jQuery('#billing_selectfizicajuridica_field :input'));
		});
	</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>

	<div id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;
				?>
				<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'twentyfifteen' ); ?></button>
			</div><!-- .site-branding -->
		</header><!-- .site-header -->

		<?php get_sidebar(); ?>
	</div><!-- .sidebar -->

	<div id="content" class="site-content">
