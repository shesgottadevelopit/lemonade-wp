<?php
/**
 * Display search posts
 * @package lemonade
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( sprintf( '<h2 class="article-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
		<div>
			<!-- add entry meta -->
		</div>
		<?php endif; ?>
	</header>

	<div>
		<?php the_excerpt();
		?>
	</div>

	<footer>
	</footer>
</article>
