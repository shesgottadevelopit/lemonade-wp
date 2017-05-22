<?php
/**
 * Search template file
 * @package lemonade
 */

get_header(); ?>
<main role="main">
	<?php
		// init loop
		if ( have_posts() ) : ?>

			<header>
				<h2><?php printf( esc_html__( 'Search Results for: %s', 'lemonade' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			</header>
			<?php while ( have_posts() ) : the_post();
			get_template_part( 'content', 'search' );
			endwhile;
			//navigation
			the_posts_navigation(); 
		else :
			get_template_part( 'content', 'none' );
		endif; ?>
</main>
<?php
get_sidebar();
get_footer();
