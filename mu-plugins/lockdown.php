<?php
/**
 * Plugin Name: Lockdown
 * Version: 0.1
 * License: GPLv2
 */

class Lockdown {

	/**
	 * Constructor.
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'wp', array( $this, 'force_guest_login' ) );
	}

	/**
	 * Auto-login any visitors.
	 *
	 * @access public
	 */
	public function force_guest_login() {
		if ( ! is_user_logged_in() ) {
			wp_set_current_user( 2 );

			if ( ! is_admin() ) {
				if ( wp_redirect( admin_url() ) ) {
					exit();
				}
			}
		}
	}
}
new Lockdown();
