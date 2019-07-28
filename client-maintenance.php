<?php

add_action( 'init', 'my_maintenance_mode' );

function my_maintenance_mode() {
	$user_id          = get_current_user_id();
	$interesting_link = '<a href="https://facebook.com/thewpsteward"> Our Facebook Page</a></p>';
	$image_url        = 'https://s3.amazonaws.com/wpsteward/wp-content/uploads/2019/07/28183925/Official-Memo-1.jpg';

	if ( $user_id !== 1 || ! is_user_logged_in() ) {

		$output = '<div style="display:inline-block; width:100%; text-align: center;" ><image style="width: 500px; max-width: 100%; margin: 0 auto; text-align: center" src="' . $image_url . '"></image></div>';
		$output .= '<p>Hey! ' . get_bloginfo( 'name' ) . ' is undergoing scheduled maintenance (to keep things secure and happy) at the moment. Please check back in a few minutes.</p>';
		$output .= '<p>While you wait, it\'s a great time to check out ' . $interesting_link;

		$args = array( 'response' => 503 );
		wp_die( $output, 'Site Under Scheduled Maintenance', $args );

	}

}