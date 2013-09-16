<?php 
global $wpdb;

include('add_gbg_core.php');

?>
<div class="wrap">
	<h2><?php _e("Add Global Business Group"); ?></h2>
	
	
<?php if ( $error ) { ?>
	<p class="error_meddelande">
		<?php echo $error; ?>
	</p><!-- .error -->
<?php } ?>

	<form method="post" id="add_gbg" class="add_gbg_form" action="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
		<table width="432" border="0">
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_title" type="text" value="<?php if ( $error && $_POST['group_title']!="" ) echo wp_specialchars( $_POST['group_title'], 1 ); else echo "Enter Group title"; ?>" onclick="if(this.value=='Enter Group title'){this.value=''}" onblur="if(this.value==''){this.value='Enter Group title'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="sel-6 fright">
						<span class="req"></span>
						<select class="w195" id="sel-6" name="continent">
							<option value="" <?php if(!$_POST['continent']) echo 'selected="selected"'; ?> >Continent</option>
							<?php 
								$continents = $wpdb->get_results($wpdb->prepare("SELECT id, continent_name FROM ".$wpdb->prefix."continents"));
								foreach ($continents as $continent) {
									if($continent->id==$_POST['continent'])
									$selected = 'selected="selected"';
									
									echo "<option $selected value=\"$continent->id\" >".$continent->continent_name."</option>";
									
									unset($selected);
								}
							?>
						</select>
					
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_man" type="text" value="<?php if ( $error && $_POST['group_man']!="" ) echo wp_specialchars( $_POST['group_man'], 1 ); else echo "Group Manager"; ?>" onclick="if(this.value=='Group Manager'){this.value=''}" onblur="if(this.value==''){this.value='Group Manager'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_focus" type="text" value="<?php if ( $error && $_POST['group_focus']!="" ) echo wp_specialchars( $_POST['group_focus'], 1 ); else echo "Focus"; ?>" onclick="if(this.value=='Focus'){this.value=''}" onblur="if(this.value==''){this.value='Focus'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_work_email" type="text" value="<?php if ( $error && $_POST['group_work_email']!="" ) echo wp_specialchars( $_POST['group_work_email'], 1 ); else echo "Work mail"; ?>" onclick="if(this.value=='Work mail'){this.value=''}" onblur="if(this.value==''){this.value='Work mail'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_cw_email" type="text" value="<?php if ( $error && $_POST['group_cw_email']!="" ) echo wp_specialchars( $_POST['group_cw_email'], 1 ); else echo "CW mail"; ?>" onclick="if(this.value=='CW mail'){this.value=''}" onblur="if(this.value==''){this.value='CW mail'}" />
					</div>
				</td>
			</tr>
			<tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_work_phone" type="text" value="<?php if ( $error && $_POST['group_work_phone']!="" ) echo wp_specialchars( $_POST['group_work_phone'], 1 ); else echo "Phone work"; ?>" onclick="if(this.value=='Phone work'){this.value=''}" onblur="if(this.value==''){this.value='Phone work'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_mobile_phone" type="text" value="<?php if ( $error && $_POST['group_mobile_phone']!="" ) echo wp_specialchars( $_POST['group_mobile_phone'], 1 ); else echo "Phone mobile"; ?>" onclick="if(this.value=='Phone mobile'){this.value=''}" onblur="if(this.value==''){this.value='Phone mobile'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_web" type="text" value="<?php if ( $error && $_POST['group_web']!="" ) echo wp_specialchars( $_POST['group_web'], 1 ); else echo "Web"; ?>" onclick="if(this.value=='Web'){this.value=''}" onblur="if(this.value==''){this.value='Web'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<textarea name="group_presentation" cols="" rows="" onclick="if(this.value=='Presentation'){this.value=''}" onblur="if(this.value==''){this.value='Presentation'}"><?php if ( $error && $_POST['group_presentation']!="" ) echo wp_specialchars( $_POST['group_presentation'], 1 ); else echo "Presentation"; ?></textarea>
			
					</div>
				</td>
			</tr>
		</table>
		
		
		<?php  wp_nonce_field('add_gl_gbg','add_global_group'); ?>
		
		<input class="submit_button" name="submit_gbg" type="submit" value="Add New Group" />
		
		
	</form>
	
	
</div> <!-- .wrap -->