<?php
/**
 * Display posts
 * @package lemonade
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php
		if ( is_single() ) :
			the_title( '<h1>', '</h1>' );
		else :
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>

		<div>
			<!-- add entry meta -->
		</div>
		<?php
		endif; ?>
	</header>

	<div>
		<?php the_excerpt();
			// for links within the page
			wp_link_pages( array(
				'before' => '<div>' . esc_html__( 'Pages:', 'lemonade' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer>
	</footer>
</article>
