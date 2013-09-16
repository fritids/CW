<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 * Template Name: Landing Page
 */
global $userdata;
// if ($userdata) {
//     wp_redirect(get_option("siteurl").'');
// }

if($_REQUEST){
    $errors = array();
    //We shall SQL escape all inputs
    $email = $wpdb->escape($_REQUEST['user_email']);
//    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
    if(!preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $email)) {
      $errors[] = "Not valid e-mail";
    }
     // If captcha is blank - add error
    if ( !isset( $_REQUEST['spam-protection'] ) ) {
        $errors[] = '<strong>'.__('ERROR', 'wpcaptchadomain').'</strong>: '.__('Please complete the CAPTCHA.', 'wpcaptchadomain');
    }

    if ( $_REQUEST['spam-protection'] < 6000 ) {
        $errors[] = '<strong>'.__('ERROR', 'wpcaptchadomain').'</strong>: '.__('That CAPTCHA was incorrect.', 'wpcaptchadomain');
    }
    // if (!$_POST['accept_terms']) {
    //   $errors[] = "Du behöver godkänna villkoren";
    // }
    
  if (!$errors) {
    $username = $email;

    $password = $_REQUEST['pass1'];
    $new_user_id = wp_create_user( $username, $password, $email );

    $user = get_userdatabylogin( $username );
    $user_id = $user->ID;
    update_user_meta($user_id, 'user_country', intval($_REQUEST['country']));
    
    $credentials=array('remember'=>true,'user_login'=>$username,'user_password'=>$password);
    do_action_ref_array('wp_authenticate', array(&$credentials['user_login'], &$credentials['user_password']));
    $user = wp_authenticate($credentials['user_login'], $credentials['user_password']);
    wp_set_auth_cookie($user_id, $credentials['remember']);
    do_action('wp_login', $credentials['user_login']);

    if ( is_wp_error($new_user_id) ) {
        
        wp_safe_redirect(get_option("siteurl"));
    }
        // echo "<span class='label label-important'>Fel. Konto med samma epost finns redan registrerad.</span>";
    else {
        // $from = get_option('admin_email');
        // $headers = 'From: '.$from . "\r\n";
        // $subject = "SONOS Music Invasion!";
        // $msg = "Hej, du är nu med i tävlingen, hitta så många låtar du kan... \n\nLycka till! \n\nAnvändarnamn: $username\nLösenord: $password \n\nMVH SONOS \n\nhttp://www.hifiklubben.se/sonos \n\nsonosmusicinvasion@hifiklubben.se";
        // wp_mail( $email, $subject, $msg, $headers );
        
        // $newsletter = (int) $_REQUEST["newsletter"];
        // add_user_meta($user_id, 'sns_newsletter', $newsletter, TRUE);

        wp_redirect(get_option("siteurl") . '/my-page-2?action=editprofile');
    }
  }
}

$options = get_option( 'adapt_theme_settings' );
?>
<?php get_header(); ?>

<div class="home-wrap clearfix">
    
    <!-- /Homepage Slider -->
    <?php get_template_part( 'includes/home-block' ); ?> 
    
    <!-- Homepage Highlights -->
    <?php
    //get post type ==> hp highlights
        global $post;
        $args = array(
            'post_type' =>'hp_highlights',
            'numberposts' => '-1'
        );
        $highlight_posts = get_posts($args);
    ?>
    <?php if($highlight_posts) { ?>        
    
    
    <section id="home-highlights" class="clearfix">
        <?php
        $count=0;
        foreach($highlight_posts as $post) : setup_postdata($post);
        $count++;
        //get img
        $feat_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full-size');
        //meta
        $highlights_url = get_post_meta($post->ID, 'adapt_highlights_url', TRUE);
        ?>
        
        <article class="hp-highlight <?php if($count == '4') { echo 'remove-margin'; } if($count == '3') { echo ' responsive-clear'; } ?>">
            <h2>
            <?php if($feat_img) { ?><span><img src="<?php echo $feat_img[0]; ?>" alt="<?php the_title(); ?>" /></span><?php } ?>
            <?php if($highlights_url) { ?>
                <a href="<?php echo $highlights_url; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            <?php } else { the_title(); } ?>
            </h2>
            
            <?php the_excerpt(); ?>
        </article>
        <!-- /hp-highlight -->
        
        <?php
        if($count == '4') { echo '<div class="clear"></div>'; $count=0; }
        endforeach; ?>
    </section>
    <!-- /home-projects -->         
    <?php } ?>
    </div>
    
    
    <!-- Recent Portfolio Items -->
    <?php
    //get post type ==> portfolio
        global $post;
        $args = array(
            'post_type' =>'portfolio',
            'numberposts' => '4'
        );
        $portfolio_posts = get_posts($args);
    ?>
    <?php if($portfolio_posts) { ?>        
        <section id="home-projects" class="clearfix">
            <h2 class="heading"><span><?php if(!empty($options['recent_work_text'])) { echo $options['recent_work_text']; } else { _e('Recent Work','adapt'); }?></span></h2>
        
            <?php
            $count=0;
            foreach($portfolio_posts as $post) : setup_postdata($post);
            $count++;
            //get portfolio thumbnail
            $feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'grid-thumb');
            ?>
            
            <?php if ($feat_img) {  ?>
            <div class="portfolio-item <?php if($count == '4') { echo 'remove-margin'; } if($count == '3') { echo ' responsive-clear'; } ?>">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $feat_img[0]; ?>" height="<?php echo $feat_img[2]; ?>" width="<?php echo $feat_img[1]; ?>" alt="<?php echo the_title(); ?>" />
                <div class="portfolio-overlay"><h3><?php echo the_title(); ?></h3></div><!-- portfolio-overlay -->
                </a>
            </div>
            <!-- /portfolio-item -->
            <?php } ?>
            
            <?php
            if($count == '4') { echo '<div class="clear"></div>'; $count=0; }
            endforeach; ?>
        </section>
        <!-- /home-projects -->         
    <?php } ?>
    
    <!-- Recent Blog Posts -->
    <?php
    //get post type ==> regular posts
        global $post;
        $args = array(
            'post_type' =>'post',
            'numberposts' => '4'
        );
        $blog_posts = get_posts($args);
    ?>
    <?php if($blog_posts) { ?>        
        <section id="home-posts" class="home-box clearfix">
            <h2 class="heading"><span><?php if(!empty($options['recent_work_text'])) { echo $options['recent_news_text']; } else { _e('News & Columns','adapt'); }?></span></h2>
            <?php
            if ( function_exists( 'get_smooth_slider_category' ) ) {
                get_smooth_slider_category(array(1, 18));
            }
            ?>
        </section>
        <!-- /home-posts -->        
    <?php } ?>

    <?php if($blog_posts) { ?>        
        <section id="board-posts" class="home-box clearfix">
            <h2 class="heading"><span><?php if(!empty($options['recent_work_text'])) { echo $options['recent_news_text']; } else { _e('Notice Board','adapt'); }?></span></h2>
            <?php
            if ( function_exists( 'get_smooth_slider_category' ) ) {
                get_smooth_slider_category('notice-board');
            }
            ?>
        </section>
        <!-- /home-posts -->        
    <?php } ?>

<!-- END home-wrap -->   
<?php get_footer(); ?>