<?php
/**
 * Footer template file
 * @package lemonade
 */
?>
<footer role="contentinfo">
		<div>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lemonade' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'lemonade' ), '[insert your sponsor]' ); ?></a> Copyright YEAR-<?php echo date('Y'); ?>.<?php bloginfo('name'); ?>
		</div>
	</footer>
</div><!-- end page -->

<?php wp_footer(); ?>
<!-- insert google analytics -->

</body>
</html>
