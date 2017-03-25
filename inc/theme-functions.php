<?php
/**
 * Theme-specific functions, toggle comments to activate
 * @package lemonade
 */

/**
 * Custom pagination function outputs number of pages within navigation loop
 * Page X of Y
 * Can be added to a partial 
 */
function lemonade_pagination() {
	global $wp_query;

	$current_page = max( 1, get_query_var('paged') );
    $pages = $wp_query->max_num_pages;
	$big = 999999999; // need an unlikely integer


	$previous_posts = get_previous_posts_link('<span class="icon ic-chevron-left post-nav"></span>');
	$next_posts = get_next_posts_link('<span class="icon ic-chevron-right post-nav"></span>');


		echo '<nav class="navigation posts-navigation" role="navigation">';
        echo '<h2 class="screen-reader-text">'. esc_html__( 'Posts navigation', 'lemonade' ). '</h2>';
		echo '<div class="nav-links"><div class="nav-flex">';
		echo '<div class="nav-previous-index">'. $previous_posts . '</div>';
		printf( __('<div class="nav-links-pre">Page %s of %s</div>', 'lemonade'), $current_page, $pages );
		echo '<div class="nav-next-index">'. $next_posts . '</div>';
		echo '</div></div>';
        echo '</nav>';
}

/**
 * Custom Excerpts Indicator
 * Replaces default [...] with just ...
 */
function lemonade_excerpt_more($more) {
	return " ...";
}
add_filter( 'excerpt_more', 'lemonade_excerpt_more');

/**
 * Adds support for excerpts on pages
 */

function lemonade_add_excerpts_to_pages() {
	add_post_type_support('page', 'excerpt');
}
add_action( 'init', 'lemonade_add_excerpts_to_pages' );

/**
 * Utility function to check if a gravatar exists for a given email or id
 * @param int|string|object $id_or_email A user ID,  email address, or comment object
 * @return bool if the gravatar exists or not
 */

function validate_gravatar($id_or_email) {
  //id or email code borrowed from wp-includes/pluggable.php
	$email = '';
	if ( is_numeric($id_or_email) ) {
		$id = (int) $id_or_email;
		$user = get_userdata($id);
		if ( $user )
			$email = $user->user_email;
	} elseif ( is_object($id_or_email) ) {
		// No avatar for pingbacks or trackbacks
		$allowed_comment_types = apply_filters( 'get_avatar_comment_types', array( 'comment' ) );
		if ( ! empty( $id_or_email->comment_type ) && ! in_array( $id_or_email->comment_type, (array) $allowed_comment_types ) )
			return false;

		if ( !empty($id_or_email->user_id) ) {
			$id = (int) $id_or_email->user_id;
			$user = get_userdata($id);
			if ( $user)
				$email = $user->user_email;
		} elseif ( !empty($id_or_email->comment_author_email) ) {
			$email = $id_or_email->comment_author_email;
		}
	} else {
		$email = $id_or_email;
	}

	$hashkey = md5(strtolower(trim($email)));
	$uri = 'http://www.gravatar.com/avatar/' . $hashkey . '?d=404';

	$data = wp_cache_get($hashkey);
	if (false === $data) {
		$response = wp_remote_head($uri);
		if( is_wp_error($response) ) {
			$data = 'not200';
		} else {
			$data = $response['response']['code'];
		}
	    wp_cache_set($hashkey, $data, $group = '', $expire = 60*5);

	}
	if ($data == '200'){
		return true;
	} else {
		return false;
	}
}
/**
 * Ignore sticky posts in main query on the home page
 *
 */
add_action('pre_get_posts', 'lemonade_ignore_stickyposts');

function lemonade_ignore_stickyposts ( $query ) {
	if (is_home() && $query->is_main_query()) {
		$query->set( 'ignore_sticky_posts', true );
	}
}

/**
 * Offset on main query
 * Fixes pagination due to offset on main query
 *
 */
add_action('pre_get_posts', 'lemonade_query_offset', 1);

function lemonade_query_offset($query) {

	//Offset the main query on the home page
	if ( $query->is_home() && $query->is_main_query()&& !$query->is_paged() ) {
		$query->set( 'offset', '1' );
	}

	//Everything below fixes pagination due to offset on main query

	//Before anything else, make sure this is the right query...
	if (!$query->is_home() && $query->is_main_query() ) {
		return;
	}

	//First, define your desired offset...
	$offset = 1;

	//Next, determine how many posts per page you want (we'll use WordPress's settings)
	$ppp = get_option('posts_per_page');

	//Next, detect and handle pagination...
	if ($query->is_paged && $query->is_main_query()) {

		//Manually determine page query offset (offset + current page (minus one) x posts per page)
		$page_offset = $offset + ( ($query->query_vars['paged'] - 1) * $ppp );

		//Apply adjust page offset
		$query->set('offset', $page_offset);
	}
}
// Escape HTML in <code> or <pre><code> tags.
function escapeHTML($arr) {

    if (version_compare(PHP_VERSION, '5.2.3') >= 0) {

        $output = htmlspecialchars($arr[2], ENT_NOQUOTES, get_bloginfo('charset'), false);
    }
    else {
        $specialChars = array(
            '&' => '&amp;',
            '<' => '&lt;',
            '>' => '&gt;'
        );

        // decode already converted data
        $data = htmlspecialchars_decode($arr[2]);
        // escapse all data inside <pre>
        $output = strtr($data, $specialChars);
    }
    if (! empty($output)) {
        return  $arr[1] . $output . $arr[3];
    }   else    {
        return  $arr[1] . $arr[2] . $arr[3];
    }
}
function filterCode($data) { // Uncomment if you want to escape anything within a <pre> tag
    //$modifiedData = preg_replace_callback('@(<pre.*>)(.*)(<\/pre>)@isU', 'escapeHTML', $data);
    $modifiedData = preg_replace_callback('@(<code.*>)(.*)(<\/code>)@isU', 'escapeHTML', $data);
    $modifiedData = preg_replace_callback('@(<tt.*>)(.*)(<\/tt>)@isU', 'escapeHTML', $modifiedData);

    return $modifiedData;
}
add_filter( 'content_save_pre', 'filterCode', 9 );
add_filter( 'excerpt_save_pre', 'filterCode', 9 );
