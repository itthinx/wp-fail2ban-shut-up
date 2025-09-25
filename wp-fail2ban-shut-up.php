<?php
/**
 * wp-fail2ban-shut-up.php
 *
 * Copyright (c) 2025 www.itthinx.com
 *
 * This code is released under the GNU General Public License.
 * See LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author itthinx
 * @package wp-fail2ban-shut-up
 * @since 1.0.0
 *
 * Plugin Name: WP fail2ban Shut Up
 * Plugin URI: https://github.com/itthinx/wp-fail2ban-shut-up
 * Description: Stops WP fail2ban nagging to start a free trial although you already dismissed the notification
 * Version: 1.0.0
 * Author: itthinx
 * Author URI: https://www.itthinx.com
 * Donate-Link: https://www.itthinx.com
 * License: GPLv3
 */

class WP_fail2ban_Shut_Up {

	public static function boot() {
		add_action( 'plugins_loaded', array( __CLASS__, 'plugins_loaded' ) );
	}

	public static function plugins_loaded() {
		add_filter( 'fs_show_admin_notice_wp-fail2ban', array( __CLASS__, 'fs_show_admin_notice_wp_fail2ban' ), 10, 2 );
	}

	public static function fs_show_admin_notice_wp_fail2ban( $value, $params ) {
		if ( isset( $params['id'] ) && $params['id'] === 'trial_promotion' ) {
			$value = false;
		}
		return $value;
	}
}

WP_fail2ban_Shut_Up::boot();
