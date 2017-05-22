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
			the_title( '<h2>', '</h2>' );
		else :
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div>
			<!-- add entry meta -->
			<?php echo get_the_date('l // F j, Y'); ?>
			<?php echo get_the_tag_list('<span>', '</span></span>', '</span>'); ?>
			<?php the_category(' | '); ?>|
		</div>
		<div><!--featured image -->
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
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
