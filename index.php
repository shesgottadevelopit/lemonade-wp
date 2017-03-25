<?php
/**
 * Index template file
 * @package lemonade
 */

get_header(); ?>
<main role="main">
	<?php
		// init loop
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			get_template_part( 'content');
			endwhile;
			// insert navigation or pagination
			the_posts_navigation();
		else :
			get_template_part( 'content', 'none' );
		endif; ?>
</main>
<?php
get_sidebar();
get_footer();
