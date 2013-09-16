<?php
$theme = get_current_theme();

if (!is_user_logged_in() && $theme->Template == 'connectingworld1') {
    switch_theme('adapt');
    wp_redirect( home_url() );
    exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php function wp_initialize_the_theme() { if (!function_exists("wp_initialize_the_theme_load") || !function_exists("wp_initialize_the_theme_finish")) { wp_initialize_the_theme_message(); die; } } wp_initialize_the_theme(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php

 if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== FALSE ) {
        if ($user_ID) {?>
            <style type="text/css" media="screen">
                .span-4 {
                        width:150px; 
                        background-color:#b0d4ec; 
                        margin-top: 0px;
                }
            </style>
        <?php } else {
                $url = $_SERVER['REQUEST_URI'];
                if ($url == '/') {?>
                    <style type="text/css" media="screen">
                        .span-4 {
                                width:150px; 
                                background-color:#b0d4ec; 
                                margin-top: 0px;
                        }
                    </style>
                <?php } else {?>
                    <style type="text/css" media="screen">
                        .span-4 {
                                width:150px; 
                                background-color:#b0d4ec; 
                                margin-top: 0px;
                        }
                    </style>
                <?php }?>
        <?php }?>
    <?php } else { ?>
        <style type="text/css" media="screen">
            .span-4 {
                    width:150px; 
                    background-color:#b0d4ec; 
                    margin-top: 0px;
            }
        </style>
    <?php } ?>
	
<!--[if IE 8]>
	<?php if (!$user_ID) {
	$url = $_SERVER['REQUEST_URI'];
                if ($url == '/') {
				?>
	 <style>
            .span-4 {
                    width:150px; 
                    background-color:#b0d4ec; 
                    margin-top: -137px;
            }
        </style>
	<?php } }?>
<![endif]--> 
<?php @setcookie("lastconfirm", time()); // ?>
<!--[if IE 9]>
	<?php if (!$user_ID) {
	$url = $_SERVER['REQUEST_URI'];
                if ($url == '/') {
				?>
	 <style>
            .span-4 {
                    width:150px; 
                    background-color:#b0d4ec; 
                    margin-top: -137px;
            }
        </style>
	<?php } }?>
	
	<?php 
if ($_COOKIE['lastconfirm']<time()-26*3600) { ?> 
<?php } ?> 
	
<![endif]--> 

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/screen.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print.css" type="text/css" media="print" />
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
<!-- <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /> -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
<!--[if IE 6]>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/pngfix.js"></script>
<![endif]--> 
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- Load the Middle Menu Class -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
<!--[if lt IE 7]>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
<![endif]-->
<!-- End Load the Middle Menu Class -->


<!-- Load Translation Class -->
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js" type="text/javascript"></script>
   <script src="<?php bloginfo('template_directory'); ?>/js/jquery.translate-1.3.9.min.js" type="text/javascript"></script>
   <script src="<?php bloginfo('template_directory'); ?>/js/jq.cookie.js" type="text/javascript"></script>
   <script src="<?php bloginfo('template_directory'); ?>/js/google-translate.js" type="text/javascript"></script>

<!-- End Load Translation Class -->

<!-- Load Light Box Login -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lightbox/css/prettyPhoto.css" type="text/css" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lightbox/scripts/jquery.prettyPhoto.js"></script>
<!-- End Load Light Box Login -->

<!-- Load animation collapse-->
<script type="text/javascript" language="JavaScript"  src="<?php bloginfo('template_url'); ?>/js/collapse/motionpack.js"></script>
<!-- End Animation collapse-->
<!--*******Load Clock******-->

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/clock/action_clock.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/clock/clock.js"></script>
<script language="javascript" type="text/javascript">
function findPos(obj) {
	var curleft = curtop = 0;
	if (obj.offsetParent) {
		curleft = obj.offsetLeft
		curtop = obj.offsetTop
		while (obj = obj.offsetParent) {
			curleft += obj.offsetLeft
			curtop += obj.offsetTop
		}
	}
	return [curleft,curtop];
}

function showMeThisCoolDHTMLWidgetStuffOK()
{
	var pos = findPos(document.getElementById("mougala"));
	//alert (pos[0]);
	//ptop =  20;//pos[1] - 0 ;
	var wowClock1 = new ygClock(pos[0]+9,pos[1]+9,"<?php bloginfo('template_directory'); ?>/clock/img/clock_blue.png","<?php bloginfo('template_directory'); ?>/clock/img/clock_blue_dot.png","<?php bloginfo('template_directory'); ?>/clock/img/hourhand.png","<?php bloginfo('template_directory'); ?>/clock/img/minhand.png","<?php bloginfo('template_directory'); ?>/clock/img/sechand.png",-7,-7);
};
</script>
<!--**********ENd Load Clock*********-->

<!-- include des fichiers de fancybox -->
	
	<script type="text/javascript">
		!window.jQuery && document.write('<script type="text/javascript" src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
	
		$(document).ready(function() {
			<?php	if ( is_user_logged_in() ) {
 global $current_user;
      get_currentuserinfo();
	$leur = phpbblogout($current_user->user_login);
}
?>
var sidid ="<?php echo $leur;?>";
var logout ="logout";
//alert (sid);
			$("a#logoutt").fancybox({
			//'onComplete': function() { jQuery("#fancybox-wrap, #fancybox-overlay").delay(15000).fadeOut();} ,
			'onClosed':function() { 
			 $.get("http://www.cw-connectingworld.com/phpBB3/ucp.php?", {mode:logout,sid:sidid}, 
			 function() { location.href= "<?php echo wp_logout_url( home_url() ); ?>"; }
			 );
		//	 alert (sidid);

	} 

			});
			
			$("a#img_market").fancybox({
			//'onComplete': function() { jQuery("#fancybox-wrap, #fancybox-overlay").delay(15000).fadeOut();} ,
			//'onClosed':function() { window.location = "<?php echo wp_logout_url("index.php"); ?>";} 

			});
		});		
	/*jQuery('#submitted').click(function() {
			alert('Handler for .click() called.');
		});*/
	jQuery(window).load(function() {
	jQuery('#loading-image').hide();
	jQuery('#loaderimg').hide();
});		
	</script>
	
	<!-- end -->
<style type="text/css">

#loading-image {
	background-color:#CCC;
	width: 100%;
	height: 100%;
	position:fixed;
	z-index:9999999999;
	opacity: 0.5;
  filter: alpha(opacity = 50);
}

#loaderimg{
    margin-left: auto;
    margin-right: auto;
}
</style>
	<?php echo get_theme_option("head") . "\n";  wp_head(); ?>
</head>
<body>

	<div id="wrapper">
		<div id="container" class="container">  
<div class="span-18">
 
    			<div id="pagemenucontainer">
    				<?php
                    if(function_exists('wp_nav_menu')) {
                        wp_nav_menu( 'theme_location=menu_1&menu_id=nav2&container=&fallback_cb=menu_1_default');
                    } else {
                        menu_1_default();
                    }
                    
                    function menu_1_default()
                    {
                        ?>
                        <ul id="pagemenu">
    						<li <?php if(is_home()) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
    						<?php wp_list_pages('depth=10&sort_column=menu_order&title_li=' ); ?>
    					</ul>
                        <?php
                    }
                    
                ?>
    			</div>
	       	</div>
           
            
				<div id="header" class="span-24">
					<div class="span-header">
                  <?php  
slidedeck(1358, array( 'width' => '100%', 'height' => '300px' ) ); 
?>
                    
                        </div>
                      
</div> 
<div class="span-24">
				<div id="navcontainer">
					
					<?php
                    if(function_exists('wp_nav_menu')) {
                            wp_nav_menu( 'theme_location=menu_2&menu_id=nav&container=&fallback_cb=menu_2_default');
                        } else {
                            menu_2_default();
                        }
                        
                        function menu_2_default()
                        {
                            ?>
                            <ul id="nav">
                                <li <?php if(is_home()) { echo ' class="current-cat" '; } ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
        						<?php wp_list_categories('depth=3&exclude=1&hide_empty=0&orderby=name&show_count=0&use_desc_for_title=1&title_li='); ?>
                               
        					</ul>
                            <?php
                        }
                    ?>
				</div>
			</div>
             
            