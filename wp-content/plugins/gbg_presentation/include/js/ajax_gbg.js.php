<?php
header('Content-type: text/javascript');
include_once PLUGIN_DIR ."/include/core_presentation.php";
$search_handler = _get_ajax_handler_url();
//-------------------------------------------------------------------
?>
<script type="text/javascript">
jQuery(document).ready(main);
	function main()
	{
	// Listen for changes in our search field (<input id="s" >)
	jQuery('#continents li a').click( function()
	{
		var continent = jQuery(this).attr('class');
		jQuery.get("<?php print $search_handler; ?>", { id:continent
		}, write_results_to_page);
		
	});
	}
	
	function get_search_results()
	{
		var continent = jQuery(this).attr('class');
		jQuery.get("<?php print $search_handler; ?>", { id:continent
		}, write_results_to_page);

	}
	
	function write_results_to_page(data, status, xhr)
	{
		if (status == "error") {
			var msg = "Sorry but there was an error: ";
			console.error(msg + xhr.status + " " + xhr.statusText);
		}
		else
		{
			jQuery('#ajax_search_results_go_here').html(data);
		}
	}
</script>