<?php
/**
 * Header template file
 * @package lemonade
 */
 ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- <title></title>-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div>
		<header role="banner">
			<div> <!-- site title/description or logo -->
			   <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			   <?php
			   $description = get_bloginfo( 'description', 'display' );
			   if ( $description || is_customize_preview() ) : ?>
			   <p><?php echo $description; ?></p>
			   <?php
			   endif; ?>
			   <!-- insert logo image if applicable
			   <a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logo.png" alt="Website Logo" /></a>
			   -->
			</div>
			<nav role="navigation">
			   <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'lemonade' ); ?></button>
			   <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
		   </nav><!-- end navigation -->
		</header>
