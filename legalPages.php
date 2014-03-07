<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if ( !class_exists('legalPages') ) :
	class legalPages
	{		
		function legalPages()
		{	
			add_action('admin_menu', array($this, 'admin_menu'));
			add_action( 'init', array( $this, 'admin_css' ) );
			add_filter('the_content', array($this,'lpShortcode'));
			add_filter('the_excerpt', array($this,'lpShortcode'));
		}

		function admin_menu()
		{
			add_menu_page(__('Legal Pages','legal-pages'), 'Legal Pages', 'manage_options', 'legal-pages', array($this, 'adminSetting'));
			$terms = get_option('lp_accept_terms');
			if($terms == 1){
				add_submenu_page(__('legal-pages','legal-pages'), 'Settings', 'Settings', 'manage_options', 'legal-pages', array($this, 'adminSetting'));
				add_submenu_page(__('legal-pages','legal-pages'), 'Legal Pages', 'Legal Pages', 'manage_options', 'showpages', array($this, 'showpages'));
				add_submenu_page(__('legal-pages','legal-pages'), 'Create Page', 'Create Page', 'manage_options', 'lp-create', array($this, 'createPage'));			
			}
		}

		function admin_css() {
		  if (isset($_GET['page'])) { 
            if ($_GET['page'] == "lp-create" ||$_GET['page'] == "legal-pages") {
               wp_enqueue_style('legalpagecss',WP_PLUGIN_URL."/legal-pages/style.css" );
               wp_enqueue_style('legalpagecss');
             }
		  }
		}
		
		function createPage()
		{
			include_once('createPage.php');
		}
		
	    function showpages()
		{
			include_once('showpages.php');
		}
		
		function adminSetting()
		{
			include_once("adminSetting.php");
		}
			
		function deactivate()
		{
			delete_option('lp_accept_terms');
		}
		
		function lpShortcode($content)
		{
			$lp_find = array("[Domain]","[Business Name]","[Phone]","[Street]","[City, State, Zip code]","[Country]","[Email]","[Address]","[Niche]");
			$lp_general = get_option('lp_general');
			$cont = str_replace($lp_find,$lp_general,stripslashes($content));
			return $cont;
		}
		
		function lp_enqueue_editor() 
		{
			wp_enqueue_script('common');
			wp_enqueue_script('jquery-affect');
			wp_admin_css('thickbox');
			wp_enqueue_script('post');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-tabs');
			wp_enqueue_script('tiny_mce');
			wp_enqueue_script('editor');
			wp_enqueue_script('editor-functions');
      		wp_print_scripts('wplink');
			wp_print_styles('wplink');
			add_action('tiny_mce_preload_dialogs', 'wp_link_dialog');
		
			add_thickbox();
			
			wp_admin_css();
			wp_enqueue_script('utils');
			do_action("admin_print_styles-post-php");
			do_action('admin_print_styles');
		
		}
	}
else :
	exit ("Class legalPages already declared!");
endif;
?>
