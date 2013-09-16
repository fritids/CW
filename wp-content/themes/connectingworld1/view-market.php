 <?php
  /*
  Template Name: view-marketpalce
  */
 get_header(); ?>
<?php update_number_viewed_classified($_GET['id']);?>
<div class="span-24" id="contentwrap">
	<div class="span-13"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="title"><?php the_title(); ?></h2>
				<div class="entry">
                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                   
                                   
                                    <?php $listclass =  list_classified_by_id($_GET['id']);?>
                                              
                                    <table border="0">
                                        <tr>
                                            <td>
												<a id="img_market" class="bluelink"  href="wp-content/themes/connectingworld1/pictures_classified/<?php echo $listclass->img_name; ?>" title="<?php echo $listclass->header; ?>">
                                                <img src="wp-content/themes/connectingworld1/pictures_classified/<?php echo $listclass->img_name; ?>" width="50" height="50"/> <br />
												<span style="font-size:11px;" >Click at picture for bigger size</span>
												</a>
                                            </td>
                                            <td>
                                                <table border="0">
                                                    <tr>
                                                        <td><b>Title: </b></td>
                                                        <td><?php echo $listclass->header; ?></td>
                                                    
                                                        <td><b>Poster: </b></td>
                                                        <td> <?php echo get_user_profile($listclass->poster_user_id)->user_name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Category: </b></td>
                                                        <td><?php echo get_category_classified($listclass->classified_catid); ?></td>
                                                    
                                                        <td><b>Type: </b></td>
                                                        <td><?php
            if ($listclass->type == 'o') {
                echo 'Offered';
            }
            if ($listclass->type == 'w') {
                echo 'Wanted';
            }
            if ($listclass->type == 'x') {
                echo 'Other';
            }
            ?></td>
                                                    </tr>
                                                      <tr>
                                                        <td><b>Posted: </b></td>
                                                        <td><?php echo $listclass->posted_date;?></td>
                                                    
                                                        <td><b>Country: </b></td>
                                                        <td> <?php echo get_country_name($listclass->country_id)->name; ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><?php echo $listclass->message; ?></td>
                                        </tr>
                                       
                                        <tr><td colspan="2"><hr/></td></tr>
                                        <tr><td colspan="2">Interested in this ad?, contact the poster: <a href="user_send_message?user_id=<?php echo $listclass->poster_user_id;?>" style="color:blue;">Send a message </a></td></tr>
                                     
                                        <tr><td colspan="2"><hr/></td></tr>
                                        <tr><td colspan="2">This ad has been viewed <?php echo $listclass->num_reads;?>  times</td></tr>
                                    </table>
            </div>
			</div>
            </div>
			<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</div>
	

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>