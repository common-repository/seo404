<?php
/*
Plugin Name: SEO404
Plugin URI: http://wordpress.org/extend/plugins/seo404/
Description: SEO404 redirects to the Blog front page with a 301. No more 404 errors on Google/Bing/etc.
Version: 0.4
Author: Lars Storm
Author URI: http://wordpress.dahlstorm.dk
*/

/*  Copyright 2011 Lars Storm (email : ls dahlstorm.dk)

	This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/**
 * SEO404_redirect
 *
 * @package SEO404
 * @since 0.1
 *
 */
function SEO404_redirect() {
	$url = site_url();
	try {
		if ( get_option( 'maindomain' ) && get_option( 'maindomain' ) != "" ) { 
			$url = get_option( 'maindomain' );
		}
	}
	catch (Exception $e) {}
	wp_redirect( $url, 301 );
}
/**
 * SEO404_create_menu
 *
 * @package SEO404
 * @since 0.3
 *
 */
function SEO404_create_menu() {
	//create menu
	add_plugins_page('SEO404 settings page', 'SEO404', 'manage_options',  __FILE__, 'SEO404_options');
	//call register settings function
	add_action( 'admin_init', 'register_SEO404_settings' );
}
function register_SEO404_settings() {
	//register our settings
	register_setting( 'SEO404-options', 'maindomain' );
}
/**
 * SEO404_options
 *
 * @package SEO404
 * @since 0.3
 *
 */
function SEO404_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
?><div class="wrap">
<h2>SEO404 settings page</h2>
<form method="post" action="options.php">
	<?php settings_fields('SEO404-options'); ?>
	<?php do_settings_sections('SEO404'); ?>
    <table class="form-table">
        <tr valign="top">
		<th scope="row">
			Main domain
		</th>
		<td>
			<input type="text" name="maindomain" value="<?php echo get_option('maindomain'); ?>" />
			<p>Where should the 301 redirect to? e.g. http://mysite.com/</p>
			<p>Here it is also possible to add tracking for Google analytics to allow information on the redirect e.g. http://mysite.com/?utm_source=SEO404&utm_medium=OldDomain&utm_campaign=Redirect</p>
		</td>
        </tr>
    </table>  
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>
</div><?php
}

// Activate plugin
add_action( '404_template', 'SEO404_redirect' );

// Plugin configuration
add_action('admin_menu', 'SEO404_create_menu');
?>
