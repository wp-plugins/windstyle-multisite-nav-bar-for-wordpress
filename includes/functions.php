<?php
function wpmu_site_admin( ) {
	if ( function_exists( 'is_site_admin' ) 
		&& function_exists( 'wp_get_current_user' ) )
		if ( is_site_admin( ) )
			return true;			
	return false;
}

function get_plugin_dir_url( ) {
	global $plugin_dir_name;
	return WP_PLUGIN_URL 
		. '/' 
		. str_replace( basename(  __FILE__ ) , 
			'' , 
			$plugin_dir_name);
}
?>
