<?php
/*
Plugin Name: WindStyle MultiSite Nav Bar
Plugin URI: http://windstyle.cn/
Description: MultiSite navigation bar for Wordpress 3.0+.
Author: Windie Chai
Version: 1.1.0
Author URI: http://windstyle.cn
*/

$optionName = 'WindStyle-MultiSite-Nav-Bar-Option';
$data = array('LogoUrl'=>'','Width'=>'','Style'=>'');

add_option($optionName, $data);
add_action('admin_menu', 'WS_AddOption');
add_action('wp_head', 'WS_WriteCSS');
add_action('wp_head', 'WS_RenderBar');

$option = get_option($optionName);

function WS_AddOption() {
  add_options_page('WindStyle MultiSite Nav Bar Option', 'MultiSite Nav Bar', 'administrator', basename(__FILE__), 'WS_ShowOptions');
}

function WS_ShowOptions() {
  global $_POST, $optionName, $option;
  if (isset($_POST['WS_Style']))
  {
    $option['LogoUrl'] = $_POST['WS_LogoUrl'];
    $option['Width'] = $_POST['WS_Width'];
    $option['Style'] = $_POST['WS_Style'];
    update_option($optionName, $option);
  }
  echo '<h2>顶部导航栏 选项</h2>';
  echo '<form action="" method="post">';
  echo '<p>Logo地址：<br/><input name="WS_LogoUrl" type="text" size="50" value="'.$option['LogoUrl'].'"/></p>';
  echo '<p>导航内容宽度：<br/><input name="WS_Width" type="text" size="25" value="'.$option['Width'].'"/>px</p>';
  //echo '<p>链接分类目录：<br/>';
  //WS_RenderBookmarkCategories();
  //echo '</p>';
  echo '<p>样式：<br/>';
  WS_RenderStyleList();
  echo '</p>';
  echo '<p><input type="submit" name="submit" value="保存"/></p>';
  echo '</form>';
}

function WS_RenderStyleList()
{
  global $option;
  $dir = ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),'',plugin_basename(__FILE__)).'Themes';
  echo '<select name="WS_Style" style="width:200px">';
  if (is_dir($dir)) { 
    if ($dh = opendir($dir)) 
    { 
       while (($file = readdir($dh)) !== false) 
       { 
         if ($file!='.' && $file!='..' && eregi('.css$', $file)) 
         { 
           echo '<option ';
           if(eregi('^'.$option["Style"].'$', $file))
           {
             echo ' selected="selected" ';
           }
           echo ' value="'.$file.'">'.$file.'</option>'; 
         } 
      } 
      closedir($dh); 
    } 
  } 
  echo '</select>';
}

function WS_RenderBookmarkCategories()
{
  global $option;
  $taxonomy = 'link_category';
  $title = 'Link Category: ';
  $args ='';
  $terms = get_terms( $taxonomy, $args );
  if ($terms) 
  {
    echo '<select name="WS_LinkCategory" style="width:200px">';
    foreach($terms as $term) 
    {
      if ($term->count > 0)
      {
        echo '<option ';
        if($term->term_id == intval($option["LinkCategory"]))
        {
          echo ' selected="selected" ';
        }
        echo  'value="'.$term->term_id.'">'. $term->name .'</option>';
      }
    }
    echo '</select>';
  }
}

function WS_RenderBar()
{
  global $option;
  $current_site = get_current_site();
  $logo = $option['LogoUrl'];
  $hasLogo = isset($logo);

  echo '<div id="WS_TNB"><div><h1>';
  echo '<a href="http://' . $current_site->domain . '" title="' . $current_site->site_name . '">';
  if($hasLogo)
  {
    echo '<img src="' . $logo . '" alt="' . $current_site->site_name . '"/>';
  }
  else
  {
    echo  $current_site->site_name;
  }
  echo '</a>';
  echo '</h1><ul>';

  $blog_list = get_blog_list( 0, 'all' );
  foreach ($blog_list AS $blog) {
    if($blog['blog_id'] == 1)
      continue;
    $blog = get_blog_details($blog['blog_id']);
    echo '<li><a href="' . $blog->siteurl . '" title="' . $blog->blogname . '">' . $blog->blogname . '</a></li>';
  }
  //wp_list_bookmarks('category='.$option['LinkCategory'].'&title_li=0&categorize=0');
  echo '</ul></div></div>';
}

function WS_WriteCSS()
{
  global $option;
  echo '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),'',plugin_basename(__FILE__)).'Themes/'.$option['Style'].'" type="text/css" />';
  echo '<style type="text/css">
    #WS_TNB div{
      width:' . $option['Width'] . 'px
    }
    </style>';
}
?>
