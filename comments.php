<?php
/**
 * Comments template file
 * @package lemonade
 * @link https://developer.wordpress.org/reference/functions/comment_form/
 */
if ( post_password_required() ) {
	return; // This post is password protected. Enter the password to view comments
}
?>

<div>
	<?php
	// edit below this line only
	if ( have_comments() ) : ?>
	<h2>
		<?php
			printf(
				esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'lemonade' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
		?>
	</h2>
	<ol class="comment-list">
		<?php wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size' => 48
			) );
		?>
	</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<!-- comment navigation -->
	<nav role="navigation">
		<div>
			<div><?php previous_comments_link( esc_html__( 'Older Comments', 'lemonade' ) ); ?></div>
			<div><?php next_comments_link( esc_html__( 'Newer Comments', 'lemonade' ) ); ?></div>

		</div>
	</nav>
		<?php endif; // End check for comment navigation; can also use  paginate_comments_links(); for navigation

	endif; // End check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'lemonade' ); ?></p>
	<?php endif; ?>
	<?php comment_form(); ?>
</div>
