<?php

function WS_ShowSiteOptions( ) {
	global $_POST , $site_option_name , $site_option , $plugin_domain;
	if ( isset( $_POST[ 'logo_url' ] ) )
	{
		$site_option [ 'logo_url' ] = $_POST[ 'logo_url' ];
		$site_option [ 'link_category' ] = $_POST[ 'link_category' ];
		update_site_option( $site_option_name , $site_option );
	}
	echo '<h2>' 
		. __( 'WindStyle' , $plugin_domain ) 
		. ' ' 
		. __( 'MultiSite Nav Bar' , $plugin_domain ) 
		. '</h2>';
	echo '<form action="" method="post">';
	echo '<p>' 
		. __( 'Site Logo Url:' , $plugin_domain ) 
		. '<br/><input name="logo_url" type="text" size="50" value="'
		. $site_option[ 'logo_url' ]
		. '"/></p>';
	echo '<p>' . __( 'Links Category:', $plugin_domain ) . '<br/>';
	WS_RenderBookmarkCategories();
	echo '</p>';
	echo '<p><input type="submit" name="submit" value="' 
		. __( 'Save' , $plugin_domain ) 
		. '"/></p>';
	echo '</form>';
}

function WS_RenderBookmarkCategories( ) {
	global $site_option , $plugin_domain;
	switch_to_blog(1);
	$taxonomy = 'link_category';
	//$title = 'Link Category: ';
	$args = '';
	$terms = get_terms( $taxonomy , $args );
	if( $terms ) {
		echo '<select name="link_category" style="width:200px">';
		echo '<option ';
		if( intval( $site_option[ "link_category" ] ) == -1 ) {
			echo ' selected="selected" ';
		}
		echo 'value="-1">'
			. __( 'Do not display', $plugin_domain )
			. '</option>';
			
		foreach( $terms as $term ) {			
			echo '<option ';
			if( $term -> term_id == intval( $site_option[ "link_category" ] ) ) {
				echo ' selected="selected" ';
			}
			echo  'value="'
				. $term->term_id
				. '">'
				. $term->name 
				. '</option>';			
		}
		echo '</select>';
	}
	restore_current_blog();
}
?>
