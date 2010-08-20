<?php

add_action( 'wp_head' , 'WS_WriteCSS' );
add_action( 'wp_head' , 'WS_RenderBar' );

function WS_RenderBar( ) {
	global $site_option;
	$current_site = get_current_site( );
	$logo = $site_option[ 'logo_url' ];
	$hasLogo = isset( $logo );

	echo '<div id="WS_TNB"><div><h1>';
	echo '<a href="http://' 
		. $current_site -> domain . 
		'" title="' 
		. $current_site -> site_name 
		. '">';
	if( $hasLogo ) {
		echo '<img src="' 
			. $logo 
			. '" alt="' 
			. $current_site -> site_name 
			. '"/>';
	} else {
		echo  $current_site -> site_name;
	}
	echo '</a>';
	echo '</h1><ul>';

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
	//wp_list_bookmarks( 'category=' .$option['LinkCategory'].'&title_li=0&categorize=0');
  	echo '</ul></div></div>';
}

function WS_WriteCSS( ) {
	global $blog_option;
	echo '<link rel="stylesheet" href="'
		. get_plugin_dir_url()
		. '/themes/' 
		. $blog_option[ 'theme' ] 
		. '" type="text/css" />';
	echo '<style type="text/css">
 		#WS_TNB div{
			width:' . $blog_option[ 'width' ] . 'px
		}
		</style>';
}
?>
