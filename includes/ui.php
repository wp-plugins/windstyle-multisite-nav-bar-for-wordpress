<?php

add_action( 'wp_head' , 'WS_WriteCSS' );
add_action( 'wp_head' , 'WS_WriteJS' );
add_action( 'wp_head' , 'WS_RenderBar' );

function WS_RenderBar( ) {
	echo '<div id="WS_TNB"><div>';
	WS_WriteSiteInfo( );
	echo '<ul>';
	WS_WriteBlogs( );
	$bookmark = WS_GetBookmarks( );
	echo $bookmark[ 'menu_link' ];
  	echo '</ul></div><div id="WS_TNB_SUBMENUS">';
	echo $bookmark[ 'menu_content' ];
	echo '</div></div>';
}

function WS_WriteSiteInfo( ){
	global $site_option;
	$current_site = get_current_site( );
	$logo = $site_option[ 'logo_url' ];
	echo '<h1><a href="http://' 
		. $current_site -> domain . 
		'" title="' 
		. $current_site -> site_name 
		. '">';
	if( isset( $logo ) ) {
		echo '<img src="' 
			. $logo 
			. '" alt="' 
			. $current_site -> site_name 
			. '"/>';
	} else {
		echo  $current_site -> site_name;
	}
	echo '</a>';
	echo '</h1>';
}

function WS_WriteBlogs( ) {
	$blog_list = get_blog_list( 0, 'all' );
	foreach( $blog_list AS $blog ) {
		if( $blog[ 'blog_id' ] == 1 )
			continue;
		$blog = get_blog_details( $blog[ 'blog_id' ] );
 		echo '<li><a href="' 
			. $blog -> siteurl 
			. '" title="' 
			. $blog -> blogname 
			. '">' 
			. $blog -> blogname 
			. '</a></li>';
	}
}

function WS_GetBookmarks( ) {
	global $site_option, $plugin_domain;
	$cate_id = $site_option['link_category'];
	if($cate_id == -1)
		return;
	$result = array( 'menu_link' => '' , 'menu_content' => '' );
	switch_to_blog(1);	
	$result[ 'menu_link' ] = '<li><a href="#" onclick="showBookmarks(this)">'
			. get_term( $cate_id , 'link_category' )->name
			. '</a></li>';
	$result[ 'menu_content' ] = '<ul id="WS_TNB_Links" style="display:none;">';
	$links = get_bookmarks( 'category=' . $cate_id );
	foreach( $links as $link ) {
		$result[ 'menu_content' ] .= '<li><a href="' 
			. $link->link_url 
			. '" target="_blank" title="' 
			. $link->link_description
			. '">';
		if( $link->link_image != '' ){
			$result[ 'menu_content' ] .= '<img src="'
				. $link->link_image
				. '" alt="'
				. $link->link_description
				. '"/>';
		}
		$result[ 'menu_content' ] .= $link->link_name . '</a></li>';
	}
	$result[ 'menu_content' ] .= '</ul>';
	restore_current_blog();
	return $result;
}

function WS_WriteCSS( ) {
	global $blog_option;
	echo '<link rel="stylesheet" href="'
		. get_plugin_dir_url()
		. '/themes/' 
		. $blog_option[ 'theme' ] 
		. '" type="text/css" />';
	echo '<style type="text/css">
 		#WS_TNB div {
			width:' . $blog_option[ 'width' ] . 'px
		}
		#WS_TNB_SUBMENUS {
			display:none;
		}
		#WS_TNB_Links {
			position:absolute;
			z-index:10;		
		}
		#WS_TNB_Links img {
			margin-right:5px;
		}
		</style>';
}

function WS_WriteJS( ) {
	echo '<script type="text/javascript">
		function showBookmarks(menu_item) {
			var links_ul = document.getElementById("WS_TNB_Links");
			var submenus = document.getElementById("WS_TNB_SUBMENUS");
			if( links_ul.style.display == "block" ) {
				links_ul.style.display = "none";
				submenus.style.display = "none";
				menu_item.className = "";
			} else {
				links_ul.style.display = "block";
				submenus.style.display = "block";
				menu_item.className = "current_menu";
			}
		}
	</script>';
}
?>
