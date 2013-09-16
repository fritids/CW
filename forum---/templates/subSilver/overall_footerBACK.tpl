
<div align="center"><span class="copyright"><br />{ADMIN_LINK}<br />
<!--
	We request you retain the full copyright notice below including the link to www.phpbb.com.
	This not only gives respect to the large amount of time given freely by the developers
	but also helps build interest, traffic and use of phpBB 2.0. If you cannot (for good
	reason) retain the full copyright we request you at least leave in place the
	Powered by phpBB line, with phpBB linked to www.phpbb.com. If you refuse
	to include even this then support on our forums may be affected.

	The phpBB Group : 2002
// -->
Powered by <a href="http://www.phpbb.com/" target="_phpbb" class="copyright">phpBB</a> &copy; 2001, 2005 phpBB Group<br />{TRANSLATION_INFO}</span></div>
		</td>
	</tr>
</table>

	<div id="footer">
		<hr>
		<span style="font-size:11px"> &copy; 2007, CW.com, Inc. </span>

	</div>
	</div>





<div  style="z-index:97;position:absolute;top:170px;left:822px;">


<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="/include/AC_RunActiveContent.js" language="javascript"></script>


<script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0',
			'width', '120',
			'height', '600',
			'src', '/info/banner_eng_ny',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'banner_eng',
			'bgcolor', '#ffffff',
			'name', 'banner_eng',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', '/info/banner_eng_ny',
			'salign', ''
			); //end AC code
	}
</script>
<noscript>
<object id=DivFla
 classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="120" height="600" id="banner_eng" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="/info/banner_eng_ny.swf" />
	<param name="quality" value="high" />
	<param name="bgcolor" value="#ffffff" />	
	<a href="/"><embed src="/info/banner_eng_ny.swf" quality="high" bgcolor="#ffffff" width="120" height="600" name="banner_eng" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></a>
	</object>
</noscript>







</div>

<div  style="z-index:96;position:absolute;top:169px;left:821px;width:120px;height:600px;border:1px solid gray">

</div>

<script type="text/javascript" src="/include/event_1.0.1.js" ></script>
<script type="text/javascript" src="/include/clock.js" ></script>
<script>

yui.Event.addListener(window, "load",showMeThisCoolDHTMLWidgetStuffOK);

function findPos(obj) {
	var curleft = curtop = 0;
	if (obj.offsetParent) {
		curleft = obj.offsetLeft
		curtop = obj.offsetTop
		while (obj = obj.offsetParent) {
			curleft += obj.offsetLeft
			curtop += obj.offsetTop
		}
	}
	return [curleft,curtop];
}


function showMeThisCoolDHTMLWidgetStuffOK()
{
	//if(!document.all) return;
	//var pos = findPos(document.getElementById("Regit"));
	pleft = 830; //pos[0] + 140 ;
	ptop =  20;//pos[1] - 0 ;
	document.getElementById("clocktext").style.top=ptop +100 + "px";
	document.getElementById("clocktext").style.left=840 +"px";
	document.getElementById("clocktext").style.display="block";
	var wowClock1 = new //ygClock(pleft,ptop,"images/clock.png",cw-clock_maskK&L.png ::: cw-clock.png cw_clock-dot2 "images/clock_mask.png","images/hourhand.png","images/minhand.png","images/sechand.png",-7,-7);
	ygClock(pleft,ptop,"/images/clock_blue.png","/images/clock_blue_dot.png","/images/hourhand.png", "/images/minhand.png","/images/sechand.png",-7,-7);
};
function openit(){
	
	var w=window.open("/info/cwmovie_popup.php","bnr", "width=650,height=535,scrollbars=yes,locationbar=no,menubar=no,personalbar=no,resizable=1,toolbar=no,status=no,screenX=100,screenY=100,top=100,left=100");
	w.focus();
}


</script>
<script>
function popUp1(){
	
	var w=window.open("../info/banner_popup_en.php","bnr", "width=800,height=600,scrollbars=yes,locationbar=no,menubar=no,personalbar=no,resizable=1,toolbar=no,status=no,screenX=100,screenY=100,top=100,left=100");
	w.focus();
}

</script>
<script type="text/javascript" src="/include/yahoo-dom-event.js" ></script>   
<script type="text/javascript" src="/include/dragdrop-min.js" ></script>  
<script> var dd1 = new YAHOO.util.DDProxy("cmenu"); </script>

<div id=clocktext style="position:absolute;dissplay:none;text-align:center"><b style="font-size:10px;font-family:arial;color:#003882">CW World time<br>choose zone<br> with a click</b></div>



</body>
</html>
