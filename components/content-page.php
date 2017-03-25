<?php
/**
 * Display pages
 * @package lemonade
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div>
		<?php the_content();
			// for links within the page
			wp_link_pages( array(
				'before' => '<div>' . esc_html__( 'Pages:', 'lemonade' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer>
		<?php if ( get_edit_post_link() ) :
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'lemonade' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )),
					'<span class="edit-link">',
					'</span>'
				);
		endif; ?>
	</footer>
</article>
