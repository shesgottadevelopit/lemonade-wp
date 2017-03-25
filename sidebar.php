<?php
/**
 * Sidebar template file
 * @package lemonade
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
