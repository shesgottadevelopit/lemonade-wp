<?php
/**
 * Searchform template file
 * @package project52weeks
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'sgdi' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'project52weeks' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
<!--	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php //echo _x( 'Search', 'submit button', 'project52weeks' ); ?></span></button>-->
</form>
