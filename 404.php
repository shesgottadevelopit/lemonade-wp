<?php
/**
 * 404 error page
 * @package lemonade
 */
get_header(); ?>
<main role="main">
	<header>
		<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'lemonade' ); ?></h1>
	</header>
	<div>
		<p><?php esc_html_e( 'Nothing is here, sorry about that (well not really sorry, but you get the point).', 'lemonade' ); ?></p>

		<!--insert secondary widgets or use underscores default below -->
		<?php get_search_form();?>

	</div>
</main>
<?php
get_footer();
