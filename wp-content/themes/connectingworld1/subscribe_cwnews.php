 <?php
  /*
  Template Name: subscribe_cwnews
  */
 get_header(); ?>

 <div class="span-24" id="contentwrap">
	<div class="span-13"> 
		<div id="content">	

		<div class="postwrap">
			<div class="post" id="post-173">
				<div class="entry">

					<h2>Subscribe for CW newsletter by e-mail</h2>
					<?php   if ( !$user_ID ) {
						echo '<p><strong>You have to be logged in as a registered member to subscribe for CW news.</strong> ' ;
					}
					?>
					</p>
					<p style="text-align: justify;">We work hard to improve CW in every possible way we can find out. One way is to regularly write about news by mail directly to our dear members. The aim is of cause give you good reasons to visit us, day after day, and we humbly wish that our services will benefit to your success in business life.</p>
					<?php   if ( !$user_ID ) {
						echo '<p><a href="'.$monUrl.'/register-step1" style="color:blue;">Yes! I like to register in CW now, for free membership</a></p>' ;
					}
					?>					
					<p><b>If you are curious about CW newsletter from earlier days, you can get the oldies here.</b></p>
					<p>&nbsp;</p>
					
					<!-- affichage des 3 dernières newsletters -->
					<?php					

					$listnewsletters = get_list_newsletters_posts();	
					foreach ($listnewsletters AS $listnewsletter) {
					if ( !$user_ID ) { $url_news = $monUrl."/register-step1"; } 
					else {$url_news = $listnewsletter->guid; }
					?>
					<div class="lien_newsletter"><a href="<?php echo $url_news; ?>" style="color:blue;"><img src="<?php $img_newsletter = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_parent =".$listnewsletter->ID);
				echo $img_newsletter->guid;?>" /></a></div>			
					
					<?php 
						}
					
					?>
					<!-- fin -->
					<br />	
					<br />										
					<p><strong>Read Newsletters from Archive</strong></p>
					<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">	
						<option> </option>
						<option value="<?php echo $monurl; ?>/subscribe-for-cw-news">ALL</option>	
						<option disabled=""> ---- Year ---- </option>
						<?php
						$listdates = get_list_date_newsletters();
						foreach($listdates as $listdate){
						?>
							<option value="<?php echo $monurl; ?>/subscribe-for-cw-news?y=<?php echo $listdate->annee ; ?>"><?php echo $listdate->annee ; ?></option>
						<?php
						}
						//wp_get_archives( 'cat=-18&type=yearly&format=option' ); 
												
						?>
					</select>	
					
					<?php
						if(isset($_GET["y"]))
						{
							list_newsletters_annee($_GET["y"]) ;
						}
						else
						{
							if ( !$user_ID ) { list_newsletters(0) ; } 
							else {list_newsletters(1) ; }
														
						}
					  
					?>
	
					
				</div>
			</div>
		</div>
		
		<!-- upload image + lien -->
		<!--
		<div>
			<h3>Ajouter un news</h3>
			<form method="post" action="[votre fichier PHP pour l'upload.php]" enctype="multipart/form-data">   			
				  <input type="hidden" name="MAX_FILE_SIZE" value="2097152">    
				  <label>Image </label><input type="file" name="nom_du_fichier"  size="41">   <br />
				  <label style="margin-right:10px">Lien  </label><input type="text" name="liennews" value="<?php //echo get_option('siteurl'); ?>/" size="55" >
				  <br /><br />
				  <input type="submit" value="Envoyer">   
			</form>
			<br />
		</div>
		-->
		<br />
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			
		</div>

	</div>
	

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>