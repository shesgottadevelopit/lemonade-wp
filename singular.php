<?php
/**
 * Singular template file (for pages & posts) - very generic
 * Fallback for single.php and page.php
 * @package lemonade
 */

get_header(); ?>
<main role="main">
	<?php
		// loop
		while ( have_posts() ) : the_post();
			get_template_part( 'content' );

			if ( get_post_type() === 'post' ) {
			// insert navigation or pagination
			the_post_navigation();
			}
			//comments - if applicable
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;  //end loop ?>
</main>
<?php
get_sidebar();
get_footer();
