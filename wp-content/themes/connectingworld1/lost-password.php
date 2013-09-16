<? 

$blogurl = get_option('siteurl')."/";
$postlink = $_GET['redirect']; 
?>
<link rel="stylesheet" href="<?=$blogurl ?>/wp-admin/css/login-popup.css" type="text/css" />
<script type="text/javascript">
function register()
{
self.setTimeout('parent.parent.GB_hide()', 1000);
location.href='<?=$blogurl ?>/register-step1';
}
</script>
<div id="login">
<form name="loginform" id="loginform" action="<?=$blogurl ?>/wp-login.php?action=lostpassword" onsubmit="self.setTimeout('parent.parent.GB_hide()', 1000);" method="post">
<p>
		<label><i>New User </i><a href="<?=$blogurl ?>/register-step1" onclick="self.setTimeout('parent.parent.GB_hide()', 1000);">Click here to Register now!</a> <img src="images/free.gif" alt="free" /><br />
		</label>
	</p>
	<p>
		<label>Username or E-mail:<br/>
		<input type="text" name="user_login" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	
	<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Get New Password" tabindex="100" /><input type="hidden" name="redirect_to" value="<?=$postlink ?>#respond" />
		<input type="hidden" name="testcookie" value="1" /></p>
</form>

</div>
 
<p id="backtoblog"><a href="#" class="lbAction" rel="deactivate">Close</a></p>
 
<script type="text/javascript">
try{document.getElementById('user_login').focus();}catch(e){}
</script>