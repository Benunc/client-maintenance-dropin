<?php

// if the next line is not commented out, your site is in maintenance mode
add_action( 'init', 'my_maintenance_mode' );

function my_maintenance_mode() {
	//change this value to your user email
	$email            = 'admin@example.com';

	//change this to something appropriate for this client
	$interesting_link = '<a href="https://facebook.com/thewpsteward"> Our Facebook Page</a></p>';

	// (optional) change the image URL for the "We'll Be Right Back" image.
	$image_url        = 'https://s3.amazonaws.com/wpsteward/wp-content/uploads/2019/07/28183925/Official-Memo-1.jpg';
	$image_alt        = 'the words We\'ll Be Right Back written in blue with a gray-and-blue border';

	// don't change this
	$user             = wp_get_current_user();

	if ( $email !== $user->user_email ) {

		$output = '<div style="display:inline-block; width:100%; text-align: center;" ><image style="width: 500px; max-width: 100%; margin: 0 auto; text-align: center" alt= "' . $image_alt . '" src="' . $image_url . '"></image></div>';
		$output .= '<p>Hey! ' . get_bloginfo( 'name' ) . ' is undergoing scheduled maintenance (to keep things secure and happy) at the moment. Please check back in a few minutes.</p>';
		$output .= '<p>While you wait, it\'s a great time to check out ' . $interesting_link;

		$args = array( 'response' => 503 );
		wp_die( $output, 'Site Under Scheduled Maintenance', $args );

	}

}