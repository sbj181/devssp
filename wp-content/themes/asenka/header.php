<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-34679163-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-34679163-1');
	</script>
	<!-- End -->

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no"/>

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>

	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

	<?php wp_head(); ?>

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

	<script>
		$( function() {
			$( "#tabs" ).tabs();
		} );
	</script>

	<style>
		#full-screen-search {
			/* prevents flash of search overlay on mobile at page load */
			visibility: hidden;
		}
	</style>

	<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"  rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i" rel="stylesheet">

</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>

	 <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	 <header id="masthead" class="site-header navbar-static-top" role="banner">
		<div class="container">
			<nav class="navbar navbar-toggleable-md navbar-light">

				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="navbar-brand">
					<a href="<?php echo esc_url( home_url( '/' )); ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/ssplogo.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					</a>
				</div>

				<?php
				wp_nav_menu([
					'theme_location'    => 'primary',
					'container'       => 'div',
					'container_id'    => '',
					'container_class' => 'collapse navbar-collapse justify-content-end',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav',
					'depth'           => 3,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker()
					]);
					?>
					<form role="search" method="get" class="search-form searchbtn" action="<?php echo home_url( '/' ); ?>">
						<button type="submit" class="search-submit"><span class="fa fa-search"></span></button>
					</form>
				</nav>
			</div>
		</header>
		<!-- #masthead -->

		<?php if(is_home()): ?>
		<div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
			<div class="container">
				<h1><?php esc_url(bloginfo('name')); ?></h1>
				<p><?php bloginfo( 'description'); ?></p>
			</div>
		</div>
		<?php endif; ?>

		<div id="content" class="site-content">
			<div class="container">
			 <div class="row">
			 <?php endif; ?>
