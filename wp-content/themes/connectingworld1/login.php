<? 
$blogurl = get_option('siteurl')."/";
$postlink = $_GET['redirect']; 
?>
<link rel="stylesheet" href="<?=$blogurl ?>/wp-admin/css/login-popup.css" type="text/css" />
<?php
if ( !empty($errors) )
	echo '<div id="login_error">' . apply_filters('login_errors', $errors) . "</div>\n";
?>
<div id="login">
<form name="loginform" id="loginform" action="<?=$blogurl ?>/wp-login.php" method="post">
<p>
		<label><i>New User </i><a href="<?php echo get_option('siteurl'); ?>/register-step1" target="_blank" onclick="self.setTimeout('parent.parent.GB_hide()', 1000);">Click here to Register now!</a> <img src="images/free.gif" alt="free" /><br />
		</label>
	</p>
	<p>
		<label>Username<br />
		<input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	<p>
		<label>Password<br />
		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
 
	</p>
	<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Remember Me</label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" value="Log In" tabindex="100"  />
		<input type="hidden" name="redirect_to" value="<?=$postlink ?>#respond" />
		<input type="hidden" name="testcookie" value="1" /></p>
		<p>
		<div style="width: 160px; height: 80px; float: left; padding-right:90px;">
      <table width="160" border="0" align="left">
        <tr>
          <td width="80" height="80"><a href="<?php echo get_option('siteurl'); ?>/register-step1" target="_blank"><img title="premium" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/icon_free_basic.png" alt="" width="80" height="80" align="left" border="0" /></a></td>
          <td width="80" height="80"><a href="<?php echo get_option('siteurl'); ?>/premium-member" target="_blank"><img  title="premium" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/icon_upgrade_premium.png" alt="" width="80" height="80" align="left" border="0" /></a></td>
        </tr>
      </table>
    </div>
	</p>
	</p>
	
	<p class="submit">&nbsp;</p>
	<br />
    <p id="nav" >&nbsp;</p>
	
    <p ><a href="<?php echo get_option('siteurl'); ?>/wp-content/themes/connectingworld1/lost-password.php" title="Password Lost and Found">Forget  password or username?</a></p>
    
</form>
 
</div>

<p id="backtoblog"><a href="#" class="lbAction" rel="deactivate">Close</a></p>
 
<script type="text/javascript">
try{document.getElementById('user_login').focus();}catch(e){}
</script>
