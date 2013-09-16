<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
 
 global $data; //get theme options
?>

<div id="home-block-wrap">
	<div class="home-block-content">
        <h1 class="hb-heading"><b>A Better World Is Possible</b></h1>
        <div class="hb-content-column">

            <h2 class="hb-title">Global Business - Human Growth</h2>
            <ul>
                <li>Seek, Find and Get Assistance</li>
                <li>Connect with Entrepreneurs everywhere</li>
                <li>Join a Forum to Discuss Global Opportunities</li>
                <li>Start a Global Business Group in Your Country</li>
                <li>Educate Yourself in Global Business Topics</li>
                <li>Arrange Global Business Trips</li>
                <li>And Many Other Services...</li>
            </ul>
        </div>

        <div class="hb-content-column right-float">
            <div id="reg-form">
                <h2 class="reg-form-title">New Members,<br />Register for Free Access!</h2>
                <form action="" method="post">
                    
                    <input placeholder="<?=  __('First name', 'cw'); ?>" type="text" name="user_first_name" value="<?php isset($user_first_name) ? print $user_first_name : print __(''); ?>" id="user_first_name" class="input"  />
                    <input placeholder="<?=  __('Last name', 'cw'); ?>" type="text" name="user_last_name" value="<?php isset($user_last_name) ? print $user_last_name : print __(''); ?>" id="user_last_name" class="input"  />
                    <input placeholder="<?=  __('E-mail', 'cw'); ?>" type="text" name="user_email" value="<?php isset($email) ? print $email : print __(''); ?>" id="user_email" class="input"  />
                    <?php list_country(); ?>
                    <input placeholder="<?=  __('New Password', 'cw'); ?>" type="password" name="pass1" value="" id="user_pass" class="input"  />
                    <!-- <input type="hidden" name="pass2" value="" id="user_pass2" class="input"  />
                    <label for="newsletter" class="lbl_short"><input type="checkbox" checked="checked" name="newsletter" id="newsletter"><?php _e('Jag vill ha nyhetsbrev från Hi-Fi Klubben och SONOS', 'cw');?></label>
                    <input type="hidden" name="user_login" value="" id="user_login" class="input" /> -->

                    <br />
                    
                    <input type="submit"  value="<?php _e('Register for Free Access', 'cw'); ?>" id="register" class="btn" />
                    
                </form>
            </div>
        </div>
        <div class="hb-footer">
            <h1 class="hb-down-heading">CW Connecting World</h1>
            <h2>Pays Tribute to a Creative, Borderless and Open World</h2>
        </div>

    </div>
</div>
<!-- /slider-wrap -->
