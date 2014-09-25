<?php
/*
Plugin Name: Typekit Fonts for WordPress
Plugin URI: http://om4.com.au/wordpress-plugins/typekit-fonts-for-wordpress-plugin/
Description: Use a range of hundreds of high quality fonts on your WordPress website by integrating the <a href="http://typekit.com">Typekit</a> font service into your WordPress blog.
Version: 1.7
Author: OM4
Author URI: http://om4.com.au/
Text Domain: om4-typekit
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*  Copyright 2009-2014 OM4 (email : info@om4.com.au)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


class OM4_Typekit {
	
	var $dbVersion = 1;
	
	var $installedVersion;
	
	var $dirname;
	
	var $optionName = 'OM4_Typekit';
	
	var $admin;
	
	var $embedcode = '<script type="text/javascript" src="//use.typekit.net/%s.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
	
	/**
	 * Perl-based regular expression that is used to extract the ID from the typekit embed code
	 * 
	 * The ID can contain numbers and letters only
	 *
	 * Ref: http://core.trac.wordpress.org/changeset/21166
	 * 
	 * @var string
	 */
	var $embedcoderegexp = '#(https?:)?//use\.typekit\.(com|net)/([a-z0-9]*)\.js#i';
	
	/**
	 * The format for the Typekit JS file URL. Used in HTTP requests to verify that the URL doesn't produce a 404 error
	 * 
	 * @var string
	 */
	var $embedcodeurl = '%s://use.typekit.net/%s.js';
	
	/*
	 * Default settings
	 */
	var $settings = array(
		'id'=> '',
		'css' => ''
	);

	/*
	 * HTTP scheme.
	 *
	 * HTTP by deafult, or HTTPS if the site is being loaded over SSL.
	 *
	 * @var string
	 */
	var $scheme = 'http';
	
	/**
	 * Class Constructor
	 *
	 */
	function OM4_Typekit() {
		
		// Store the name of the directory that this plugin is installed in
		$this->dirname = str_replace('/typekit.php', '', plugin_basename(__FILE__));

		register_activation_hook(__FILE__, array($this, 'Activate'));

		add_action('init', array($this, 'Initialise'));
		
		add_action('wp_head', array($this, 'HeaderCode'), 99);

		$data = get_option($this->optionName);
		if (is_array($data)) {
			$this->installedVersion = intval($data['version']);
			$this->settings = $data['settings'];
		}

		if ( is_ssl() ) $this->scheme = 'https';
	}
	
	/**
	 * Load up the localization file if we're using WordPress in a different language.
	 *
	 * Place it in this plugin's "languages" folder and name it "om4-typekit-[value in wp-config].mo".
	 *
	 * See languages/_readme.txt for more information.
	 *
	 */
	function LoadDomain() {
		load_plugin_textdomain( 'om4-typekit', false, "{$this->dirname}/languages" );
	}
	
	/**
	 * Plugin Activation Tasks
	 *
	 */
	function Activate() {
		// There aren't really any installation tasks at the moment
		if (!$this->installedVersion) {
			$this->installedVersion = $this->dbVersion;
			$this->SaveSettings();
		}
	}
	
	/**
	 * Performs any upgrade tasks if required
	 *
	 */
	function CheckVersion() {
		if ($this->installedVersion != $this->dbVersion) {
			// Upgrade tasks
			if ($this->installedVersion == 0) {
				$this->installedVersion++;
			}
			$this->SaveSettings();
		}
	}
	
	/**
	 * Initialise the plugin.
	 * Set up the admin interface if necessary
	 */
	function Initialise() {
		
		$this->LoadDomain();
		
		$this->CheckVersion();
		
		if (is_admin()) {
			// WP Dashboard
			require_once('typekit-admin.php');
			$this->admin = new OM4_Typekit_Admin( $this );
		}
	}
	
	/**
	 * Saves the plugin's settings to the database
	 */
	function SaveSettings() {
		$data = array_merge(array('version' => $this->installedVersion), array('settings' => $this->settings));
		update_option($this->optionName, $data);
	}
	
	/*
	 * Retrieve the Typekit embed code if the unique account id has been set
	 * @return string The typekit embed code if the unique account ID has been set, otherwise an empty string
	 */
	function GetEmbedCode() {
		if ('' != $id = $this->GetAccountID()) return sprintf($this->embedcode, $id);
		return '';
	}
	
	/**
	 * Get the stored Typekit Account ID
	 * @return string The account ID if it has been specified, otherwise an empty string
	 */
	function GetAccountID() {
		if (strlen($this->settings['id'])) return $this->settings['id'];
		return '';
	}
	
	/**
	 * Extract the unique account id from the JavaScript embed code
	 * @param string JavaScript embed code
	 */
	function ParseEmbedCode($code) {
		$matches = array();
		
		$this->settings['id'] = '';
		// Attempt to extract the kit ID from the embed code using our regular expression
		if ( preg_match($this->embedcoderegexp, $code, $matches) && 4 == sizeof($matches) ) {
			$this->settings['id'] = $matches[3];
		}
	}
	
	/*
	 * Retrieve the custom CSS rules
	 * @return string The custom CSS rules
	 */
	function GetCSSRules() {
		return $this->settings['css'];
	}
	
	/**
	 * Parse and save the custom css rules.
	 * The input is santized by stripping all HTML tags
	 * @param string CSS code
	 */
	function SetCSSRules($code) {
		$this->settings['css'] = '';
		$code = strip_tags($code);
		if (strlen($code)) $this->settings['css'] = $code;
	}
	
	/**
	 * Display the plugin's javascript and css code in the site's header
	 */
	function HeaderCode() {
?>

<!-- BEGIN Typekit Fonts for WordPress -->
<?php
		echo $this->GetEmbedCode();
		
		if (strlen($this->settings['css'])) {
		?>

<style type="text/css">
<?php echo $this->settings['css']; ?>
</style>
<?php
		}
?>

<!-- END Typekit Fonts for WordPress -->

<?php
	}

}

if(defined('ABSPATH') && defined('WPINC')) {
	if (!isset($GLOBALS["OM4_Typekit"])) {
		$GLOBALS["OM4_Typekit"] = new OM4_Typekit();
	}
}

?>