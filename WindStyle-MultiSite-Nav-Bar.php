<?php
/*
Plugin Name: WindStyle MultiSite Nav Bar
Plugin URI: http://coding.windstyle.cn/apps/windstyle-multisite-nav-bar-for-wordpress/
Description: MultiSite navigation bar for Wordpress 3.0+. 针对Wordpress 3.0+的多站点导航栏插件。
Author: Windie Chai
Version: 1.4.0
Author URI: http://windstyle.cn
*/

$plugin_domain = 'navbar';
$plugin_dir = dirname( __FILE__ );
$plugin_dir_name = basename( $plugin_dir );

require( $plugin_dir . '/includes/functions.php' );
if( is_admin( ) ) { 
	require( $plugin_dir . '/includes/blog-options.php' ); 
	require( $plugin_dir . '/includes/site-options.php' );
}
else {
	require( $plugin_dir . '/includes/ui.php' );
}


$site_option_name = 'windstyle_multisite_nav_bar_site_option';
$site_option_default = array( 'logo_url' => '' , 'link_category' => '' );
$site_option = get_site_option( $site_option_name , $site_option_default );

$blog_option_name = 'windstyle_multisite_nav_bar_blog_option';
$blog_option_default = array( 'width' => '' , 'style' => '' );
$blog_option = get_option( $blog_option_name, $blog_option_default);

add_action( 'admin_menu' , 'WS_AddOption' );
load_plugin_textdomain( $plugin_domain , 
	false , 
	$plugin_dir_name . '/languages' );


function WS_AddOption( ) {
	global $blog_option_name , $plugin_domain; 
	add_options_page( $blog_option_name , 
		__('MultiSite Nav Bar', $plugin_domain) , 
		'administrator' , 
		'includes/blog-options.php' , 
		'WS_ShowBlogOptions' ); 
	if( wpmu_site_admin( ) ) {
		add_submenu_page( 'ms-admin.php' ,
			__('MultiSite Nav Bar', $plugin_domain) , 
			__('MultiSite Nav Bar', $plugin_domain) , 
			'administrator' , 
			'includes/site-options.php' , 
			'WS_ShowSiteOptions' );  
	} 
}
?>
