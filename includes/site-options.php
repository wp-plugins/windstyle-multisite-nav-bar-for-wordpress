<?php

function WS_ShowSiteOptions( ) {
	global $_POST , $site_option_name , $site_option , $plugin_domain;
	if ( isset( $_POST[ 'logo_url' ] ) )
	{
		$site_option [ 'logo_url' ] = $_POST[ 'logo_url' ];
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
	//echo '<p>' . __( 'Links Category:', $plugin_domain ) . '<br/>';
	//WS_RenderBookmarkCategories();
	//echo '</p>';
	echo '<p><input type="submit" name="submit" value="' 
		. __( 'Save' , $plugin_domain ) 
		. '"/></p>';
	echo '</form>';
}

function WS_RenderBookmarkCategories( ) {
	global $site_option;
	$taxonomy = 'link_category';
	$title = 'Link Category: ';
	$args = '';
	$terms = get_terms( $taxonomy , $args );
	if( $terms ) {
		echo '<select name="WS_LinkCategory" style="width:200px">';
		foreach( $terms as $term ) {
			if( $term->count > 0) {
				echo '<option ';
				if( $term -> term_id == intval( $site_option[ "LinkCategory" ] ) ) {
					echo ' selected="selected" ';
				}
				echo  'value="'
					. $term->term_id
					. '">'
					. $term->name 
					. '</option>';
			}
		}
		echo '</select>';
	}
}
?>
