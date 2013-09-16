<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */

// $theme = get_current_theme();

// if (is_user_logged_in() && $theme != 'connectingworld1') {
//     switch_theme('connectingworld1');
//     wp_redirect( home_url() );
//     exit;
// }

$options = get_option( 'adapt_theme_settings' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- Mobile Specific
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- Title Tag
================================================== -->
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
    
<?php if(!empty($options['favicon'])) { ?>
<!-- Favicon
================================================== -->
<link rel="icon" type="image/png" href="<?php echo $options['favicon']; ?>" />
<?php; } ?>

<!-- Main CSS
================================================== -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/custom-cw.css" media="all" />



<!-- Load HTML5 dependancies for IE
================================================== -->
<!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]>
    <script src="js/IE8.js" type="text/javascript"></script><![endif]-->
<!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/>
<![endif]-->


<!-- WP Head
================================================== -->
<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<div id="wrap" class="clearfix">

    <header id="masterhead" class="clearfix">
            <div id="logo">
                <?php
                    if($options['upload_mainlogo'] !='') { ?>
                        <a href="<?php bloginfo( 'url' ); ?>/" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo $options['upload_mainlogo']; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
                    <?php; } else { ?>
                    <a href="<?php bloginfo( 'url' ); ?>/" title="<?php bloginfo( 'name' ) ?>"><?php bloginfo( 'name' ); ?></a>
                <?php; } ?>
                
            </div>
            <!-- END logo -->
            <div id="translator">
                <div id="MicrosoftTranslatorWidget" style="width: 360px; min-height: 57px; border-color: #3A5770; background-color: #78ADD0;"><noscript><a href="http://www.microsofttranslator.com/bv.aspx?a=http%3a%2f%2fwww.cw-connectingworld.com%2f">Translate this page</a><br />Powered by <a href="http://www.bing.com/translator">Microsoft® Translator</a></noscript></div> <script type="text/javascript"> /* <![CDATA[ */ setTimeout(function() { s.src = ((location && location.href && location.href.indexOf('https') == 0) ? "https://ssl.microsofttranslator.com" : "http://www.microsofttranslator.com" ) + "/ajax/v2/widget.aspx?mode=manual&from=en&layout=ts"; var s = document.createElement("script"); s.type = "text/javascript"; s.charset = "UTF-8"; var p = document.getElementsByTagName('head')[0] || document.documentElement; p.insertBefore(s, p.firstChild); }, 0); /* ]]> */ </script> 
            </div>
            <nav id="masternav" class="clearfix">
                <?php wp_nav_menu( array(
                    'theme_location' => 'menu',
                    'sort_column' => 'menu_order',
                    'menu_class' => 'sf-menu',
                    'fallback_cb' => 'default_menu'
                )); ?>
            </nav>
            <!-- /masternav -->      
    </header><!-- /masterhead -->
    
<div id="main" class="clearfix">