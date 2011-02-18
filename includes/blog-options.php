<?php
function WS_ShowBlogOptions( ) {
	global $_POST , $blog_option_name , $blog_option , $plugin_domain;
	if ( isset( $_POST[ 'theme' ] ) )
	{
		$blog_option[ 'width' ] = $_POST[ 'width' ];
		$blog_option[ 'theme' ] = $_POST[ 'theme' ];
		update_option( $blog_option_name , $blog_option );
	}
	echo '<h2>' 
		. __( 'WindStyle' , $plugin_domain ) 
		. ' ' 
		. __( 'MultiSite Nav Bar' , $plugin_domain ) 
		. '</h2>';
	echo '<form action="" method="post">';
	echo '<p>' 
		. __( 'Nav Bar Width:' , $plugin_domain ) 
		. '<br/><input name="width" type="text" size="25" value="'
		. $blog_option[ 'width' ]
		. '"/>px</p>';
	echo '<p>'
		. __( 'Themes:' , $plugin_domain ) 
		. '<br/>';
	WS_RenderStyleList();
	echo '</p>';
	echo '<p><input type="submit" name="submit" value="' 
		. __( 'Save' , $plugin_domain ) 
		. '"/></p>';
	echo '</form>';
}

function WS_RenderStyleList( ) {
	global $blog_option , $plugin_dir;
	$dir = $plugin_dir . '/themes';
	echo '<select name="theme" style="width:200px">';
	if( is_dir( $dir ) ) { 
		if( $dh = opendir( $dir ) ) { 
      			while( ( $file = readdir( $dh ) ) !== false ) { 
				if( $file != '.' 
					&& $file != '..' 
					&& eregi( '.css$' , $file ) ) { 
					echo '<option ';
					if(eregi( '^'
						. $blog_option[ 'theme' ]
						. '$' , $file ) ) {
						echo ' selected="selected" ';
					}
					 echo ' value="'
							. $file
							. '">'
							. $file
							. '</option>'; 
				} 
			} 
			closedir($dh); 
		} 
	} 
	echo '</select>';
}
?>
