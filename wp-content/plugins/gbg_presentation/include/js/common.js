//constant
var ROOT_URL = "/";



//no edit below this line
//--------------------------------------------------

window.onerror = errHandler;

function errHandler(sMsg, sUrl, sLine)
{
	var sSave = sMsg + ' \n ' + sUrl + ' \n ' +  sLine;
	window.status=sSave
	return true;
}




//specific functions:-----------------------------------------------------------------------

var DATASENT=false;

function SendOnce(){ 
	if(DATASENT==false){
		DATASENT=true;
		return true;		
	}else{
		return false;	
	}	
}



function addBookmark(){
	if(document.all) {
		window.external.AddFavorite('http://www.mingel.net','www.mingel.net')
	}
	else{
		alert('fungerar endast i Internet Explorer')
	}
}


function zoomPic(uid){
	var pic = window.open(ROOT_URL + "scripts/picZoom.php?uid=" + uid, "pic_win", "width=80,height=100,scrollbars=no,locationbar=no,menubar=no,personalbar=no,resizable=1,toolbar=no,status=no,screenX=100,screenY=100,top=100,left=100");
	pic.focus();
}


//------------- cookie funcs
	
function getCookieVal (offset) {
  var endstr = document.cookie.indexOf (";", offset);
  if (endstr == -1)
    endstr = document.cookie.length;
  return unescape(document.cookie.substring(offset, endstr));
}


function FixCookieDate (date) {
  var base = new Date(0);
  var skew = base.getTime(); // dawn of (Unix) time - should be 0
  if (skew > 0)  // Except on the Mac - ahead of its time
    date.setTime (date.getTime() - skew);
}


function GetCookie (name) {
  //if (name=='CookieUid') return 6654;
  var arg = name + "=";
  var alen = arg.length;
  var clen = document.cookie.length;
  var i = 0;
  while (i < clen) {
    var j = i + alen;
    if (document.cookie.substring(i, j) == arg)
      return getCookieVal (j);
    i = document.cookie.indexOf(" ", i) + 1;
    if (i == 0) break; 
  }
  return null;
}

function SetCookie (name,value,expires,path,domain,secure) {
  document.cookie = name + "=" + escape (value) +
    ((expires) ? "; expires=" + expires.toGMTString() : "") +
    ((path) ? "; path=" + path : "") +
    ((domain) ? "; domain=" + domain : "") +
    ((secure) ? "; secure" : "");
}


function DeleteCookie (name,path,domain) {
  if (GetCookie(name)) {
    document.cookie = name + "=" +
      ((path) ? "; path=" + path : "") +
      ((domain) ? "; domain=" + domain : "") +
      "; expires=Thu, 01-Jan-70 00:00:01 GMT";
  }
}