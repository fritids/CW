<script type="text/javascript">
function companycontent(param)
          {
        param = 'comp='+param;
          
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
		var regionsous = document.getElementById("companyAreaInternal");
		 //  alert ("erreur : " + XhrObj.status); 	
		XhrObj.open("POST", '<?php echo $ajax_map; ?>/ajax_company_content.php');
		//Ok pour la page cible
		XhrObj.onreadystatechange = function()
		{
			if (XhrObj.readyState == 4 && XhrObj.status == 200)
				regionsous.innerHTML = XhrObj.responseText ;
		}

		XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		XhrObj.send(param);   
          }
</script>


<!-- CSS's -->
<link rel="stylesheet" href="<?php echo plugins_url('/include/css/gbg_pres.css', dirname( __FILE__) ); ?>" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo plugins_url('/include/css/lightbox.css', dirname( __FILE__) ); ?>" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo plugins_url('/include/css/lightwindow.css', dirname( __FILE__) ); ?>" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('/include/css/lightview.css', dirname( __FILE__) ); ?>" />
<!-- Import Javascript Libraries -->
<script type="text/javascript" src="<?php echo plugins_url('/include/lib/prototype.js', dirname( __FILE__) ); ?>"></script>
<script type='text/javascript' src='<?php echo plugins_url('/include/lib/prototype_update_helper.js', dirname( __FILE__) ); ?>'></script>
<script type="text/javascript" src="<?php echo plugins_url('/include/src/scriptaculous.js?load=effects,builder', dirname( __FILE__) ); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('/include/src/lightbox.js', dirname( __FILE__) ); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('/include/src/lightwindow.js', dirname( __FILE__) ); ?>"></script>
<script type='text/javascript' src='<?php echo plugins_url('/include/src/lightview.js', dirname( __FILE__) ); ?>'></script>

<?php
	$PresentationContent = $id_group;

	switch($PresentationContent) {
		case 1:?>
        <div style="float: left;">
			<div class="groupsheader">
            	<span>
                <a style="cursor: pointer;" href="http://cw-connectingworld.com/global-business-groups/presentation-of-groups"><img height="11px" src="<?php echo plugins_url('/include/images/annat/backarrows.png', dirname( __FILE__) ); ?>" /> BACK TO THE LIST OF GROUPS</a>
                </span>
            </div>
			<h1>GBG Sweden No. 000001: The Forest Group</h1>
			<div style="float:left; width:200px;">
            	<div style="width: 200px;"><center>
            		<img alt="img" src="<?php echo plugins_url('/include/images/annat/perhansson.gif', dirname( __FILE__) ); ?>">
            		</center></div>
                <br /><br />&nbsp;
            	<div style="width: 200px;"><center>
            		<img alt="img" src="<?php echo plugins_url('/include/images/annat/groupicon01.gif', dirname( __FILE__) ); ?>">
            		</center></div>
            </div> <!-- end of left div -->
            
            <div style="float:left;">
            	<div style="margin-top: 40px">
					<p><span class="bold">
                    	Group Manager: Per Hansson</span>
                    </p>
					<p> Hi! My name is Per Hansson, I am the owner of the company<br /> 
						Forestry Design and coordinate The Forest Group of Sweden. I’m <br /> 
						a 46 years old entrepreneur. I’m married and have two teenage <br /> 
						children, me and my family live in Bredäng in the Stockholm area <br /> 
						of Sweden.<br /> 
						Please - feel free to contact me in any kind of business issues <br /> 
						regarding forestry.
                    </p><br /> 
					<p>
						<span class="bold">Work Mail:</span> <a href="mailto:p.hansson@forestry-deisgn.se">p.hansson@forestry-deisgn.se</a><br>
						<span class="bold">CW Mail:</span>  <a href="mailto:p.hansson.se.000001@cw-connectingworld.com">p.hansson.se.000001@cw-connectingworld.com</a><br>
						<span class="bold">Phone work:</span> +46 8 12345678<br>
						<span class="bold">Phone mobile:</span> +46 70 12345678<br>
						<span class="bold">Web:</span> <a href="www.forestry-design.se">www.forestry-design.se</a><br>
					</p>
					<p>
						<span class="bold">Number of companies in the group: </span> 27<br>
						<span class="bold">The Forest Group focuses on: </span> Forestry, Forest Industry, <br /> 
						electronic software and hardware products for the sawmill and <br /> 
						logging. Logging and post-treatment of timber.<br /> 
					</p>
				</div>
                <div>
					<br /> <img alt="img" style="float: left; margin-right: 6px;" src="<?php echo plugins_url('/include/images/flags/se.gif', dirname( __FILE__) ); ?>"/><h3>000001.SE</h3>
					<p>
						<span class="bold">Companies in The Forest Group:</span>
						<div id="GroupCompaniesAreaInternal" class="GroupCompaniesAreaInternal">
							<div id="companylist"><ul><TABLE><TR><TD>
								<li><a style="cursor:pointer; color:#000000;" href="javascript:companycontent(11)" onclick="this.style.fontWeight='bold'; this.style.color='black';"> Forestry Demo Company 1 Ltd </a></li>
			<!-- <li><a style="cursor:pointer;" onclick="loadCompany(12)"> Forestry Demo Company 2 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(13)"> Forestry Demo Company 3 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(14)"> Forestry Demo Company 4 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(15)"> Forestry Demo Company 5 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(16)"> Forestry Demo Company 6 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(17)"> Forestry Demo Company 7 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(18)"> Forestry Demo Company 8 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(19)"> Forestry Demo Company 9 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(110)"> Forestry Demo Company 10 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(111)"> Forestry Demo Company 11 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(112)"> Forestry Demo Company 12 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(113)"> Forestry Demo Company 13 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(114)"> Forestry Demo Company 14 Ltd </a></li>
			</TD>
			<TD>
			<li><a style="cursor:pointer;" onclick="loadCompany(115)"> Forestry Demo Company 15 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(116)"> Forestry Demo Company 16 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(117)"> Forestry Demo Company 17 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(118)"> Forestry Demo Company 18 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(119)"> Forestry Demo Company 19 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(120)"> Forestry Demo Company 20 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(121)"> Forestry Demo Company 21 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(122)"> Forestry Demo Company 22 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(123)"> Forestry Demo Company 23 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(124)"> Forestry Demo Company 24 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(125)"> Forestry Demo Company 25 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(126)"> Forestry Demo Company 26 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(127)"> Forestry Demo Company 27 Ltd </a></li> -->
			<font color="#999999">
			<li>Forestry Demo Company 2 Ltd</li>
			<li>Forestry Demo Company 3 Ltd</li>
			<li>Forestry Demo Company 4 Ltd</li>
			<li>Forestry Demo Company 5 Ltd</li>
			<li>Forestry Demo Company 6 Ltd</li>
			<li>Forestry Demo Company 7 Ltd</li>
			<li>Forestry Demo Company 8 Ltd</li>
			<li>Forestry Demo Company 9 Ltd</li>
			<li>Forestry Demo Company 10 Ltd</li>
			<li>Forestry Demo Company 11 Ltd</li>
			<li>Forestry Demo Company 12 Ltd</li>
			<li>Forestry Demo Company 13 Ltd</li>
			<li>Forestry Demo Company 14 Ltd</li>
			</font>
			</TD>
			<TD>
			<font color="#999999">
			<li>Forestry Demo Company 15 Ltd</li>
			<li>Forestry Demo Company 16 Ltd</li>
			<li>Forestry Demo Company 17 Ltd</li>
			<li>Forestry Demo Company 18 Ltd</li>
			<li>Forestry Demo Company 19 Ltd</li>
			<li>Forestry Demo Company 20 Ltd</li>
			<li>Forestry Demo Company 21 Ltd</li>
			<li>Forestry Demo Company 22 Ltd</li>
			<li>Forestry Demo Company 23 Ltd</li>
			<li>Forestry Demo Company 24 Ltd</li>
			<li>Forestry Demo Company 25 Ltd</li>
			<li>Forestry Demo Company 26 Ltd</li>
			<li>Forestry Demo Company 27 Ltd</li>
			</font>
							
							</TD></TR></TABLE>
							</ul></div>
						</div>
					</p>
					</div>
					<div id="companyAreaInternal" class="companyAreaInternal">
					</div>
				</div>
                
            </div> <!-- end of right div -->
            <div style="border: 1px solid #ffffff;" class="clearfix">
						
						
					<div class="clearfix" style="clear: both">
						
						
					<?php
		break;
		case 2: ?>
			<div style="float: left;">
				<div class="groupsheader"><span><a style="cursor: pointer;" href="http://cw-connectingworld.com/global-business-groups/presentation-of-groups"><img height="11px" src="<?php echo plugins_url('/include/images/annat/backarrows.png', dirname( __FILE__) ); ?>" /> BACK TO THE LIST OF GROUPS</a></span></div>
					<h1>GBG Sweden No. 000002: The Regional Örebro Län Group</h1>
					<div style="border: 1px solid #ffffff;" class="clearfix">
						<div style="float: left; width: 200px;"><center><img alt="img" src="<?php echo plugins_url('/include/images/annat/annapersson.gif', dirname( __FILE__) ); ?>"></center></div>
						<div style="margin-top: 40px">
							<p><span class="bold">Group Manager: Anna Persson</span></p>
								<p>Hi! My name is Anna Persson, I am the owner of the company 
									Tasteful Design and coordinate The Regional Örebro Län Group of 
									Sweden. I’m a 34 years old entrepreneur. I’m married and have 
									no children so far. Me and my husband live in Vivalla in the Örebro 
									area of Sweden, two hours west of Stockholm.
									Please - feel free to contact me in any kind of business issues 
									regarding forestry.</p><br /> 
							<p>
							<span class="bold">Work Mail:</span> <a href="mailto:a.persson@tasteful-design.se">a.persson@tasteful-design.se</a><br>
							<span class="bold">CW Mail:</span>  <a href="mailto:a.persson.se.00002@cw-connectingworld.com">a.persson.se.00002@cw-connectingworld.com</a><br>
							<span class="bold">Phone work:</span> +46 19 12345678<br>
							<span class="bold">Phone mobile:</span> +46 70 1234567<br>
							<span class="bold">Web:</span> <a href="www.tasteful-design.se">www.tasteful-design.se</a><br>
							</p>
							<p>
								<span class="bold">Number of companies in the group: </span> 36<br>
								<span class="bold">The Regional Örebro Län Group focuses on: </span> Manufacturing,<br /> 
								science, tourism, entertainments, good living, relaxation and <br /> 
								design.<br /> 
							</p>
						</div>
					<div class="clearfix" style="clear: both">
						<div style="float: left; width: 200px;"><center><img alt="img" src="<?php echo plugins_url('/include/images/annat/groupicon_02.jpg', dirname( __FILE__) ); ?>"></center></div>
						<div>
							<br /> <img alt="img" style="float: left; margin-right: 6px;" src="<?php echo plugins_url('/include/images/flags/se.gif', dirname( __FILE__) ); ?>"/><h3>000002.SE</h3>
							<p>
								<span class="bold">Companies in The Örebro Län Group:</span>
								<div id="GroupCompaniesAreaInternal" class="GroupCompaniesAreaInternal">
									<div id="companylist"><ul><TABLE><TR><TD>
										<li><a style="cursor:pointer; color:#000000;" href="javascript:companycontent(21)" onclick="this.style.fontWeight='bold'; this.style.color='black';"> Örebro Demo Company 1 Ltd </a></li>
			<!-- <li><a style="cursor:pointer;" onclick="loadCompany(22)"> Örebro Demo Company 2 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(23)"> Örebro Demo Company 3 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(24)"> Örebro Demo Company 4 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(25)"> Örebro Demo Company 5 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(26)"> Örebro Demo Company 6 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(27)"> Örebro Demo Company 7 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(28)"> Örebro Demo Company 8 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(29)"> Örebro Demo Company 9 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(210)"> Örebro Demo Company 10 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(211)"> Örebro Demo Company 11 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(212)"> Örebro Demo Company 12 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(213)"> Örebro Demo Company 13 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(214)"> Örebro Demo Company 14 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(215)"> Örebro Demo Company 15 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(216)"> Örebro Demo Company 16 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(217)"> Örebro Demo Company 17 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(218)"> Örebro Demo Company 18 Ltd </a></li>
			</TD>
			<TD>
			<li><a style="cursor:pointer;" onclick="loadCompany(219)"> Örebro Demo Company 19 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(220)"> Örebro Demo Company 20 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(221)"> Örebro Demo Company 21 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(222)"> Örebro Demo Company 22 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(223)"> Örebro Demo Company 23 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(224)"> Örebro Demo Company 24 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(225)"> Örebro Demo Company 25 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(226)"> Örebro Demo Company 26 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(227)"> Örebro Demo Company 27 Ltd </a></li>		
			<li><a style="cursor:pointer;" onclick="loadCompany(228)"> Örebro Demo Company 28 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(229)"> Örebro Demo Company 29 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(230)"> Örebro Demo Company 30 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(231)"> Örebro Demo Company 31 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(232)"> Örebro Demo Company 32 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(233)"> Örebro Demo Company 33 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(234)"> Örebro Demo Company 34 Ltd </a></li>
			<li><a style="cursor:pointer;" onclick="loadCompany(235)"> Örebro Demo Company 35 Ltd </a></li>				
			<li><a style="cursor:pointer;" onclick="loadCompany(236)"> Örebro Demo Company 36 Ltd </a></li> -->	
			<li><a style="cursor:pointer; color:#000000;" href="javascript:companycontent(22)" onclick="this.style.fontWeight='bold'; this.style.color='black';"> Örebro Demo Company 2 Ltd </a></li>
            <font color="#999999">
			<li>Örebro Demo Company 3 Ltd</li>
			<li>Örebro Demo Company 4 Ltd</li>
			<li>Örebro Demo Company 5 Ltd</li>
			<li>Örebro Demo Company 6 Ltd</li>
			<li>Örebro Demo Company 7 Ltd</li>
			<li>Örebro Demo Company 8 Ltd</li>
			<li>Örebro Demo Company 9 Ltd</li>
			<li>Örebro Demo Company 10 Ltd</li>
			<li>Örebro Demo Company 11 Ltd</li>
			<li>Örebro Demo Company 12 Ltd</li>
			<li>Örebro Demo Company 13 Ltd</li>
			<li>Örebro Demo Company 14 Ltd</li>
			<li>Örebro Demo Company 15 Ltd</li>
			<li>Örebro Demo Company 16 Ltd</li>
			<li>Örebro Demo Company 17 Ltd</li>
			<li>Örebro Demo Company 18 Ltd</li>
			</font>
			</TD>
			<TD>
			<font color="#999999">
			<li>Örebro Demo Company 19 Ltd</li>
			<li>Örebro Demo Company 20 Ltd</li>
			<li>Örebro Demo Company 21 Ltd</li>
			<li>Örebro Demo Company 22 Ltd</li>
			<li>Örebro Demo Company 23 Ltd</li>
			<li>Örebro Demo Company 24 Ltd</li>
			<li>Örebro Demo Company 25 Ltd</li>
			<li>Örebro Demo Company 26 Ltd</li>
			<li>Örebro Demo Company 27 Ltd</li>
			<li>Örebro Demo Company 28 Ltd</li>
			<li>Örebro Demo Company 29 Ltd</li>
			<li>Örebro Demo Company 30 Ltd</li>
			<li>Örebro Demo Company 31 Ltd</li>
			<li>Örebro Demo Company 32 Ltd</li>
			<li>Örebro Demo Company 33 Ltd</li>
			<li>Örebro Demo Company 34 Ltd</li>
			<li>Örebro Demo Company 35 Ltd</li>
			<li>Örebro Demo Company 36 Ltd</li>
			</font>
									</TD></TR></TABLE>
									</ul></div>
								</div>
							</p>
						</div>
						<div id="companyAreaInternal" class="companyAreaInternal">
						</div>
					</div>
		<?php
		break;
		default:
			echo '<font color="red">The selected group dont have any information yet. In the demo version there is only information available if you select 000001.SE</font>';
	}		
?>