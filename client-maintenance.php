<?php
/**
 * Plugin Name:     Client Maintenance Plugin
 * Plugin URI:      http://istodaybensbirthday.club/
 * Description:     Maintance Mode
 * Author:          Ben
 * Author URI:      http://istodaybensbirthday.club/
 * Text Domain:     client-maintenance
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 */


add_action( 'init', 'my_maintenance_mode' );

function my_maintenance_mode() {
	$maintenanceOn    = get_site_option( 'cm_maintenance_on', false );
	$user_id          = get_current_user_id();
	$interesting_link = '<a href="https://facebook.com/thewpsteward"> Our Facebook Page</a></p>';
	$image_url        = 'https://s3.amazonaws.com/wpsteward/wp-content/uploads/2019/07/28183925/Official-Memo-1.jpg';

	if ( ( $user_id !== 1 || ! is_user_logged_in() ) && $maintenanceOn ) {

		$output = '<div style="display:inline-block; width:100%; text-align: center;" ><image style="width: 500px; max-width: 100%; margin: 0 auto; text-align: center" src="' . $image_url . '"></image></div>';
		$output .= '<p>Hey! ' . get_bloginfo( 'name' ) . ' is undergoing scheduled maintenance (to keep things secure and happy) at the moment. Please check back in a few minutes.</p>';
		$output .= '<p>While you wait, it\'s a great time to check out ' . $interesting_link;

		$args = array( 'response' => 503 );
		wp_die( $output, 'Site Under Scheduled Maintenance', $args );

	}

}


function ini_cm_maintenance_menu() {
	add_menu_page(
		'Client Maintenance Plugin',
		'Maintenance Mode',
		'manage_options',
		'cm-maintenance',
		'cm_maintenance_page',
		'dashicons-admin-tools',
		0
	);
}
add_action( 'admin_menu', 'ini_cm_maintenance_menu' );

function cm_maintenance_page() {
	$status = get_site_option( 'cm_maintenance_on', false ) ? 'On' : 'Off';
	echo '<h1>Maintenance Mode Is: ' . $status . '</h1>';

	echo '<form method="POST" action="' . get_admin_url('', 'admin.php?page=cm-maintenance') . '">';
		echo '<input style="cursor: pointer;" type="submit" name="cm_maintenance_toggle" value="Toggle Mainteance Mode">';
	echo '</form>';
}

function cm_maintence_toggle_init() {
	if ( isset( $_POST, $_POST['cm_maintenance_toggle'] ) ) {
		$status = (bool) get_site_option( 'cm_maintenance_on', false );
		$status = ! $status;
		update_site_option( 'cm_maintenance_on', $status );
	}
}

add_action( 'admin_init', 'cm_maintence_toggle_init' );
