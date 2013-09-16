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

<div style="width: 580px; margin-left:20px; float:left;">
	<div class="groupsheader" style="width:265px; float:left;">
		<span>
			<a style="cursor: pointer;" href="http://cw-connectingworld.com/global-business-groups/presentation-of-groups"><img height="11px" src="<?php echo plugins_url('/include/images/annat/backarrows.png', dirname( __FILE__) ); ?>" /> BACK TO THE LIST OF GROUPS</a>
		</span>
	</div>

			<?php if ($id_country==1) { ?>
				<img style="float:right;" src="<?php echo plugins_url('/include/images/annat/aboutswe.jpg', dirname( __FILE__) ); ?>">

				<br /><h1>About Sweden</h1><br>
				<p>Sweden has lowland areas which are similar to those in Denmark and Finland, but also mountain areas, although these are not as barren and steep as those in Norway.</p>

				<p>Sweden has a very rocky coastline with hundreds of small islands, some of which are arboreous. This type of coast line, called an archipelago, is found both on the eastern and the western side of the country, in particular around Gothenburg and Stockholm.</p>

				<p>More than half the land area in Sweden is covered mainly by coniferous forest. Spruce and pine occur in abundance in the north and in the Småland highlands, but other vegetation zones exist too. At the lower latitude and longitude degrees, the most common vegetation zones are the alpine zone, the birch zone, the coniferous zone and the beech zone in the south.</p>

				<p>The conditions for agriculture vary significantly from the southern parts of the country, where the crop season lasts seven months, to the north where the crop season only lasts for four months. However, because of the relatively high temperatures and the long daylight hours, it is possible to farm quite far north.</p>
				
				<a href="http://www.visitsweden.com/sweden/" target="_blank">http://www.visitsweden.com/sweden/</a><br /><br /> 
				<TABLE><TR><TD width="40"><br /><br /><br /><span class="spanthumb"></span></TD><TD width="95">
				<a style="cursor:pointer;" 
					onclick="myLightWindow.activateWindow({
					href:'http://www.viewmarstrand.se/public_server/rundvandringen/pano_14/360host.html',
					height:525,
					width:865,
					type:'external',
					loadingAnimation:'false'
					});">
					<img src="<?php echo plugins_url('/include/images/annat/marstrand-demo.jpg', dirname( __FILE__) ); ?>" />
				</a>

				</TD><TD width="95">
				<a style="cursor:pointer;" 
					onclick="myLightWindow.activateWindow({
					href:'http://viewgotland.se/gasemora/hoghojdsfoto?embed',
					height:600,
					width:800,
					type:'external',
					loadingAnimation:'false'
					});">
					<img src="<?php echo plugins_url('/include/images/annat/gotland-demo.jpg', dirname( __FILE__) ); ?>" />
				</a>
				</TD><TD></TD></TR></TABLE>
				</div> <!-- Main Div -->
				<div style="float:left;">
					<div class="groupsheader"><span>More information about Sweden</span></div>
						<div class="outerinfobox">
							<div class="innerinfobox">
							<h3 style="color: #000000;">Business facts about Sweden</h3>
							<p>
							Sweden is the largest country in Scandinavia. It borders to Norway in the west and Finland in the northeast. 
							In terms of area, Sweden is the 55th largest country in the world and 3rd largest in Europe. 
							In terms of population Sweden is a rather small country, with around 9 milion inhabitants.
							</p>
							<span class="readabook"><a style="cursor: pointer;" href="<?php $monUrl ?>/global-business-groups/presentation-of-groups?country=2">Read more...</a></span>
							</div>
						</div>
				</div>
				
			<?php } elseif ($id_country==2) { ?>
				<img style="float: right;" src="<?php echo plugins_url('/include/images/annat/business.gif', dirname( __FILE__) ); ?>">

				<br /><h1>Business facts about Sweden</h1><br>
				<p>Sweden is the largest country in Scandinavia. It borders to Norway in the west and Finland  in the northeast. In terms of area, Sweden is the 55th largest country in the world and 3rd largest in Europe. In terms of population  Sweden is a rather small country, with around 9 milion inhabitants.</p>
				
				<p>Sweden is a parliamentary democracy under a constitutional monarchy, King H.M. Carl XVI Gustaf. The people are represented at national level by the Riksdag, with 349 members in one chamber, which has legislative power. The Government implements the Riksdag's decision and draws up proposals for new laws or law amendments. General  elections are held every four years.</p>

				<p>In the 2006 general election the Moderate Party, allied with the Centre party, Liberal People’s party, and the Christian Democrats, with a common political platform, won a majority of the votes.Today's economy</p>

				<p>The official Swedish economic policy focuses on stable central government finances and the Riksbank focuses on low inflation and price stability.</p>
				
				<p>Sweden is an export oriented market economy. More than half of everything manufactured in Sweden is exported. Traditionally, the Swedish business and industry sector has been commodity-based. Paper, iron and steel are still important products but the main competitive factor today is knowledge and the flexible use of existing tangible and intangible resources. Public sector and taxes</p>

				<p>Sweden has a large public sector with ambitious  healthcare, educational and childcare system. Therefore, a distinguishing feature of the Swedish tax system in international terms is high income  taxes, even on very low incomes. This is due to very low basic allowance and the highest marginal taxes, the percentage paid on the last krona, is about 57 percent and occurs at a, internationally speaking, low pay level.</p>
                <a href="http://www.sweden.se/" target="_blank">http://www.sweden.se</a>
			</div> <!-- Main Div -->
				<div style="float:left;">
					<div class="groupsheader"><span>More information about Sweden</span></div>
						<div class="outerinfobox">
							<div class="innerinfobox">
							<h3 style="color: #000000;">About Sweden</h3>
							<p>
							Sweden has lowland areas which are similar
							to those in Denmark and Finland, but also
							mountain areas, although these are not as
							barren and steep as those in Norway.
							Sweden has a very rocky coastline with
							</p>
							<span class="readabook"><a style="cursor: pointer;" href="<?php $monUrl ?>/global-business-groups/presentation-of-groups?country=1">Read more...</a></span>
							</div>
						</div>
					</div>
				
			<?php } else { ?>
			<h1>404 This Page Don't Exists!</h1>
			<?php } ?>