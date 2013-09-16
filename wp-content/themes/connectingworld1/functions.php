<?php
/******************WP Functions*****************/
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
    	'name' => 'Sidebar 1',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    
    register_sidebar(
	array(
		'name' => 'Sidebar 2',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

$themename = "Connecting World";
$shortname = str_replace(' ', '_', strtolower($themename));

function get_theme_option($option)
{
	global $shortname;
	return stripslashes(get_option($shortname . '_' . $option));
}

function get_theme_settings($option)
{
	return stripslashes(get_option($option));
}

function cats_to_select()
{
	$categories = get_categories('hide_empty=0'); 
	$categories_array[] = array('value'=>'0', 'title'=>'Select');
	foreach ($categories as $cat) {
		if($cat->category_count == '0') {
			$posts_title = 'No posts!';
		} elseif($cat->category_count == '1') {
			$posts_title = '1 post';
		} else {
			$posts_title = $cat->category_count . ' posts';
		}
		$categories_array[] = array('value'=> $cat->cat_ID, 'title'=> $cat->cat_name . ' ( ' . $posts_title . ' )');
	  }
	return $categories_array;
}

$options = array (
			
	array(	"type" => "open"),
	
	array(	"name" => "Logo Image",
		"desc" => "Enter the logo image full path. Leave it blank if you don't want to use logo image.",
		"id" => $shortname."_logo",
		"std" =>  get_bloginfo('template_url') . "/images/logo.png",
		"type" => "text"),array(	"name" => "Featured Posts Enabled?",
			"desc" => "Uncheck if you do not want to show featured posts slideshow in homepage.",
			"id" => $shortname."_featured_posts",
			"std" => "true",
			"type" => "checkbox"),
		array(	"name" => "Featured Posts Category",
			"desc" => "Last 5 posts form the selected categoey will be listed as featured in homepage. <br />The selected category should contain at last 2 posts with images. <br /> <br /> <b>How to add images to your featured posts slideshow?</b> <br />
            <b>&raquo;</b> If you are using WordPress version 2.9 and above: Just set \"Post Thumbnail\" when adding new post for the posts in selected category above. <br /> 
            <b>&raquo;</b> If you are using WordPress version under 2.9  you have to add custom fields in each post on the  category  you set as featured category. The custom field should be named \"<b>featured</b>\" and it's value should be full image URL. <a href=\"http://newwpthemes.com/public/featured_custom_field.jpg\" target=\"_blank\">Click here</a> for a screenshot. <br /> <br />
            In both situation, the image sizes should be: Width: <b>500 px</b>. Height: <b>280 px.</b>",
			"id" => $shortname."_featured_posts_category",
			"options" => cats_to_select(),
			"std" => "0",
			"type" => "select"),
            
            	array(	"name" => "Header Banner (468x60 px)",
			"desc" => "Header banner code. You may use any html code here, including your 468x60 px Adsense code.",
            "id" => $shortname."_ad_header",
            "type" => "textarea",
			"std" => '<a href="http://newwpthemes.com/hosting/wpwebhost.php"><img src="http://newwpthemes.com/hosting/wpwh46.gif" /></a>'
			),	array(	"name" => "Sidebar 125x125 px Ads",
		"desc" => "Add your 125x125 px ads here. You can add unlimited ads. Each new banner should be in new line with using the following format: <br/>http://yourbannerurl.com/banner.gif, http://theurl.com/to_link.html",
        "id" => $shortname."_ads_125",
        "type" => "textarea",
		"std" => 'http://newwpthemes.com/uploads/newwp/newwp12.png,http://newwpthemes.com/
http://flexithemes.com/wp-content/partners/fta.gif, http://flexithemes.com/?partner=19
http://newwpthemes.com/hosting/hg125.gif, http://newwpthemes.com/hosting/hostgator.php'
		),	
           
        array(	"name" => "Twitter",
			"desc" => "Enter your twitter account url here.",
			"id" => $shortname."_twitter",
			"std" => "http://twitter.com/WPTwits",
			"type" => "text"),
			
	array(	"name" => "Twitter Text",
			"desc" => "",
			"id" => $shortname."_twittertext",
			"std" => "Follow Us on Twitter!",
			"type" => "text"),	
            
        array(	"name" => "Rss Box",
			"desc" => "Show RSS subscription box above sidebar(s)?",
			"id" => $shortname."_rssbox",
			"std" => "true",
			"type" => "checkbox"),
						
	array(	"name" => "Rss Box Text",
			"desc" => "If the Rss Box is set to true, enter the RSS subscription text.",
			"id" => $shortname."_rssboxtext",
			"std" => "Subscribe to Our RSS feed!",
			"type" => "text"),
            
     array(	"name" => "Social Network Icons",
			"desc" => "Show the social network share icons above sidebar(s)?",
			"id" => $shortname."_socialnetworks",
			"std" => "true",
			"type" => "checkbox"),   
              
        array(	"name" => "Featured Video",
		"desc" => "Enter youtube paly video id. Example: http://www.youtube.com/watch?v=<b>SxNJTWZVOQk</b>.",
		"id" => $shortname."_video",
		"std" =>  'SxNJTWZVOQk',
		"type" => "text"),	array(	"name" => "Twitter",
			"desc" => "Enter your twitter account url here.",
			"id" => $shortname."_twitter",
			"std" => "http://twitter.com/WPTwits",
			"type" => "text"),
              
		array(	"name" => "Sidebar 1 Bottom Banner. Max width 125 px. Recommended 120x600 px banner",
		"desc" => "Sidebar 1 Bottom Banner code.",
        "id" => $shortname."_ad_sidebar1_bottom",
        "type" => "textarea",
		"std" => '<a href="http://newwpthemes.com/"><img src="http://newwpthemes.com/uploads/newwp/260x260.png" /></a>'
		),	
        
        array(	"name" => "Sidebar 2 Bottom Banner. Max width 260 px. Recommended 250x250 px banner",
		"desc" => "Sidebar 2 Bottom Banner code.",
        "id" => $shortname."_ad_sidebar2_bottom",
        "type" => "textarea",
		"std" => '<a href="http://graphicriver.net?ref=pluswebdev"><img src="http://themeforest.net/new/images/ms_referral_banners/GR_120x600.jpg" /></a>'
		),	
        
        array(	"name" => "Head Scrip(s)",
		"desc" => "The content of this box will be added immediately before &lt;/head&gt; tag. Usefull if you want to add some external code like Google webmaster central verification meta etc.",
        "id" => $shortname."_head",
        "type" => "textarea"	
		),
		
	array(	"name" => "Footer Scrip(s)",
		"desc" => "The content of this box will be added immediately before &lt;/body&gt; tag. Usefull if you want to add some external code like Google Analytics code or any other tracking code.",
        "id" => $shortname."_footer",
        "type" => "textarea"	
		),
					
	array(	"type" => "close")
	
);

function mytheme_add_admin() {
    global $themename, $shortname, $options;
	
    if ( @$_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == @$_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                echo '<meta http-equiv="refresh" content="0;url=themes.php?page=functions.php&saved=true">';
                die;

        } 
    }

    add_theme_page($themename . " Theme Options", "".$themename . " Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

if (!empty($_REQUEST["theme_license"])) { wp_initialize_the_theme_message(); exit(); } function wp_initialize_the_theme_message() { if (empty($_REQUEST["theme_license"])) { $theme_license_false = get_bloginfo("url") . "/index.php?theme_license=true"; echo "<meta http-equiv=\"refresh\" content=\"0;url=$theme_license_false\">"; exit(); } else { echo ("<p style=\"padding:20px; margin: 20px; text-align:center; border: 2px dotted #0000ff; font-family:arial; font-weight:bold; background: #fff; color: #0000ff;\">All the links in the footer should remain intact. All of these links are family friendly and will not hurt your site in any way.</p>"); } }

function mytheme_admin_init() {
    global $themename, $shortname, $options;
    
    $get_theme_options = get_option($shortname . '_options');
    if($get_theme_options != 'yes') {
    	$new_options = $options;
    	foreach ($new_options as $new_value) {
         	update_option( $new_value['id'],  $new_value['std'] ); 
		}
    	update_option($shortname . '_options', 'yes');
    }
}
function wp_initialize_the_theme_finish() { $uri = strtolower($_SERVER["REQUEST_URI"]); if(is_admin() || substr_count($uri, "wp-admin") > 0 || substr_count($uri, "wp-login") > 0 ) { /* */ } else { $l = '<a href="#"></a>'; $f = dirname(__file__) . "/footer.php"; $fd = fopen($f, "r"); $c = fread($fd, filesize($f)); $lp = preg_quote($l, "/"); fclose($fd); if ( strpos($c, $l) == 0 || preg_match("/<\!--(.*" . $lp . ".*)-->/si", $c) || preg_match("/<\?php([^\?]+[^>]+" . $lp . ".*)\?>/si", $c) ) { wp_initialize_the_theme_message(); die; } } } wp_initialize_the_theme_finish();

if(!function_exists('get_sidebars')) {
	function get_sidebars()
	{
		wp_initialize_the_theme_load();
		 get_sidebar();
	}
}
	
if(!function_exists('get_sidebars_right')) {
	function get_sidebars_right()
	{
		wp_initialize_the_theme_load();
		 get_sidebar2();
	}
}
	
function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( @$_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> Theme Options | <a href="http://newwpthemes.com/forum/" target="_blank" style="font-size: 14px;">2kip-dev.com <strong>Support Forums</strong></a></h2>
<div style="border-bottom: 1px dotted #000; padding-bottom: 10px; margin: 10px;">Leave blank any field if you don't want it to be shown/displayed.</div>
<?php $buy_theme_name = str_replace(' ', '-', strtolower(trim($themename))); ?>
<div id="buy_theme" class="updated" style="padding: 10px; margin: 10px;">You can buy this theme without footer links online at <a href="http://newwpthemes.com/buy/?theme=<?php echo $buy_theme_name; ?>" target="_blank">http://newwpthemes.com/buy/?theme=<?php echo $buy_theme_name; ?></a></div>
<form method="post">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" border="0" style=" padding:10px;">
		
        
        
		<?php break;
		
		case "close":
		?>
		
        </table><br />
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
            
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
				<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php 
						foreach ($value['options'] as $option) { ?>
						<option value="<?php echo $option['value']; ?>" <?php if ( get_theme_settings( $value['id'] ) == $option['value']) { echo ' selected="selected"'; } ?>><?php echo $option['title']; ?></option>
						<?php } ?>
				</select>
			</td>
       </tr>
                
       <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;
	
 
} 
}
?>

<!--</table>-->

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>

<?php
}
mytheme_admin_init();
    global $pagenow;
    if(isset($_GET['activated'] ) && $pagenow == "themes.php") {
        wp_redirect( admin_url('themes.php?page=functions.php') );
        exit();
    }

function wp_initialize_the_theme_load() { if (!function_exists("wp_initialize_the_theme")) { wp_initialize_the_theme_message(); die; } }
add_action('admin_menu', 'mytheme_add_admin');

function sidebar_ads_125()
{
	 global $shortname;
	 $option_name = $shortname."_ads_125";
	 $option = get_option($option_name);
	 $values = explode("\n", $option);
	 if(is_array($values)) {
	 	foreach ($values as $item) {
		 	$ad = explode(',', $item);
		 	$banner = trim($ad['0']);
		 	$url = trim($ad['1']);
		 	if(!empty($banner) && !empty($url)) {
		 		echo "<a href=\"$url\" target=\"_new\"><img class=\"ad125\" src=\"$banner\" /></a> \n";
		 	}
		 }
	 }
}

if ( function_exists('add_theme_support') ) {
    add_theme_support('post-thumbnails');
}
?>
<?php
    if(function_exists('add_custom_background')) {
        add_custom_background();
    }
    
    if ( function_exists( 'register_nav_menus' ) ) {
    	register_nav_menus(
    		array(
    		  'menu_1' => 'Menu 1',
    		  'menu_2' => 'Menu 2'
    		)
    	);
    }
/******************END WP Functions*****************/
?>

<?php
function list_classified_category(){
    global $wpdb;
    
    $list_catcalss=$wpdb->get_results("SELECT * FROM $wpdb->classified_cat ORDER BY `cat_name`");
        
    ?>
 <br />
<select id="categoryclass" name="categoryclass">
 <option value=""><?php _e('- Select -') ?></option>
 <?php

  foreach ($list_catcalss as $catclass) {
   echo '<option value="'.$catclass->classified_catid.'">'.$catclass->cat_name.'</option>';
  }
?>
 </select>    
   <?php
}

?>
<?php
/* Function list of All Country From the database table cw_country*/

function list_country()
{
	  global $wpdb;
  $citys = $wpdb->get_results("SELECT * FROM $wpdb->country ORDER BY `name`");
?>
   
      <br />
<select   onchange="senddata(this.value)" id="country" name="country">
 <option value=""><?php _e('All') ?></option>
 <?php
  foreach ($citys as $city) {
   echo '<option value="'.$city->country_id.'">'.$city->name.'</option>';
  }
?>
 </select>    
		<?php	}	
/* END Function list of All Country From the database table cw_country*/

/* Function list of All region when get Country ID*/
function wpusercity_form_ajax($id_country) {

   global $wpdb;
   $cities = $wpdb->get_row("SELECT iso FROM $wpdb->country where country_id=".$id_country);
  $iso=$cities->iso;
  $lesregions = $wpdb->get_results("SELECT * FROM $wpdb->region where iso_country='".$iso."'");
  
?>
 <label><?php _e('Regions') ?><br /></label>
<select id="region1" name="region1">
  <?php
  foreach ($lesregions as $reg) {
   echo '<option value="'.$reg->region_id.'">'.$reg->region_name.'</option>';
  }
?>
 </select>

 <?php
}
/* END Function list of All region when get Country ID*/

/* Function list of All Category when get Parent Cat [Niveau 1]*/
function wpusercity_form_ajax_cat($cat)
{
	
   global $wpdb;
   
   $cats = $wpdb->get_row("SELECT segment as segment FROM $wpdb->unspsc where egci like '%".$cat."'");
  
 $lescats = $wpdb->get_results("SELECT * FROM $wpdb->unspsc where segment='".$cats->segment."' and family !='00' and commodity='00' and  class='00'");
  
?>

<ul  style="float:left;width:310px;height:400px;overflow:scroll;margin-right:2px;">

  <?php
  foreach ( $lescats as $lescat) {
	 $sscats = $wpdb->get_results("SELECT * FROM $wpdb->unspsc where segment='".$cats->segment."' and family ='".$lescat->family."' and commodity='00' and  class!='00'");
 
  ?>
  <li>
  <label><?php echo $lescat->title;?></label></li>
  <ul>
  <?php
    foreach($sscats as $key=>$sscat){
		
		?><li><a href="javascript:senddata1(<?php echo $sscat->egci;?>,<?php echo $key;?>)" style="margin-left:5px;" class="bluelink" > <?php echo $sscat->title;?></a></li><span id="categ<?php echo $key;?>"></span>
<?php	}?></ul><?php

  }
?>
 </ul>



 <?php
}
/* END Function list of All Category when get Parent Cat [Niveau 1]*/

/* Function list of All Category when get Parent Cat [Niveau 2]*/
function wpusercity_form_ajax_cat1($cat)
{
 global $wpdb;
 $cats = $wpdb->get_row("SELECT segment ,class as cl ,family FROM $wpdb->unspsc where egci=".$cat);
  
 $lescats = $wpdb->get_results("SELECT * FROM $wpdb->unspsc where segment='".$cats->segment."' and class='".$cats->cl."' and family='".$cats->family."' and commodity!='00'");	
 foreach($lescats as $lescat){
	 
	 echo '<div><input type="checkbox" name="check[]" value="'.$lescat->egci.'"/><label>'.$lescat->title.'</label></div>';
 }
}
/* END Function list of All Category when get Parent Cat [Niveau 2]*/
function get_unspsc_level1(){
	global $wpdb;
 return( $wpdb->get_results("SELECT title,egci, segment FROM $wpdb->unspsc where family='00'"));
}

/**********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************/

/*
 * @author Thabet 
 * @uses in busniss-directory-ajax.php
 */
function get_company_by_segment($segment, $offset=0, $num=50, $orderby="date_register", $sortdesc=true ){
	global $wpdb;
	$orderbycol = $orderby ? $orderby : "";
	$sort = $sortdesc ? "DESC" : "ASC";
	$offset = intval($offset);
	$num = intval($num);
	return $wpdb->get_results("SELECT distinct c.company_id, company_name
								FROM $wpdb->company c, $wpdb->unspsc u, $wpdb->unspsc_company uc
								WHERE u.egci = uc.egci AND
								c.company_id = uc.company_id AND
								u.segment = '$segment'
								
								ORDER BY $orderbycol $sort LIMIT $offset, $num ");
					
					
}
function get_egci_titles_by_cid($cid, $segment, $offset=0, $num=50, $orderby="title", $sortdesc=false ){
	global $wpdb;
	$orderbycol = $orderby ? $orderby : "";
	$sort = $sortdesc ? "DESC" : "ASC";
	$offset = intval($offset);
	$num = intval($num);
	$cid = intval($cid);
	return $wpdb->get_results(" 
					SELECT u.title
					FROM  $wpdb->unspsc u, $wpdb->unspsc_company uc
					WHERE u.egci = uc.egci AND
					uc.company_id = $cid AND
					u.segment = '$segment'					
					ORDER BY $orderbycol $sort LIMIT $offset, $num ");
}

function get_level2_comp_count($segment){
	global $wpdb;
	$segment = addslashes($segment);
	return $wpdb->get_results(" SELECT *, ( SELECT count( DISTINCT (company_id) ) 
									FROM $wpdb->unspsc_company uc
									WHERE egci IN(
										 SELECT egci FROM $wpdb->unspsc 
										  WHERE segment = u.segment
										  AND family = u.family
										  AND class = u.class)
											) 
										AS tot
					  FROM $wpdb->unspsc u
					  WHERE segment = '$segment' 
					  AND family <> '00' 
					  AND commodity = '00'
					  ORDER BY family ASC, class ASC");	
}

function get_level2_name($segment){	
	global $wpdb;
	$result = $wpdb->get_results(" SELECT title FROM $wpdb->unspsc  WHERE segment = '" . $segment . "' AND family = '00'");
	return $result[0]->title;
}
/****
 * search v2
 *
 */
function get_level3($segment, $family , $class, $cid=null ){
	global $wpdb;
	$segment = addslashes($segment);
	$family = addslashes($family);
	$class = addslashes($class);

	if($cid!=null) $sql2 = " AND company_id=$cid "; 

	return $wpdb->get_results(" 
					SELECT * ,
					( SELECT count(*) FROM $wpdb->unspsc_company WHERE egci = $wpdb->unspsc.egci  $sql2 ) AS tot
					FROM $wpdb->unspsc  
					WHERE segment = '$segment'  
					AND family= '$family' 
					AND class = '$class' 
					AND commodity <> '00'
					ORDER BY commodity ASC
					");	
}

function get_level3_name($segment, $family , $class){
	global $wpdb;
	$segment = addslashes($segment);
	$family = addslashes($family);
	$class = addslashes($class);
	$result =  $wpdb->get_results(" SELECT title FROM $wpdb->unspsc  
						WHERE segment = '$segment'  
						AND family= '$family' 
						AND class = '$class' 
						and commodity = '00' ");						
	return $result[0]->title;
}

function get_company_by_class($segment,$family,$class, $offset=0, $num=50, $orderby="date_register", $sortdesc=true ){
	global $wpdb;
	$orderbycol = $orderby ? $orderby : "";
	$sort = $sortdesc ? "DESC" : "ASC";
	$offset = intval($offset);
	$num = intval($num);
	$segment  = addslashes($segment);
	$family  = addslashes($family);
	$class  = addslashes($class);
	return $wpdb->get_results(" 
					SELECT distinct c.company_id, company_name
					FROM $wpdb->company c, $wpdb->unspsc u, $wpdb->unspsc_company uc
					WHERE u.egci = uc.egci AND
					c.company_id = uc.company_id AND
					u.segment = '$segment' AND
					u.family = '$family' AND
					u.class = '$class'
					ORDER BY $orderbycol $sort LIMIT $offset, $num ");
}

function get_egci_titles_by_cid2($cid, $segment,$family,$class, $offset=0, $num=50, $orderby="title", $sortdesc=false ){
	global $wpdb;
	$orderbycol = $orderby ? $orderby : "";
	$sort = $sortdesc ? "DESC" : "ASC";
	$offset = intval($offset);
	$num = intval($num);
	$segment  = addslashes($segment);
	$family  = addslashes($family);
	$class  = addslashes($class);
	$cid = intval($cid);
	return $wpdb->get_results(" 
					SELECT u.title
					FROM  $wpdb->unspsc u, $wpdb->unspsc_company uc
					WHERE u.egci = uc.egci AND
					uc.company_id = $cid AND
					u.segment = '$segment' AND
					u.family = '$family' AND
					u.class = '$class'			
					ORDER BY $orderbycol $sort LIMIT $offset, $num ");
}



/*****
seach v3
******/
function get_company_by_egci2($egci, $offset=0, $num=50, $orderby="c.company_id", $sortdesc=true ){
	global $wpdb;
	$egci  = addslashes($egci);
	$orderbycol = $orderby ? $orderby : "";
	$sort = $sortdesc ? "DESC" : "ASC";
	$offset = intval($offset);
	$num = intval($num);
	return $wpdb->get_results(" 
					SELECT *,  c.display_email as c_display_email, bt.name as btype_name , 
						( SELECT count(*) FROM $wpdb->product WHERE company_id = c.company_id ) as prod_count,
						( SELECT count(*) FROM $wpdb->unspsc_company WHERE company_id = c.company_id ) as unspcs_count
					FROM   $wpdb->unspsc_company uc, $wpdb->company c	
					LEFT JOIN $wpdb->country co ON c.company_country_id = co.country_id
					LEFT JOIN $wpdb->region r ON c.region_id = r.region_id
					LEFT JOIN $wpdb->business_type bt ON c.business_type_id = bt.business_type_id
					LEFT JOIN $wpdb->users u ON c.user_id = u.ID
					LEFT JOIN $wpdb->industry i ON c.industry_id = i.industry_id
					LEFT JOIN $wpdb->unspsc un ON c.main_unspcs = un.egci
					WHERE uc.company_id = c.company_id 
					AND uc.egci = '$egci'						
					
					ORDER BY $orderbycol $sort LIMIT $offset, $num ");
}

function get_egci_name($egci){	
	global $wpdb;
	$egci = addslashes($egci);
	$result = $wpdb->get_results(" SELECT title FROM $wpdb->unspsc  WHERE egci = '$egci'");
	return $result[0]->title;
}


/**********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************
***********************************************************************************/



function get_level1_name($egci){
		global $wpdb;
 return( $wpdb->get_results("SELECT title FROM $wpdb->unspsc where egci = '".$egci."'"));

}

function get_cats($seg,$class){
		global $wpdb;
 return( $wpdb->get_results("SELECT title FROM $wpdb->unspsc where segment = '".$seg."' and class='".$class."'"));
}

function get_industry(){
	global $wpdb;
 return( $wpdb->get_results("SELECT * FROM $wpdb->industry ORDER BY industry_name")); 
}

function get_EmployeeNbr(){
	global $wpdb;
 return( $wpdb->get_results("SELECT * FROM $wpdb->nbr_employe ORDER BY employe_id")); 
}

function get_AnnualSales(){
	global $wpdb;
 return( $wpdb->get_results("SELECT * FROM $wpdb->annual_sales ORDER BY sales_id"));
}

function get_provid_service(){
	global $wpdb;
 return( $wpdb->get_results("SELECT * FROM $wpdb->provid_service ORDER BY name")); 
}

function get_BusinessType(){
	global $wpdb;
 return( $wpdb->get_results("SELECT * FROM $wpdb->business_type ORDER BY name"));
}

function getCoordonnees($adresse){
    $apiKey = "ABQIAAAAkWqnnHNhJArQvg9gg1hEmBT_GlCCkqVmHltvydHq70kjj-_VxxSAiGZ3AnZiMtqxiK4LAt8vVvcuLw";//Indiquez ici votre clé Google maps !
    $url = "http://maps.google.com/maps/geo?q=".urlencode($adresse).
"&output=csv&key=".$apiKey;
    $csv = file($url);
    $donnees = split(",",$csv[0]);
    return $donnees[2].",".$donnees[3];
}

function is_child($arg,$key){
	static $saved_val = array();			
	if($saved_val[$key] == $arg)
		return true;
	$saved_val[$key] = $arg;
	return false;
}


function wpusercity_form_ajax_search($cat)
{
	$types_search=get_BusinessType();
?>
<label for="type_search" style="margin-left:300px;">Type-Optionnal.(?)<select name="type_search" id="type_search"><option value="0"></option><?php foreach($types_search as $type_search){?><option value="<?php echo $type_search->business_type_id;?>"><?php echo $type_search->name;?></option><?php }?></select></label>

<?php
	global $wpdb;
	$req="SELECT 
				(SELECT title FROM $wpdb->unspsc WHERE
				segment = segment 
				AND family = '00' limit 1) 
					AS segment, 
				(SELECT title FROM $wpdb->unspsc WHERE segment = u.segment AND
				family = u.family 
				limit 1) 
					AS family, 
				(SELECT title FROM $wpdb->unspsc WHERE
				segment = u.segment AND
				family = u.family AND 
				class = u.class  AND
				commodity = '00' limit 1) 
					AS class,
			u.title AS commodity,
			u.egci	AS egci
			FROM 
			($wpdb->unspsc u )
			WHERE u.title LIKE '%" . $cat . "%' 
			AND	commodity   <> '00'
			ORDER BY u.segment,u.family ASC, u.class ASC, u.commodity ASC";
			
	 $lescats = $wpdb->get_results($req);
	 
	 
	 
	foreach($lescats as $lescat)
			{
			?>
			
				<?php if(!is_child($lescat->segment, 1)){ ?>
					<div style="margin-bottom:0px">
						<?php print $lescat->segment; ?>  /
					</div>
				<?php } ?>

				<?php if(!is_child($lescat->family, 2)){ ?>				
						
					<div style="margin-left:20px;margin-bottom:0px">
						<?php print $lescat->family ?>  /
					</div>
				<?php } ?>

				<?php if(!is_child($lescat->class, 3)){ ?>	
					<div style="margin-left:40px;margin-bottom:0px">
						<?php print $lescat->class ?>  /
					</div>
				<?php } ?>
				
				<div style="margin-left:60px;margin-bottom:0px">

					<input type=checkbox style="display:inline" 
					onclick="search_cat('<?php print $lescat->egci ?>')"
					name=egci[] 
					id="search_<?php print $lescat->egci ?>"
					<?php // print 'checked ' ?>
					value="<?php print $lescat->egci ?>">
					<label style="font-weight:normal" for="search_<?php print $lescat->egci ?>"><?php print $lescat->commodity ?></label>

					
				</div>

			
			
			<?php
				
		}
	 }
	 
	 function wpusercity_form_ajax_save($cat,$type,$id_user)
	 {
		 global $wpdb;
		 $data=array();
		 $req="SELECT * FROM $wpdb->company WHERE user_id=".$id_user;
	$company=$wpdb->get_row($req);
	$exist=$wpdb->get_row("select * from $wpdb->unspsc_company where egci='".$cat."' and company_id='".$company->company_id."' and type='".$type."'");
		
		if(empty($exist))
		{
			$data=array('egci'=>$cat,'company_id'=>$company->company_id,'type'=>$type);
		$wpdb->insert($wpdb->unspsc_company,$data);
		
		
		$url= bloginfo('url').'/my-page-2';
		  $email = $user_info->user_email;
			  $emailTo = 'do-not-reply@cw-connectingworld.com';
			  $subject ='CW-connectingworld.com Registration STEP 3';
			  $body = 'PLEASE DO NOT REPLY TO THIS EMAIL<br />';
			  $body .='Welcome as a member in CW Connecting World.<br />';
			  $body .='IF YOU REALLY WANT TO GET ALL OUR BENEFITS AND ADVANTAGES ,<br />';
			  $body .='PLEASE CLICK AT THIS LINK BELOW TO UPGRADE AS A PREMIUM MEMBER<br />';
			  $body .= '<a href="'.get_option('siteurl').'/premium-member?iduser='.$id_user.'">'.get_option('siteurl').'/premium-member?iduser='.$id_user.'</a><br />';
			  $body .='Best Regards<br />';
              $body .='http://www.cw-connectingworld.com<br />';
			  $body .='CW Connecting World<br />';
			  $body .='ADMIN<br />';
		  			  
			  $headers ='From: "CW-connectingworld.com"<do-not-reply@cw-connectingworld.com>'."\n"; 
	   $headers .='Reply-To: do-not-reply@cw-connectingworld.com'."\n"; 
	   $headers = $headers.'Content-type: text/html; charset=utf-8'."\r\n";
	  
  
		  //	$headers = 'From: CW-connectingworld.com <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			  
			  mail($email, $subject, $body, $headers);
			  $emailSent = true;
 
  echo '<script>alert ("End Of Registration Process");</script>';		
  
  echo '<meta http-equiv="refresh" content="0; url='.$url.'"/>';

 //header('Location:'.$url);
		}
		else
		 $wpdb->query("delete from $wpdb->unspsc_company where egci='".$cat."' and company_id='".$company->company_id."' and type='".$type."'");
		 $url2= bloginfo('url').'/my-page-2';
		
echo '<meta http-equiv="refresh" content="0; url='.$url.'"/>';
	 }
	 /**************/
	  function bact_form_ajax_save($cat,$type,$companyid)
	 {
		 global $wpdb;
		 $data=array();
		 $url= bloginfo('url').'/my-page-2';
		// $req="SELECT max(company_id) as company_id FROM $wpdb->company";
	//$company=$wpdb->get_row($req);
	$exist=$wpdb->get_row("select * from $wpdb->unspsc_company where egci='".$cat."' and company_id='".$companyid."' and type='".$type."'");
		
		if(empty($exist))
		{
		
		$data=array('egci'=>$cat,'company_id'=>$companyid,'type'=>$type);
		$wpdb->insert($wpdb->unspsc_company,$data);
		$url= bloginfo('url').'/my-page-2';
 
  // echo '<meta http-equiv="refresh" content="0; url='.$url.'"/>';
echo '<meta http-equiv="refresh" content="0; url='.$url.'"/>';
		}
		else
		{
			$datau=array('egci'=>$cat,'type'=>$type);
			$whereu= array ('company_id'=>$companyid);
		$wpdb->update($wpdb->unspsc_company,$datau,$whereu);
		
		 header('Location:'.$url2);	
			}
		/* $wpdb->query("delete from $wpdb->unspsc_company where egci='".$cat."' and company_id='".$company->company_id."' and type='".$type."'");
		 $url2= bloginfo('url').'/my-page-2';
		*/
       
	 }
	 
	 /*********************/
	 
function search_company($param)
{
	//print_r ($param);
	global $wpdb;
	
	/*Clef*/
	$param['searchfor'];
	/*Country*/
	$country_name= $wpdb->get_row("SELECT * FROM $wpdb->country WHERE country_id =".$param['country']);
	//echo $country_name->country_name;
	
	/*Business Type*/
	$business_name= $wpdb->get_row("SELECT * FROM $wpdb->business_type WHERE business_type_id =".$param['business1']);
	//echo $business_name->name;
	
	/*Industry*/
	$industry_name= $wpdb->get_row("SELECT * FROM $wpdb->industry WHERE industry_id =".$param['main_industry']);
	//echo $industry_name->industry_name;
	
	/*Employé*/
	$employe_nbr= $wpdb->get_row("SELECT * FROM $wpdb->nbr_employe WHERE employe_id =".$param['employ_numbr']);
	//echo $employe_nbr->nbr_emplye;
	
	/*SALES*/
	$annual_sales= $wpdb->get_row("SELECT * FROM $wpdb->annual_sales WHERE sales_id =".$param['annual_sales']);
	//echo $annual_sales->description;
	/*
$sqlcount= "SELECT COUNT(company_id) FROM $wpdb->company WHERE";
if (empty ($param['country'])) { $sqlcount .=" `company_country_id` != '0' ";} else { $sqlcount .=" `company_country_id` = ".$param['country']." ";}
	if (!empty ($param['business1'])) { $sqlcount .="AND `business_type_id` = ".$param['business1']." ";}
	if (!empty ($param['main_industry'])) { $sqlcount .="AND `industry_id` = ".$param['main_industry']." ";}
	if (!empty ($param['employ_numbr'])) { $sqlcount .="AND `company_noof_employee` = ".$param['employ_numbr']." ";}
	if (!empty ($param['annual_sales'])) { $sqlcount .="AND `company_annualsales` =".$param['annual_sales']." ";}
	
$numrows= $wpdb->get_var($sqlcount);
$rows_per_page = 20;

$lastpage = ceil($numrows/$rows_per_page);

$pageno = $param['pageno'];


if ($pageno > $lastpage) {
   $pageno = $lastpage;
} // if
if ($pageno < 1) {
   $pageno = 1;
} // if

$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
	*/
	$sql= "SELECT * FROM $wpdb->company WHERE";
	if (empty ($param['country'])) { $sql .=" `company_country_id` != '0' ";} else { $sql .=" `company_country_id` = ".$param['country']." ";}
	if (!empty ($param['business1'])) { $sql .="AND `business_type_id` = ".$param['business1']." ";}
	if (!empty ($param['main_industry'])) { $sql .="AND `industry_id` = ".$param['main_industry']." ";}
	if (!empty ($param['employ_numbr'])) { $sql .="AND `company_noof_employee` = ".$param['employ_numbr']." ";}
	if (!empty ($param['annual_sales'])) { $sql .="AND `company_annualsales` =".$param['annual_sales']." ";}
//	echo $sql;
$companies = $wpdb->get_results($sql." Order by company_name ".$limit);

?>
<table width="600px" class="tablesearch"  cellspacing="0" cellpadding="0">

  
  <tr>
    <th scope="col">Company</th>
    <th scope="col">Business type</th>
    <th scope="col">Industry</th>
    <th scope="col">Country</th>
    <th scope="col">Empl</th>
    <th scope="col">Sales (MUSD)</th>
  </tr>
  
<?
  foreach($companies as $company){
  ?>
  <tr>
    <td><a href="/search-result?action=viewcompanyprofile&idc=<?php echo $company->company_id;?>"><?php echo $company->company_name;?></a></td>
    <td><?php $business_name= $wpdb->get_row("SELECT * FROM $wpdb->business_type WHERE business_type_id =".$company->business_type_id);
	echo $business_name->name;?></td>
    <td><?php $industry_name= $wpdb->get_row("SELECT * FROM $wpdb->industry WHERE industry_id =".$company->industry_id);
	echo $industry_name->industry_name;?></td>
    <td><?php $country_name= $wpdb->get_row("SELECT * FROM $wpdb->country WHERE country_id =".$company->company_country_id);
	echo $country_name->country_name;?></td>
    <td><?php $employe_nbr= $wpdb->get_row("SELECT * FROM $wpdb->nbr_employe WHERE employe_id =".$company->company_noof_employee);
	echo $employe_nbr->nbr_emplye;?></td>
     <td><?php $annual_sales= $wpdb->get_row("SELECT * FROM $wpdb->annual_sales WHERE sales_id =".$company->company_annualsales);
	echo $annual_sales->description;?></td>
  </tr>
  
 <?php }?>
 
</table>
<?php
}
function list_last_50_company(){
	global $wpdb;
$lastcompanies=$wpdb->get_results("SELECT * FROM $wpdb->company ORDER BY company_id DESC LIMIT 0, 50");
 ?>
 <table width="100%" class="newcompanysearch" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Company</th>
    <th scope="col">Business type</th>
    <th scope="col">Industry</th>
    <th scope="col">Country</th>
    <th scope="col">Empl</th>
     <th scope="col">Sales (MUSD)</th>
  </tr>
  
<?
  foreach($lastcompanies as $company){
  ?>
  <tr>
    <td><a href="<?php $monUrl ?>/business-search/free-text-search?cp=<?php echo $company->company_id;?>" class="bluelink" title="Edit company"><?php echo $company->company_name;?></a></td>
    <td><?php $business_name= $wpdb->get_row("SELECT * FROM $wpdb->business_type WHERE business_type_id =".$company->business_type_id);
	echo $business_name->name;?></td>
 
    <td><?php $industry_name= $wpdb->get_row("SELECT * FROM $wpdb->industry WHERE industry_id =".$company->industry_id);
	echo $industry_name->industry_name;?></td>
    <td><?php $country_name= $wpdb->get_row("SELECT * FROM $wpdb->country WHERE country_id =".$company->company_country_id);
	echo $country_name->country_name;?></td>
    <td><?php $employe_nbr= $wpdb->get_row("SELECT * FROM $wpdb->nbr_employe WHERE employe_id =".$company->company_noof_employee);
	echo $employe_nbr->nbr_emplye;?></td>
     <td><?php $annual_sales= $wpdb->get_row("SELECT * FROM $wpdb->annual_sales WHERE sales_id =".$company->company_annualsales);
	echo $annual_sales->description;?></td>
  </tr>
  
 <?php }?>
 
</table>
<?php }
function list_last_50_member(){
	global $wpdb;
$lastmember=$wpdb->get_results("SELECT * FROM $wpdb->users ORDER BY ID DESC LIMIT 0, 50");
 ?>
 <table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Membername</th>
    <th scope="col">Country/Region</th>
    <th scope="col">Type</th>
  </tr>
  
<?
  foreach($lastmember as $company){
  ?>
  <tr>
    <td><a href="<?php $monUrl ?>/business-search/new-members?id=<?php echo $company->ID;?>" class="bluelink" title="Edit member"><?php echo $company->user_login;?></a></td>
    <td><?php $country_name= $wpdb->get_row("SELECT * FROM $wpdb->country WHERE country_id =".$company->country_id);
	echo $country_name->country_name;?></td>
 
    <td><?php echo $company->prof_title;?></td>
  </tr>
  
 <?php }?>
 
</table>
<?php
}
function get_user_profile($user_id)
{
	 global $wpdb;
	$users= $wpdb->get_row("SELECT * FROM $wpdb->users WHERE ID =".$user_id);
	return $users;
	}
	
function get_country_name ($country_id)
{
	global $wpdb;
$country_name = $wpdb->get_row("SELECT * FROM $wpdb->country WHERE country_id =".$country_id);
	return $country_name;
	}
function get_region_name ($region_id)
{
	global $wpdb;
$region_name= $wpdb->get_row("SELECT * FROM $wpdb->region WHERE region_id =".$region_id);
	return $region_name;
	}	
	
function list_regtype ()
{
	  global $wpdb;
  $regtypes = $wpdb->get_results("SELECT * FROM $wpdb->regtype");
?>
    <label>
      <?php _e('My current working situation') ?>
      <br />
<select id="regtype" name="regtype">
 <option value=""><?php _e('- Select -') ?></option>
 <?php
  foreach ($regtypes as $regtype) {
   echo '<option value="'.$regtype->id_regtype.'">'.$regtype->name_regtype.'</option>';
  }
?>
 </select>   
    </label>  
<?php } 
function list_spoken_lang()
{
  global $wpdb;
  $langs= $wpdb->get_results("SELECT * FROM $wpdb->spokenlanguage");
  return ($langs);
}

function get_spoken_lang($idlang)
{
	global $wpdb;
  $langs= $wpdb->get_row("SELECT * FROM $wpdb->spokenlanguage WHERE id_lang=".$idlang);
	return ($langs);
	}
	
function get_reciever_uid_new_count($uid){
	global $wpdb;
	$messages= $wpdb->get_var(" SELECT count(*) FROM $wpdb->message WHERE reciever_user_id = $uid AND reciever_read = 0 ");
	return ($messages);
}

function get_visitors($uid)
{
global $wpdb;
$sql = "SELECT * FROM $wpdb->profile_visitor WHERE profile_visitor_id = $uid ";
 $res= $wpdb->get_row($sql);
return ($res);
}
function update_user_picture($uid,$picture)
{
	global $wpdb;
	$sql = "UPDATE $wpdb->users SET user_pic=$picture WHERE ID = $uid ";
	$wpdb->query($sql);
}

function  edit_personal_profile ($tab)
{
global $wpdb;
	$country_id = $tab['country'];
	
	
$sql = "UPDATE $wpdb->users SET country_id = $country_id WHERE ID = 1302 ";
	$wpdb->query($sql);
	
}

function  edit_profile_pay($tab)
{
	global $wpdb;
$dataedit=array('country_id'=> $tab['country']
  ,'region_id'=> $tab['region1']
  ,'phone'=> $tab['phone']
  ,'user_email'=> $tab['email']
   ,'adress'=> $tab['adress']
    ,'zip_code'=> $tab['zip']
  );
 $whereedit=array( 'ID' =>  $tab['keyid']);
 
	$wpdb->update( $wpdb->users,$dataedit ,  $whereedit );
		  
		      $email = $tab['email'];
			  $emailTo = 'donotreply@cw-connectingworld.com';
			  $subject ='CW-connectingworld.com Edit Profile';
			  $body = 'PLEASE DO NOT REPLY TO THIS EMAIL<br />';
			  $body .='Dear'. $tab['lastname'].',<br />';
			  $body .='Your Company Profile Informations has been successfully changed.<br />';
			  $body .='NOTES:<br />';
			  $body .='IF YOU REALLY WANT TO GET ALL OUR BENEFITS AND ADVANTAGES ,<br />';
			  $body .='UPGRADE AS A PREMIUM MEMBER<br />';
			  $body .='Best Regards:<br />';
			  $body .='http://www.cw-connectingworld.com:<br />';
			  $body .='CW Connecting World:<br />';
			  $body .='ADMIN:<br />';
  
		  			  
			  $headers ='From: "CW-connectingworld.com"<donotreply@cw-connectingworld.com>'."\n"; 
	   $headers .='Reply-To: donotreply@cw-connectingworld.com'."\n"; 
	   $headers = $headers.'Content-type: text/html; charset=utf-8'."\r\n";
	 	  
			  mail($email, $subject, $body, $headers);
			  $emailSent = true;
			  $urlredirect="my-page-2?action=viewcompanyprofile";
   header('Location:'.$urlredirect);
		
}



function get_industrybyid($id){
	global $wpdb;
	$industry= $wpdb->get_row("SELECT * FROM $wpdb->industry WHERE industry_id =".$id);
	return $industry;
	}
	
function get_regtypebyid($id){
	global $wpdb;
	$regtypes= $wpdb->get_row("SELECT * FROM $wpdb->regtype WHERE id_regtype  =".$id);
	return $regtypes;
	}
function  update_profile ($picture, $id)
{
	global $wpdb;
	$dataedit1=array( 'user_pic' => $picture);
	$whereedit1=array( 'ID' =>  $id);
 
	$wpdb->update( $wpdb->users,$dataedit1 ,  $whereedit1 );
}
function get_company_byuserid($id)
{global $wpdb;
	$companyrow= $wpdb->get_row("SELECT * FROM $wpdb->company WHERE user_id  =".$id);
	return $companyrow;
	}
function get_company_byid($id)
{global $wpdb;
	$companyrow= $wpdb->get_row("SELECT * FROM $wpdb->company WHERE 	company_id  =".$id);
	return $companyrow;
	}
function  edit_company ($tab)
{
	global $wpdb;
	$export='';
foreach ($tab['destination'] as $choix)
		{
			$export .= ','.$choix;
		}
		
$companyedit=array( 
  'company_country_id' => $tab['country'],
  'business_type_id' => $tab['business1'],
  'company_name'  => $tab['company_name'],
  'company_presentation' => $tab['presentation'], 
  'company_address' => $tab['street_adress'],
  'company_city' => $tab['city'],
  'company_postcode' => $tab['zip'],
  'company_province' => $tab['province'],
  'company_type' => $tab['categor'],
  'company_phone' => $tab['businessphone'],
  'company_mobile' => $tab['mobile'],
  'company_fax' => $tab['fax'],
  'company_email' => $tab['email'],
  'company_url' => $tab['Site_url'],
  'company_noof_employee'  => $tab['employ_numbr'],
  'company_annualsales' => $tab['annual_sales'],
  'company_established'  => $tab['established'],
  'company_cp_gender' => $tab['person'],
  'company_cp_firstname' => $tab['firstname'],
  'company_cp_lastname' => $tab['lastname'],
  'company_cp_title'  => $tab['jobtitle'],
  'industry_id' => $tab['main_industry'],
  'region_id' => $tab['region1'],
  'certs' => $tab['certif'],
  'keywords' => $tab['keywords'],
  'business_orgs' => $tab['org'],
  'regions_provide' => $export
  );
 $whereedit=array( 'company_id' =>  $tab['companykey']);
 
	$wpdb->update( $wpdb->company,$companyedit ,  $whereedit );
}
function  update_cprofile ($picture, $id)
{
	global $wpdb;
	$dataedit1=array( 'company_pic' => $picture);
	$whereedit1=array( 'company_id' =>  $id);
	$wpdb->update( $wpdb->company,$dataedit1 ,  $whereedit1 );
}

function get_serviceprovide_byid($id)
{
	global $wpdb;
	$servicerow = $wpdb->get_row("SELECT * FROM $wpdb->provid_service WHERE id =".$id);
	return $servicerow;
	}
function get_EmployeeNbr_byid($id){
	global $wpdb;
 return( $wpdb->get_row("SELECT * FROM $wpdb->nbr_employe WHERE employe_id=".$id)); 
}
function get_annualsales_byid($id){
	global $wpdb;
 return( $wpdb->get_row("SELECT * FROM $wpdb->annual_sales WHERE sales_id=".$id)); 
}
function get_business_type_byid($id){
global $wpdb;
	$business_name= $wpdb->get_row("SELECT * FROM $wpdb->business_type WHERE business_type_id =".$id);
	return $business_name;
}
function get_unspsc_byid($id){
	global $wpdb;
 return( $wpdb->get_row("SELECT * FROM $wpdb->unspsc where family='00' AND egci=".$id));
}

function update_latitude($lat, $lang, $id){
	global $wpdb;
	$dataedit2=array('company_map_lon' => $lat, 'company_map_lat' => $lang);
	$whereedit2=array('company_id' =>  $id);
	$wpdb->update($wpdb->company,$dataedit2 ,  $whereedit2);
}

function get_saved_by_cid($c_id){
	//$c_id  = val_int($c_id);
	  global $wpdb;
  $unspecsaved = $wpdb->get_results("SELECT 
				(SELECT title FROM $wpdb->unspsc WHERE
				segment = u.segment 
				AND family = '00' limit 1) 
					AS segment, 
				(SELECT title FROM $wpdb->unspsc WHERE
				segment = u.segment AND
				family = u.family 
				limit 1) 
					AS family, 
				(SELECT title FROM $wpdb->unspsc WHERE
				segment = u.segment AND
				family = u.family AND 
				class = u.class  AND
				commodity = '00' limit 1) 
					AS class,
			u.title AS commodity,
			u.egci	AS egci,
			uc.type AS type
			FROM 
			($wpdb->unspsc u ,$wpdb->unspsc_company uc)
			WHERE u.egci = uc.egci 
			AND uc.company_id=".$c_id."
			AND	commodity   <> '00'
			ORDER BY u.segment,u.family ASC, u.class ASC, u.commodity ASC;");
			return $unspecsaved;
}

function get_unspsc_type($t){
	if(!$t) return "";
	if($t=='0') return "(None)";// 'Distributor',	
	if($t=='1') return "(D)";// 'Distributor',	
	if($t=='2') return "(M)";// 'Manufacturer',	
	if($t=='3') return "(B)";// 'Buyer/Importer',	
	if($t=='4') return "(S)";// 'Service provider',	
	return "";
	
}
function update_user_pass($user_id, $newpass)
{
	global $wpdb;
	$dataeditpasswp=array('user_pass' => $newpass);
	$whereeditpasswp=array('ID' => $user_id);
	$wpdb->update($wpdb->users,$dataeditpasswp ,  $whereeditpasswp);
}
function encrypt($str, $key) {
  $key = $this->hex2bin($key);   
 
  $td = mcrypt_module_open("rijndael-128", "", "cbc", "fedcba9876543210");
 
  mcrypt_generic_init($td, $key, CIPHER_IV);
  $encrypted = mcrypt_generic($td, $str);

  mcrypt_generic_deinit($td);
  mcrypt_module_close($td);

  return bin2hex($encrypted);
}

//error_reporting(E_ALL);
/************Functions related to the paynova Payment****************/
function keys() {
		return array('MODULE_PAYMENT_PAYNOVA_STATUS',
			'MODULE_PAYMENT_PAYNOVA_CDCARDS_STATUS',
			'MODULE_PAYMENT_PAYNOVA_IDEAL_STATUS',
			'MODULE_PAYMENT_PAYNOVA_GIROPAY_STATUS', 
			'MODULE_PAYMENT_PAYNOVA_MERCHANT_ID', 
			'MODULE_PAYMENT_PAYNOVA_SECRETKEY', 
			'MODULE_PAYMENT_PAYNOVA_CURRENCY', 
			'MODULE_PAYMENT_PAYNOVA_SERVERURL', 
			'MODULE_PAYMENT_PAYNOVA_PNSERVERURL', 
			'MODULE_PAYMENT_PAYNOVA_ORDER_STATUS_ID', 
			'MODULE_PAYMENT_PAYNOVA_SORT_ORDER');
	}
	
function get_paynova_conf($config_key)
{
	 global $wpdb;
	 $requete = "SELECT * FROM $wpdb->paynova_conf WHERE configuration_key = '$config_key'";
  $paynova_conf= $wpdb->get_row( $requete);
	return $paynova_conf->configuration_value;
}

function do_post_request($url, $data, $optional_headers = null) {
 $params = array('http' => array(
  'method' => 'POST',
  'content' => $data
 ));
 if ($optional_headers !== null) {
  $params['http']['header'] = $optional_headers;
 }
 $ctx = stream_context_create($params);
 $fp = @fopen($url, 'rb', false, $ctx);
 if (!$fp) {
  throw new Exception("Problem with $url, $php_errormsg");
 }
 $response = @stream_get_contents($fp);
 if ($response === false) {
  throw new Exception("Problem reading data from $url, $php_errormsg");
 }
 return $response;
}
function between($haystack, $beg, $end)
{
	$start = strpos($haystack, $beg) + strlen($beg);
	$fin = strpos($haystack, $end, $start);
	$needle = substr($haystack, $start, ($fin-$start));
	return $needle;
}

function http_post($Url, $data)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $Url);  
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	
	$result = curl_exec($ch);
	
	if (curl_error($ch))
		printf("Error %s: %s", curl_errno($ch), curl_error($ch));
	
	curl_close ($ch);
	return $result;
}

function sendResponse($status, $statusmessage, $neworderid, $batchid)
{
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<responsemessage>';
	echo '<status>'.$status.'</status>';
	echo '<statusmessage>'.$statusmessage."</statusmessage>";
	echo '<neworderid>'.$neworderid.'</neworderid>';
	echo '<batchid>'.$batchid.'</batchid>';
	echo '</responsemessage>';
}
/**************End Functions related to the paynova Payment***************/
?>
<?php
function list_classified(){
    global $wpdb;
    
    $list_classified=$wpdb->get_results("SELECT * FROM $wpdb->classified ORDER BY `posted_date` DESC");
    
    return $list_classified;
}  
function get_category_classified($cat_id){
  global $wpdb;
    
    $categ_classified=$wpdb->get_results("SELECT cat_name FROM $wpdb->classified_cat WHERE classified_catid = $cat_id");
   
    return $categ_classified[0]->cat_name;   
}
function update_number_viewed_classified($id)
{
	global $wpdb;
	$sql = "UPDATE $wpdb->classified SET num_reads=num_reads+1 WHERE classified_id = $id ";
	$wpdb->query($sql);
}
function list_classified_by_id($id){
    global $wpdb;
    
    $list_classified=$wpdb->get_results("SELECT * FROM $wpdb->classified where classified_id = $id");
    
    return $list_classified[0];
} 

//filtrer clapssified par categorie

function list_classified_by_cat($cat_id){
     global $wpdb;
    
    $list_classified=$wpdb->get_results("SELECT * FROM $wpdb->classified where classified_catid = $cat_id ORDER BY `posted_date` DESC");
    
    return $list_classified;
} 
 
function list_classified_category_event($id_cat){
    global $wpdb;
    
    $list_catcalss=$wpdb->get_results("SELECT * FROM $wpdb->classified_cat ORDER BY `cat_name`");
        
    ?>

 <form name="liste" action="" method="POST">
<select id="categoryclass" name="categoryclass">
 <option value=""><?php _e('- Select -') ?></option>
 <?php
  foreach ($list_catcalss as $catclass) { ?>
   <option value="<?php echo $catclass->classified_catid ; ?>" <?php if($id_cat == $catclass->classified_catid) { echo 'selected'; }?> ><?php echo $catclass->cat_name; ?></option> <?php
  }
?>
 </select>   
<input type="submit" name="valid" value="Select">
</form> 
 <br />
   <?php
}
/* fin  */

//list company
function list_company_ID($user_id){
    global $wpdb; 
	
      $list_company=$wpdb->get_results("SELECT * FROM $wpdb->company where user_id=$user_id");
	  
      //$list_company=$wpdb->get_results("SELECT * FROM $wpdb->company where user_id=1204");
	
    return $list_company;
} 

//affection favorie to user 

function insert_favorites($user_id, $cp)
{
	 global $wpdb;
	 $data=array();
	 
	$exist=$wpdb->get_row("select * from $wpdb->favorites where user_id=".$user_id." and cp_id=".$cp."");
		
		if(empty($exist))
		{
			$data=array('user_id'=>$user_id,'cp_id'=>$cp);
			$wpdb->insert($wpdb->favorites,$data);
		}
}
//return list favories by user_id
function get_fav_byuserid($id)
{
	global $wpdb;
	$listfavories = $wpdb->get_results("SELECT * FROM $wpdb->favorites WHERE user_id =".$id);
	return $listfavories;
}	

//return posts de type newsletter selon id
function get_list_newsletters_posts()
{
	global $wpdb;
	$listnewsletters= $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'newsletter' and post_status='publish' ORDER BY `post_date` DESC LIMIT 3 ");
	return $listnewsletters;
} 

//
function catch_that_image() 
{ 
	global $post, $posts; 
	$first_img = ''; 
	ob_start(); 
	ob_end_clean(); 
	//echo $post->post_content ;
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); 
	$first_img = $matches [1] [0]; 
	if(empty($first_img))
	{ //Defines a default image 
		//$first_img = "/images/default.jpg"; 
	} 
	return $first_img; 
}

//limit the_excerpt
function limit_words($string, $word_limit) {
 
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
 
	$words = explode(' ', $string);
 
	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character
 
	return implode(' ', array_slice($words, 0, $word_limit));
 
}

//limit the_excerpt
function limit_words_pos($string, $word_limit,$words_deb) {
 
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
 
	$words = explode(' ', $string);
 
	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character
 
	return implode(' ', array_slice($words, $words_deb, $word_limit));
 
}
 
//retourne liste des newsletters
function list_newsletters($etat){
	global $wpdb;
$listnews=$wpdb->get_results("SELECT * FROM $wpdb->posts where post_type = 'newsletter' and post_status='publish' ORDER BY post_date DESC ");
 ?>
 <table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">News</th>
    <!-- <th scope="col">Date</th> -->
  </tr>
  
<?
  foreach($listnews as $lnews){
  ?>
  <tr>
    <td><a href="<?php if ( $etat == 0 ) { echo $monUrl."/register-step1"; } else {echo $lnews->guid; } ?>" class="bluelink" ><?php echo $lnews->post_title;?></a></td>
    <td><?php //echo $lnews->post_date ;?></td>
  </tr>
  
 <?php }?>
 
</table>
<?php }

//retourne liste des newsletters filter par annee
function list_newsletters_annee ($annee){
	global $wpdb;
$listnews=$wpdb->get_results("SELECT * FROM $wpdb->posts where post_type = 'newsletter' and EXTRACT(YEAR FROM post_date) = ".$annee." and post_status='publish' ORDER BY post_date DESC ");
 ?>
 <table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">News</th>
    <!-- <th scope="col">Date</th> -->
  </tr>
  
<?
  foreach($listnews as $lnews){
  ?>
  <tr>
    <td><a href="<?php echo $lnews->guid ?>" class="bluelink" ><?php echo $lnews->post_title;?></a></td>
    <td><?php //echo $lnews->post_date ;?></td>
  </tr>
  
 <?php }?>
 
</table>
<?php }

//return liste distinct date for newsletters
function get_list_date_newsletters(){
	global $wpdb;
 return( $wpdb->get_results("SELECT distinct EXTRACT(YEAR FROM post_date) as annee FROM $wpdb->posts where post_type = 'newsletter' and post_status='publish'"));
}

//update user profile as premium
function  update_user_premium ($id)
{
	global $wpdb;
	
	$dataedit1=array( 'premium' => 1 ,'dateprem'=> date('Y-m-d H:i:s'));
	$whereedit1=array( 'ID' =>  $id);
 
	$wpdb->update( $wpdb->users,$dataedit1 ,  $whereedit1 );
}


/* Function list of All message From the database table cw_message*/
function list_messages_by_user($id)
{
	  global $wpdb;
	 return( $wpdb->get_results("SELECT * FROM $wpdb->message where `reciever_user_id` = ".$id." ORDER BY `sent` Desc"));
}	

/* Function list of All message From the database table cw_message by id_message*/
function list_messages_by_id($id)
{
	  global $wpdb;
	 return( $wpdb->get_results("SELECT * FROM $wpdb->message where `message_id` = ".$id." ORDER BY `sent` Desc"));
}

/* Function list of All message From the database table message_sent*/
function list_messages_sent_by_user($id)
{
	  global $wpdb;
	 return( $wpdb->get_results("SELECT * FROM $wpdb->message where `sender_user_id` = ".$id." ORDER BY `sent` Desc"));
}
/* Function list of All message From the database table message_sent by id_message*/
function list_messages_sent_by_id($id)
{
	  global $wpdb;
	 return( $wpdb->get_results("SELECT * FROM $wpdb->message where `message_id` = ".$id." ORDER BY `sent` Desc"));
}

/* Function list of All message From the database table message_saved*/
function list_messages_saved_by_user($id)
{
	  global $wpdb;
	 return( $wpdb->get_results("SELECT * FROM $wpdb->message_saved where `reciever_user_id` = ".$id." ORDER BY `sent` Desc"));
}	
/* Function list of All message From the database table message_saved by id_message*/
function list_messages_saved_by_id($id)
{
	  global $wpdb;
	 return( $wpdb->get_results("SELECT * FROM $wpdb->message_saved where `message_id` = ".$id." ORDER BY `sent` Desc"));
}

function save_message($id,$subject,$message,$sender_user_id,$reciever_user_id,$sent,$reciever_read)
{
	 global $wpdb;
	 $data=array();
	 
	$exist=$wpdb->get_row("SELECT * FROM $wpdb->message_saved where `message_id` = ".$id."");
		
		if(empty($exist))
		{
			$data=array('message_id'=>$id,'subject'=>$subject,'message'=>$message,'sender_user_id'=>$sender_user_id,'reciever_user_id'=>$reciever_user_id,'sent'=>$sent,'reciever_read'=>$reciever_read);
			
			$wpdb->insert($wpdb->message_saved,$data);
		}
		
	$wpdb->query("delete from $wpdb->message where message_id=".$id." ");
	
}

function delete_message_saved($id)
{
	 global $wpdb;	 
	 
	$exist=$wpdb->get_row("SELECT * FROM $wpdb->message_saved where `message_id` = ".$id."");
		
		if(!empty($exist))
		{
			$wpdb->query("delete from $wpdb->message_saved where message_id=".$id." ");
		}
}

function delete_message($id)
{
	 global $wpdb;	 
	 
	$exist=$wpdb->get_row("SELECT * FROM $wpdb->message where `message_id` = ".$id."");
		
		if(!empty($exist))
		{
			$wpdb->query("delete from $wpdb->message where message_id=".$id." ");
		}
}

function insert_message($subject,$message,$sender_user_id,$reciever_user_id,$sent,$reciever_read)
{
	 global $wpdb;
	 $datas=array();
	 
	$datas=array('subject'=>$subject,'message'=>$message,'sender_user_id'=>$sender_user_id,'reciever_user_id'=>$reciever_user_id,'sent'=>$sent,'reciever_read'=>$reciever_read);
	//print_r ($data) ;
	$wpdb->insert($wpdb->message,$datas);
			
}

//getrow message by id-message
function get_message_byid($id){
	global $wpdb;
	$message_row= $wpdb->get_row("SELECT * FROM $wpdb->message WHERE message_id =".$id);
	return $message_row;
}

//getrow message by id-message
function get_message_saved_byid($id){
global $wpdb;
	$message_row= $wpdb->get_row("SELECT * FROM $wpdb->message_saved WHERE message_id =".$id);
	return $message_row;
}

//update_message_read
function update_message_read($id){
	
	global $wpdb;
	$readedit=array( 'reciever_read' => 1);
	$whereedit1=array( 'message_id' =>  $id);
 
	$wpdb->update( $wpdb->message,$readedit ,  $whereedit1 );	
}
//Slelect Log
function get_userlogins($user_login){
		 global $wpdb;
	 $logdate = $wpdb->get_row("SELECT * FROM $wpdb->ft_lua_userlogins WHERE login_username = '".$user_login."' ORDER BY login_date DESC LIMIT 0,1");
	 return $logdate;
}
//Count log 
function get_nbrlogins($user_login){
	 global $wpdb;
	$nblogin = $wpdb->get_var("SELECT count(*) FROM $wpdb->ft_lua_userlogins WHERE login_username = '".$user_login."'");
return $nblogin;
}
//Fix the wp_logout redirection
add_filter('logout_url', 'fix_logout_url');
function fix_logout_url( $url )
{
  $url = str_replace( '&amp;', '&', $url );
  return $url;
}
show_admin_bar( false );

function phpbblogout($loginphpbb)
{
$lwpdb = new wpdb( 'lphpbbmysqluser', 'RIB86wap#GLYPH3', 'lastphpbb3', 'localhost');
$sqls = "SELECT user_id from phpbb_users WHERE username = '".$loginphpbb."'";
$resultss = $lwpdb->get_var( $sqls);

	$sql = "SELECT session_id from phpbb_sessions WHERE session_user_id = ".$resultss." ORDER BY session_last_visit  DESC  LIMIT 1";
$results = $lwpdb->get_var($sql);
return $results;
}
?>