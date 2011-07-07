<?php

add_action('admin_bar_menu', 'WS_AddMenus');//wp_before_admin_bar_render
function WS_AddMenus()
{
	WS_AddSiteInfo( );
	WS_AddBlogs( );
	WS_AddBookmarks( );
}
show_admin_bar(true);

function WS_AddBookmarks( ) {
	global  $wp_admin_bar, $site_option, $plugin_domain;
	$cate_id = $site_option['link_category'];
	if($cate_id == -1)
		return;
	switch_to_blog(1);	
	$wp_admin_bar->add_menu( array( 'id' => 'WS_TNB_bookmarks', 
		'title' => get_term( $cate_id , 'link_category' )->name, 
		'href' => '#' ) );
	$links = get_bookmarks( 'category=' . $cate_id );
	foreach( $links as $link ) {
		$html = '';
		if( $link->link_image != '' ){
			$html .= '<img src="'
				. $link->link_image
				. '" alt="'
				. $link->link_description
				. '" class="blavatar"/>';
		}
		$html .= $link->link_name;
		$wp_admin_bar->add_menu( array( 'parent' => 'WS_TNB_bookmarks',
			'id' => 'WS_TNB_bookmark_' . $link->link_id, 
			'title' => $html, 
			'href' => $link->link_url ) );
	}
	restore_current_blog();
}

function WS_AddSiteInfo( ){
	global $wp_admin_bar, $site_option;
	$current_site = get_current_site( );
	$logo = $site_option[ 'logo_url' ];
	$html = '';
	if( isset( $logo ) ) {
		$html .= '<img src="' 
			. $logo 
			. '" alt="' 
			. $current_site -> site_name 
			. '"/>';
	} else {
		$html .= $current_site -> site_name;
	}
	$wp_admin_bar->add_menu( array( 'id' => 'WS_TNB_site', 
		'title' => $html, 
		'href' => 'http://' . $current_site -> domain ) );
}

function WS_AddBlogs( ) {
	global $wp_admin_bar;
	$blog_list = get_blog_list( 0, 'all' );
	foreach( $blog_list AS $blog ) {
		if( $blog[ 'blog_id' ] == 1 )
			continue;
		$blog = get_blog_details( $blog[ 'blog_id' ] );
 		$wp_admin_bar->add_menu( array( 'id' => 'WS_TNB_blog_' . $blog->blog_id, 
		'title' => $blog -> blogname, 
		'href' => $blog -> siteurl ) );
	}
	return $result;
}
?>
