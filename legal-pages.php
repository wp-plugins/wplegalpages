<?php
/*
Plugin Name: WP Legal Pages
Plugin URI: http://wplegalpages.com
Description: Wp Legal Pages is a simple 1 click legal page management plugin. You can quickly add in legal pages to your wordpress sites. Furthermore the business information you fill in the general settings will be automatically filled into the appropriate places within the pages due to our custom integration system we have.
Author: WPEka 
Version: 1.0.1
Author URI: http://wplegalpages.com/
*/
if ( ! defined( 'ABSPATH' ) ) exit;
require_once( 'legalPages.php' );
global $wp_version;
$exit_msg = __('WP Legal Pages has been tested and implemented only on WP 2.0 and higher. To ensure usability <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>','legal-pages');

if(version_compare($wp_version, "2.0", "<"))
	echo $exit_msg;

$lpObj = new legalPages();
if (isset($lpObj))
{
	register_deactivation_hook( __FILE__, array($lpObj,	'deactivate') );
}
?>
