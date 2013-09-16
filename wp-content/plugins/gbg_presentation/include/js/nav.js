// Extras

var browserType;
		if (document.layers) {browserType = "nn4"}
		if (document.all) {browserType = "ie"}
		if (window.navigator.userAgent.toLowerCase().match("gecko")) {
		 browserType= "gecko"
		}

//Main Nav

function Browser() {

  var ua, s, i;

  this.isIE    = false;  // Internet Explorer
  this.isNS    = false;  // Netscape
  this.version = null;

  ua = navigator.userAgent;

  s = "MSIE";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isIE = true;
    this.version = parseFloat(ua.substr(i + s.length));
    return;
  }

  s = "Netscape6/";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isNS = true;
    this.version = parseFloat(ua.substr(i + s.length));
    return;
  }

  // Treat any other "Gecko" browser as NS 6.1.

  s = "Gecko";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isNS = true;
    this.version = 6.1;
    return;
  }
}

var browser = new Browser();

// Show & Hide Submenys
function hide() {
  if (browserType == "gecko" )
     document.poppedLayer = 
         eval('document.getElementById("subs")');
  else if (browserType == "ie")
     document.poppedLayer = 
        eval('document.getElementById("subs")');
  else
     document.poppedLayer =   
        eval('document.layers["subs"]');
  document.poppedLayer.style.display = "none";
}

function show() {
  if (browserType == "gecko" )
     document.poppedLayer = 
         eval('document.getElementById("subs")');
  else if (browserType == "ie")
     document.poppedLayer = 
        eval('document.getElementById("subs")');
  else
     document.poppedLayer = 
         eval('document.layers["subs"]');
  document.poppedLayer.style.display = "block";
}

// Nav script

function removeClassName(el, name) {

  var i, curList, newList;

  if (el.className == null)
    return;

  // Remove the given class name from the element's className property.

  newList = new Array();
  curList = el.className.split(" ");
  for (i = 0; i < curList.length; i++)
    if (curList[i] != name)
      newList.push(curList[i]);
  el.className = newList.join(" ");
}

// Submenu links

var submenu=new Array()

submenu[0]='<ul><li><a class="first" href="/Stuff/">Stuff</a></li></ul>'

submenu[1]='<ul><li><a class="first" href="/php/">Information<br> about CW GBG</a></li><li><a href="index.php">Presentation<br> of Groups</a></li></ul>'


var menuobj=document.getElementById? document.getElementById("subs") : document.all


var activeButton = null;

function buttonClick(event, which) {

  var button;

  // Get the target button element.

  if (browser.isIE)
    button = window.event.srcElement;
  else
    button = event.currentTarget;
	
  // Blur focus from the link to remove that annoying outline.

  button.blur();

  // Reset the currently active button, if any.

  if (activeButton != null)
    resetButton(activeButton);

  // Activate this button, unless it was the currently active one

  if (button != activeButton) {
    depressButton(button);
    activeButton = button;
	thecontent=(which==-1)? "" : submenu[which]
  }
  
  else {
    activeButton = null;
	thecontent = ""
  }
	
  menuobj.innerHTML=thecontent

  return false;
}

function depressButton(button) {
button.className += "active";
show();
}

function resetButton(button) {
  removeClassName(button, "active");
  hide();
}

function resetSub(button) {
  menuobj.innerHTML=""
}



