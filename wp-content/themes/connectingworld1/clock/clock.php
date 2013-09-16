<script language="javascript" type="text/javascript">
$(document).ready(function(){
	yui.Event.addListener(window, "load",showMeThisCoolDHTMLWidgetStuffOK);

	function showMeThisCoolDHTMLWidgetStuffOK()
	{
		var top = $("#mougala").position().top;
		var left = $("#mougala").position().left;
		
		var wowClock1 = new ygClock(left, top,"<?php bloginfo('template_directory'); ?>/clock/img/clock_blue.png","<?php bloginfo('template_directory'); ?>/clock/img/clock_blue_dot.png","<?php bloginfo('template_directory'); ?>/clock/img/hourhand.png","<?php bloginfo('template_directory'); ?>/clock/img/minhand.png","<?php bloginfo('template_directory'); ?>/clock/img/sechand.png",-7,-7);
	};

});
</script>           
<div id="clock-widget" style="width: 100px; height: 100px;margin-left:15px">  
</div>
<p style="margin-top:2px; margin-left:10px; font-size: 12px; font-weight:bold; font-family: arial; color: rgb(0, 56, 130); text-align:center">
CW World time<br />
choose zone<br />
with a click<br />
</p>