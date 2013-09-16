<?php 
require('../../../../wp-load.php' );
require_once('../include/func.php' );

?>
<?php
  $groupsContent = (int)$_REQUEST['grp'];

  switch($groupsContent) {
    case 39: ?>
	<div style="float: left;">
					<div class="groupsheader"><span>Welcome to GBG Sweden</span></div>
						<div class="outerinfobox">
							<div class="innerinfobox">
								<div>
								<img width="320px" height="55px" src="<?php echo plugins_url('/include/images/Gotland_321x56.jpg', dirname( __FILE__) ); ?>" style="float:right; border:1px solid #000000; margin-left:8px;" />
								<h3 style="color: rgb(0, 0, 0);">ABOUT THE COUNTRY OF SWEDEN</h3>			
											<p><a style="cursor: pointer;" onclick="" href="<?php $monUrl ?>/global-business-groups/presentation-of-groups?country=1" class="innerinfo">
											Sweden has lowland areas which are similar
											to those in Denmark and Finland, but also
											mountain areas...</a></p>
								</div>
							</div>	
							<div class="innerinfobox">
								<div>
								<img width="320px" height="55px" src="<?php echo plugins_url('/include/images/gbg_pan_sthlm.jpg', dirname( __FILE__) ); ?>" style="float:right; border:1px solid #000000; margin-left:8px;" />
								<h3 style="color: rgb(0, 0, 0);">BUSINESS FACTS ABOUT SWEDEN</h3>
											<p><a style="cursor: pointer;" href="<?php $monUrl ?>/global-business-groups/presentation-of-groups?country=2" class="innerinfo">
											Sweden is the largest country in Scandinavia. It borders to Norway in the west and Finland in the north...</a></p>
								</div>
							</div>
						</div>
						<br />
					
					<div class="listobjekt">
						<div class="listnumber"><img src="<?php echo plugins_url('/include/images/flags/se.gif', dirname( __FILE__) ); ?>"> <p class="bold">
						Group 000001.SE</p></div>
						<img style="float: left; margin: 1px 2px 0px; border: 4px solid rgb(195, 218, 236);" src="<?php echo plugins_url('/include/images/portraits/personal000001.gif', dirname( __FILE__) ); ?>">
					 	<p><span class="bold">Group Manager:</span> Per Hansson</p>
						
						<p><span class="bold">Number of companies:</span> 27</p>

					 	<p><span class="bold">Focus:</span> Forestry, Forest Industry, products for the sawmill and logging.</p>
						
						<span class="readabook"><a style="cursor: pointer;" href="<?php $monUrl ?>/global-business-groups/presentation-of-groups?group=1" >Go to group »</a></span>
					</div>
					
					<div class="listobjekt">
						<div class="listnumber"><img src="<?php echo plugins_url('/include/images/flags/se.gif', dirname( __FILE__) ); ?>"> <p class="bold">Group 0000002.SE</p></div>
						<img style="float: left; margin: 1px 2px 0px; border: 4px solid rgb(195, 218, 236);" src="<?php echo plugins_url('/include/images/portraits/personal000002.gif', dirname( __FILE__) ); ?>">

					 	<p><span class="bold">Group Manager:</span> Anna Persson</p>
						
					 	<p><span class="bold">Number of companies:</span> 36</p>
						
					 	<p><span class="bold">Focus:</span> Regional based, diversifed companies from the Region of Örebro Län.</p>
						
						<span class="readabook"><a style="cursor: pointer;" href="<?php $monUrl ?>/global-business-groups/presentation-of-groups?group=2" >Go to group »</a></span>
					</div>
					 	« Previous - Next »
				</div> <?php
		  break;
	default:
      echo '<font color="red">The selected country dont have any information yet. In the demo version there is only information available if you select Sweden</font>';
	   }		
?>