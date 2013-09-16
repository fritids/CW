<?php
/*
  Template Name: market-palce
 */
get_header();
?>

<div class="span-24" id="contentwrap">
    <div class="span-13"> 
        <div id="content">	

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="postwrap">
                        <div class="post" id="post-<?php the_ID(); ?>">
                            <!-- <h2 class="title"><?php //the_title(); ?></h2> -->
                            <div class="entry">
                                <?php
                                if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
                                    the_post_thumbnail(array(300, 225), array('class' => 'alignleft post_thumbnail'));
                                }
                                ?>
                                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
								
								<?php
								//trouver id category
								$cat_id = isset($_POST['categoryclass']) ? $_POST['categoryclass'] : '';									
								?>
								<!-- liste des categories  -->
								<p><b><?php _e('Choose Category') ?></b>
									<?
									  list_classified_category_event($cat_id);
									  ?>
								</p>
								<!-- fin -->
									
                                <table  style="font-size:11px;" id="tab_market">
                                    <tr><th>Photo</th>
                                        <th>Title</th>	
                                        <th>Description</th>
                                        <th class="roww">Poster</th>
                                        <th class="roww">Posted </th>                                       

                                    </tr>
                                    <?php
									
									if($cat_id == "")
									{
										 $list_classified = list_classified();
									}
									else
									{
										$list_classified = list_classified_by_cat($cat_id);
									}
									
                                    $i=0;
                                    foreach ($list_classified AS $listclass) {
                                        if ($i%2==0)
                                          $st=" style= 'background-color: #F1F7F8;'";
                                        else 
                                            $st='';
                                        $i++;
                                        ?>
                                        <tr class="row" <?php echo $st;?> >
                                            <td class="roww" >
                                                <?php if($listclass->img_name) {?><img src="wp-content/themes/connectingworld1/pictures_classified/<?php echo $listclass->img_name; ?>"  width="50" height="50"/><?php } 
												else{
												echo'<div style="color: gray; font-size: 11px; border: gray 1px solid; height:45px; width:45px; text-align:center; vertical-align:middle;">NO PHOTO</div>';
												}
												?>
                                                   
                                            </td>

                                            <td class="roww">
                                                <a href="view-market-place?id=<?php echo $listclass->classified_id; ?>" style="color:blue; text-decoration:underline;">
												<?php echo $listclass->header; ?>
                                                </a><br>


                                                Category: <i><?php echo get_category_classified($listclass->classified_catid); ?></i><br>
                                                Type:
                                                <i><?php
            if ($listclass->type == 'o') {
                echo 'Offered';
            }
            if ($listclass->type == 'w') {
                echo 'Wanted';
            }
            if ($listclass->type == 'x') {
                echo 'Other';
            }
            ?></i>


                                            </td>

                                            <td>	
            <?php echo substr($listclass->message,0,20).'...'; ?></td>
                                            <td >
                                                 <?php echo get_user_profile($listclass->poster_user_id)->user_name; ?>		

                                            </td>
                                            <td>				
                                                <span style="font-size:11px;white-space:nowrap"><?php echo $listclass->posted_date;?></span>				

                                            </td>
                                            
                                        </tr>
        <?php } ?>

                                </table>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            endif; ?>
<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
        </div>
    </div>


<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>