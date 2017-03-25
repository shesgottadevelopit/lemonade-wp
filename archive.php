<?php
/**
 * Archive template file
 * @package lemonade
 */

get_header(); ?>

<main role="main">
	<?php
		// init loop
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1>', '</h1>' );
					the_archive_description( '<div>', '</div>' );
				?>
			</header>
			<?php while ( have_posts() ) : the_post();
			get_template_part( 'content');
			endwhile;
			// insert navigation or pagination
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
</main>
<?php
get_sidebar();
get_footer();
