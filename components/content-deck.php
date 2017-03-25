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

		<?php //this includes a user-defined excerpt/deck above the fold
		if ( has_excerpt( $post->ID) ) {
		echo '<div class="post-deck">';
		echo '<p>'. get_the_excerpt() . '</p>';
		echo '</div>';
		}
		?>
		<div>
			<!-- add entry meta -->
		</div>
		<?php
		endif; ?>
	</header>

	<div>
		<?php the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'lemonade' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
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
