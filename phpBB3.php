<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './phpBB3/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpBB conn test</title>
<script type="text/javascript">
  function senddata()
  {
  param = 'username='+<?php echo $_POST["username"];?>+'&password='+<?php echo $_POST["password"];?>;
		  //alert (""+param+"");
		  if(document.all)
		  {
			  //Internet Explorer
			  var XhrObj = new ActiveXObject("Microsoft.XMLHTTP");
		  }//fin if
		  else
		  {
			  //Mozilla
		  var XhrObj = new XMLHttpRequest();
		  }//fin else
		  //définition de l'endroit d'affichage:
		//  var regionsous = document.getElementById("region");
		   //  alert ("erreur : " + XhrObj.status); 	
		  XhrObj.open("POST", 'http://test-development.cw-connectingworld.com/phpBB3/ucp.php?mode=login');
		  //Ok pour la page cible
		  XhrObj.onreadystatechange = function()
		  {
			  if (XhrObj.readyState == 4 && XhrObj.status == 200)
			//	  regionsous.innerHTML = XhrObj.responseText ;
		  }
  
		  XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		  XhrObj.send(param);
	  }
  </script>
</head>
<body>
<?php
// PHPBB LOGIN AUTH
if ($user->data['user_id'] == ANONYMOUS) {
?>
Welcome, anomalous!
<?php
} else {
?>
Welcome back, <?php echo $user->data['username_clean']; ?> | You have <?php echo $user->data['user_unread_privmsg']; ?> new messages
<?php } ?>
<form method="POST" action="phpBB3.php">
Username: <input type="text" name="username" size="20"><br />
Password: <input type="password" name="password" size="20"><br />
Remember Me?: <input type="checkbox" name="autologin"><br />
<input type="submit" value="Login" name="login">
<input type="button" value="dd" name="ddlog" onClick="javascript:senddata();">
<input type="hidden" name="redirect" value="../somefile.php">
</form>
wwwwwwwwwwwwwwwwwwwwwwwwwwwww
<form action="./phpBB3/ucp.php?mode=login" method="post">
    <h3><a href="./phpBB3/ucp.php?mode=login">Login</a>&nbsp; &bull; &nbsp; <a href="./phpBB3/ucp.php?mode=register">Register</a></h3>
    <fieldset>
        <label for="username">Username:</label>&nbsp;
        <input type="text" name="username" id="username" size="10" title="Username" />
        <label for="password">Password:</label>&nbsp;
        <input type="password" name="password" id="password" size="10" title="Password" />
        <input type="submit" name="login" value="Login" />
         <input type="button" name="clickme" value="clickme" id="clickme" />
    </fieldset>
</form>
<?php 
echo $_COOKIE['PHPSESSID'];
echo $_SESSION['sid'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script language="javascript">


$(document).ready(function() {
	 if(document.all)
		  {
			  //Internet Explorer
			  var XhrObj = new ActiveXObject("Microsoft.XMLHTTP");
		  }//fin if
		  else
		  {
			  //Mozilla
		  var XhrObj = new XMLHttpRequest();
		  }//fin else
        var userName = "admin";
        var passWord = "Admin@2011";
		var login ="Login";
        alert(userName + passWord);
        $.post("http://test-development.cw-connectingworld.com/phpBB3/ucp.php?mode=login", {username:userName,password:passWord,login:login});    
		
		XhrObj.onreadystatechange = function()
		  {
			  if (XhrObj.readyState == 4 && XhrObj.status == 200)
			  var regionsous = document.getElementById("result");
			 regionsous.innerHTML = XhrObj.responseText ;
		  }
    });


	 
</script>
  <?php
  define('IN_PHPBB', true);
    $phpbb_root_path = './phpBB3/';
    $phpEx = substr(strrchr(__FILE__, '.'), 1);
	if ($user->data['is_registered']) {
		$sid=$user->session_id;
       echo '<a href="'.$phpbb_root_path.'/ucp.php?mode=logout&sid='.$sid.'">Logout</a>';
    }
	?>
<div id="result">ONe : </div>
</body>
</html>