<?php 

function aldgbi_quicktag()
{ 
//---- Based on Edit Button Framework from http://www.asymptomatic.net/wp-hacks

	if(strpos($_SERVER['REQUEST_URI'], 'post.php') || strpos($_SERVER['REQUEST_URI'], 'comment.php') || strpos($_SERVER['REQUEST_URI'], 'page.php') || strpos($_SERVER['REQUEST_URI'], 'post-new.php') || strpos($_SERVER['REQUEST_URI'], 'page-new.php') || strpos($_SERVER['REQUEST_URI'], 'bookmarklet.php'))
	{
		?>
		<script language="JavaScript" type="text/javascript"><!--
		var toolbar = document.getElementById("ed_toolbar");
		<?php
				edit_insert_button("GBI", "aldgbi_button", "GreyBox");
		?>
		var state_aldgbi_button = true;

		function aldgbi_button()
		{
			if (state_aldgbi_button) {
				var Option = prompt('Enter 1 to insert image, 2 for imageset, 3 for page, 4 for fullscreen page, 5 for pageset' ,'1');
				if ((!Option)||(isNaN(Option))||(Option>5)||(Option==0)) return false;
				var URL = prompt('Enter the URL of the Image / Page you want to display' ,'http://');
				if ((URL)&&(URL!='http://'))
				{
					tagStart = '<a href="' + URL + '"';
					
					var defaultTitle = prompt('Enter the title / caption','');
					if (defaultTitle) tagStart += ' title="' + defaultTitle + '"';
					if (!defaultTitle) tagStart += ' title="Brought to you by GreyBox Integrator WordPress Plugin"';

					if(Option==2) {	// Get imageset name
						var defaultImageSetName = prompt('Enter the name for the imageset' ,'nice_pics');
						if ((!defaultImageSetName)) defaultImageSetName = 'nice_pics';
					}
					
					if(Option==3) {	// Get width and height for page
						var defaultWidth = prompt('Enter the width for the page' ,'640');
						var defaultHeight = prompt('Enter the height for the page' ,'480');
						if ((!defaultWidth)||(isNaN(defaultWidth))) defaultWidth = 640;
						if ((!defaultHeight)||(isNaN(defaultHeight))) defaultHeight = 480;
					}
					
					if(Option==5) {	// Get pageset name
						var defaultPageSetName = prompt('Enter the name for the pageset' ,'nice_pages');
						if ((!defaultPageSetName)) defaultPageSetName = 'nice_pages';
					}
					
					if(Option==1) {
						tagStart += ' rel="gb_image[]"';
					}
					
					if(Option==2) {
						tagStart += ' rel="gb_imageset['+ defaultImageSetName +']"';
					}
					
					if(Option==3) {
						tagStart += ' rel="gb_page_center['+ defaultWidth +','+ defaultHeight +']"';
					}
					
					if(Option==4) {
						tagStart += ' rel="gb_page_fs[]"';
					}
					
					if(Option==5) {
						tagStart += ' rel="gb_pageset['+ defaultPageSetName +']"';
					}
					
					tagStart +='>';
					
					document.getElementById('ed_GBI').value = '/GBI';
					edInsertContent(edCanvas, tagStart);
					state_aldgbi_button = !state_aldgbi_button;
				}
			}
			else
			{
				document.getElementById('ed_GBI').value = 'GBI';
				edInsertContent(edCanvas, '</a>');
				state_aldgbi_button = !state_aldgbi_button;
			}
		}
		//--></script>
		<?php
	}
}

if(!function_exists('edit_insert_button'))
{
	//edit_insert_button: Inserts a button into the editor
	function edit_insert_button($caption, $js_onclick, $title = '')
	{
		?>
		if(toolbar)
		{
			var theButton = document.createElement('input');
			theButton.type = 'button';
			theButton.value = '<?php echo $caption; ?>';
			theButton.onclick = <?php echo $js_onclick; ?>;
			theButton.className = 'ed_button';
			theButton.title = "<?php echo $title; ?>";
			theButton.id = "<?php echo "ed_{$caption}"; ?>";
			toolbar.appendChild(theButton);
		}
		<?php
	}
}

add_filter('admin_footer', 'aldgbi_quicktag');
?>