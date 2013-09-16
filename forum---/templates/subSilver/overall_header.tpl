<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
    "http://www.w3.org/TR/html4/loose.dtd">
<html dir="{S_CONTENT_DIRECTION}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={S_CONTENT_ENCODING}">
<meta http-equiv="Content-Style-Type" content="text/css">
{META}
{NAV_LINKS}
<title>{SITENAME} :: {PAGE_TITLE}</title>
<link rel="stylesheet" type="text/css" href="main.css" media="screen,print">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script src="http://jquery-translate.googlecode.com/files/jquery.translate-1.3.9.min.js" type="text/javascript"></script>
<script src="/include/js/jq.cookie.js" type="text/javascript"></script>
<script src="/include/js/google-translate.js" type="text/javascript"></script>
<!-- link rel="stylesheet" href="templates/subSilver/{T_HEAD_STYLESHEET}" type="text/css" -->
<style type="text/css">
<!--
/*
  The original subSilver Theme for phpBB version 2+
  Created by subBlue design
  http://www.subBlue.com

  NOTE: These CSS definitions are stored within the main page body so that you can use the phpBB2
  theme administration centre. When you have finalised your style you could cut the final CSS code
  and place it in an external file, deleting this section to save bandwidth.
*/



/* Import the fancy styles for IE only (NS4.x doesn't use the @import function) */
@import url("templates/subSilver/formIE.css"); 
-->
</style>
<!-- BEGIN switch_enable_pm_popup -->

<script language="Javascript" type="text/javascript">
<!--
	if ( {PRIVATE_MESSAGE_NEW_FLAG} )
	{
		window.open('{U_PRIVATEMSGS_POPUP}', '_phpbbprivmsg', 'HEIGHT=225,resizable=yes,WIDTH=400');;
	}
//-->
</script>
<!-- END switch_enable_pm_popup -->
</head>
<body bgcolor="{T_BODY_BGCOLOR}" text="{T_BODY_TEXT}" link="{T_BODY_LINK}" vlink="{T_BODY_VLINK}">


<a name="top"></a>

<div id="wrap">
<div id="top">		
		<div id="loggo"  onclick="location.href='../'" style="cursor:hand">&nbsp;</div>	
		<div id="fill"><img src="/images/blank.gif"></div>
		<div id="holder">	
		

			<div id="banners">
				<div style="float:left"><a href="../register/register.php"><IMG  SRC="/images/MemberCW120x90.gif" WIDTH="120" HEIGHT="90" style="margin-left:-1px;margin-top:-1px" BORDER="0" ALT=""></a></div>
				
							<div style="float:left;width:287px;overflow:hidden;background-color:#043882;height:90px"><IMG SRC="/images/CW-IHGB-banner.jpg" WIDTH="287" HEIGHT="83" BORDER="0" ALT=""></div>
				<div style="float:left"><A HREF="javascript:openit()"><IMG 
				SRC="/images/220x90_film-banner.gif" WIDTH="220" HEIGHT="90" BORDER="0" ALT=""></a></div>
			
			</div>

			<div id="parts">
				
				

				<!-- BEGIN switch_user_logged_in -->

				<form ID="login">
					<div> 
					You are online | <A HREF="../scripts/signout.php">Log out</A>
						</div> 
				</form>	
				
				<!-- END switch_user_logged_in -->
				
				<!-- BEGIN switch_user_logged_out -->

				<form ID="login" action="../scripts/logon.php" method="post">

					<div> 
						<label for=username>Username</label>
						<input type="text" name="user_name" style="width:70px" size="7" value=""> 
					</div>					
					<div> 
						<label for=Password1>Password </label> 	
						<input name="user_pass" type="password" size="7">
					</div>
					<div style="padding-top:15px">
					<input type="submit" name="Submit_logon" value="Log in" ID="Submit" style="font-family:helvetica;width:40px">
					</div>
					
					<div style="padding-left:10px">
						<span style="color:gray;font-size:110%;line-height:20px"><b>CW Global Growth Builders</b> - Global focus - local action</span> <br>					
						 
						  <A HREF="../register/forgot_password.php" style="font-size:110%">Forgot password ?</A>
						 &nbsp; | &nbsp;
								
						 <A HREF="../register/register.php" style="font-size:110%">Register in CW for free membership</A>
					</div>


				</form>	
				
				<!-- END switch_user_logged_out -->

				<script>
				function selectLng(fobj){
				var sel = fobj.options[fobj.selectedIndex].value;
				if(!confirm("You will be redirected to a CW country site, to return to Global-English portal click on the CW logotype ")) return;
				if(sel=="0") return;
				location.href = "/" + sel;
				//var lang_win = window.open("/" + sel,null, "width=900,height=600,scrollbars=yes,locationbar=no,menubar=no,personalbar=no,resizable=1,toolbar=no,status=no,screenX=100,screenY=100,top=100,left=100");
				//lang_win.focus()
				}
				
				</script>
				<div style="float:right;padding-right:20px;padding-top:0px">
				<span style="font-size:9px" title="Read about CW in your language">CW in country:</span><br>
				
		<form style="display:inline;">
		<select  name="land" onchange="window.location=this.options[this.selectedIndex].value;" style="font-size:10px;width:100px">
				
				<Option disabled selected style="color:gray;font-size:9px" value="">Choose country</OPTION>
				
				<OPTION VALUE="<?php print ROOT_URL ?>info/contact.php">
                World Wide Base</OPTION>
				<OPTION VALUE="http://www.cw-connectingworld.com/info/contact.php?country=bolivia">
                Bolivia</OPTION>				
				<OPTION VALUE="http://www.cw-connectingworld.com/info/contact.php?country=china">
                China</OPTION>
                <OPTION VALUE="http://www.cw-connectingworld.com/info/contact.php?country=colombia">
                Colombia</OPTION> 
				<OPTION VALUE="http://www.cw-connectingworld.com/info/contact.php?country=india">
                India</OPTION>
				<OPTION VALUE="http://www.cw-connectingworld.com/info/contact.php?country=spain">
                Spain</OPTION>
				<OPTION VALUE="http://www.cw-connectingworld.com/info/contact.php?country=sweden">
                Sweden</OPTION>
				<OPTION VALUE="http://www.cw-connectingworld.com/info/contact.php?country=malmo">
                &nbsp; Malmo</OPTION>
				<OPTION VALUE="http://www.cw-connectingworld.com/info/contact.php?country=vasteras">
                &nbsp; Vasteras</OPTION>
				
			</select>
		</form>

				</div>



				
				
							
			</div>	
			
			<div id="mainnav">
				
					<ul>
						<li class=first><a href="/">Home</a></li>
						<li><a href="/mypage/mypage.php" title="">My page</a></li>			
						<li><a href="/search/business_search.php" title="">Business<br>Search</a></li>

						<li><a href="/info/page.php?id=135" title="">Global<br>Business Groups</a></li>

						<li><a href="/forum/" title="">Forum &<br> Columns</a></li>

						<li><a href="/search/classified.php" title="">Marketplace</a></li>
						
						<li><a href="/info/contact.php" title="">Contact<br>Press & People</a></li>
						<!--li><a href="/" title="">CW Entrepreneur<br>
							Embassy</a></li-->
				
					</ul>

			
				
			</div>

				<script>
				function chat(){
		
				var lang_win = window.open("http://www.cw-connectingworld.com/phpfreechat-1.1/demo/cw.php",null, "width=600,height=600,scrollbars=yes,locationbar=no,menubar=no,personalbar=no,resizable=1,toolbar=no,status=no,screenX=100,screenY=100,top=100,left=100");
				lang_win.focus()
				}
				
				</script>

			<div id="subnav">
			<ul>
			<li class="first"><a href="index.php">Forum start</a></li>
			<li><a href="{U_SEARCH}">{L_SEARCH}</a></li>
			<li><a href="{U_GROUP_CP}">{L_USERGROUPS}</a></li>
			<li><a href="{U_FAQ}">{L_FAQ}</a></li>
			<!--li><a href="{U_MEMBERLIST}">{L_MEMBERLIST}</a></li-->			
			<li><a href="{U_PROFILE}">{L_PROFILE}</a></li>
			<li><a href="/info/columns.php">Columns</a></li>
			<!--li><a href="javascript:chat()">Chat</a></li-->
			
			
			</ul>
			</div>		
			
		</div>
		
	</div>

<table  width="802" cellspacing="0" cellpadding="10" border="0"> 
	<tr> 
	<td width=137 valign=top>
		
        <div id="subnav1">
			
							
					<div class="LM_button"><a class="visible_link" href="/info/page.php?id=157" 
					 title="">What is CW&nbsp;</a></div>
					
                    <div class="LM_button"><a class="visible_link" href="/info/services.php" 
					 title="">CW Services&nbsp;</a></div>	
					
                    <div class="LM_button"><a class="visible_link" href="/info/business_support.php" 
					title="">Business support&nbsp;</a></div>

					<div class="LM_button"><a class="visible_link" href="/info/page.php?id=124" 
					 title="">Work with us&nbsp;</a></div>
					 
					<div class="LM_button"><a class="visible_link" href="/info/your_views.php" 
					 title="">Your views&nbsp;</a></div>	
					<div class="LM_button"><a class="visible_link" href="/info/faq.php" 
					 title="">FAQ&nbsp;</a></div>
					 
					<div class="LM_button"><a class="visible_link" href="/scripts/tip_friends.php" 
					 title="">Tip a friend&nbsp;</a></div>	

					<div class="LM_button"><a class="visible_link" href="/info/download.php" 
					 title="">Downloads&nbsp;</a></div>

					<div class="LM_button"><a class="visible_link" href="/info/sitemap.php" 
					 title="">Sitemap&nbsp;</a></div>	


		</div>
	
	
	</td>
	
		<td class="bodyline">
