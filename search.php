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
				<h1><?php printf( esc_html__( 'Search Results for: %s', 'lemonade' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
			<?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'search' );
			endwhile;
			//navigation
			the_posts_navigation(); //get_template_part( 'partials/posts-pagination' );
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
</main>
<?php
get_sidebar();
get_footer();
