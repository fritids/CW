<?php 
if ($_GET['ac'] == 'unsubscribe') {
  $link = '/newsletter?lang=' . esc_attr($_GET['lang']) . '&ac=' . 
          esc_attr($_GET['ac']) . '&em1=' . esc_attr($_GET['em1']) . '&em2=' .
          esc_attr($_GET['em2']) . '&uk=' . esc_attr($_GET['uk']);
  wp_redirect($link);
  exit;
}
get_header(); ?>
<div class="span-24" id="contentwrap">
	<div class="span-13">
		<div id="content">	
			<h2 class='pagetitle'>Error 404 - Page Not Found</h2>
		</div>
	</div>

<?php get_sidebars(); ?>
	</div>
<?php get_footer(); ?>