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
			jQuery('<label />', { 'for': 'tip_persoana', text: 'Persoana Juridica' }).appendTo(container);
			jQuery('<input />', { type: 'checkbox', id: 'tip_persoana', value: 'test' }).appendTo(container);
			
			// field-urile care cad intr-o categorie sau alta
			var fields_pf = ["billing_cnp"];
			var fields_pj = ["billing_cui", "billing_regcom"];

			var required_pf = ["billing_cnp"];
			var required_pj = ["billing_cui"];

			// non-woocommerce required fields
			var required_fields = [];

			function show_pf_fields(){
				// persoana fizica
				for(i = 0; i < fields_pf.length; i++){
						jQuery('label[for="'+fields_pf[i] + '"]').show();
						jQuery('#'+fields_pf[i]).show();		
						
					}		
				for(i = 0; i < fields_pj.length; i++){
						jQuery('label[for="'+fields_pj[i] + '"]').hide();
						jQuery('#'+fields_pj[i]).hide();	
						
				}
				for(i = 0; i < required_pf.length; i++){
					jQuery('#'+required_pf[i]).prop('required',true);
				}
				for(i = 0; i < required_pj.length; i++){
					jQuery('#'+required_pj[i]).prop('required',false);
				}
			}

			function show_pj_fields(){
				// persoana juridica
					for(i = 0; i < fields_pf.length; i++){
						jQuery('label[for="'+fields_pf[i] + '"]').hide();
						jQuery('#'+fields_pf[i]).hide();

					}		
					for(i = 0; i < fields_pj.length; i++){
						jQuery('label[for="'+fields_pj[i] + '"]').show();
						jQuery('#'+fields_pj[i]).show();	

					}

					for(i = 0; i < required_pf.length; i++){
						jQuery('#'+required_pf[i]).prop('required',false);
					}
					for(i = 0; i < required_pj.length; i++){
						jQuery('#'+required_pj[i]).prop('required',true);
					}
			}

			function displayInfoDebug(){
				//alert('INFO: ' + jQuery('#place_order').val());
				jQuery('#place_order').click(function(){
					// alert('test');
				});
			}

			jQuery('#tip_persoana').click(function(){
				if(jQuery(this).attr('checked')) {
				    show_pj_fields();
				    displayInfoDebug();
					
				} else {
					show_pf_fields();
					displayInfoDebug();
				}

			});
			
			// default behavior
			show_pf_fields(); // setting pf fields
			jQuery('#tip_persoana').prop('checked', false);

			// jQuery('#place_order').click(function(){
				// alert('test2');
			// });
			jQuery('#tip_persoana').click();
			jQuery('#tip_persoana').click();


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
