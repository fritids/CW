$(document).ready(function() {
// Products
senddata = function(segment){
		$("#loading-search").fadeIn();	 
		$.ajax({
		  url: "/wp-content/themes/connectingworld1/business-directory-ajax.php",
		  type: "POST",
		  dataType: "html",
		  data: {
			  level : 1,
			  segment : segment,
		  },
		  success: function(msg){	
		 	$("#categs").html(msg);
		 },
		 complete: function(){
		  	$("#loading-search").fadeOut();	 
		 }
		});
}

senddataCompany = function(segment, family, Classe){
		$("#loading-search").fadeIn();	 
		$.ajax({
		  url: "/wp-content/themes/connectingworld1/business-directory-ajax.php",
		  type: "POST",
		  data: {
			  level : 2,
			  segment: segment,
			  family: family,
			  'class': Classe
		  },
		  success: function(msg){	
		 	$("#categs").html(msg);
		 },
		 complete: function(){
		  	$("#loading-search").fadeOut();	 
		 }
		});
}

resultCompany = function(segment, family, Classe, egci){
		$("#loading-search").fadeIn();	 
		$.ajax({
		  url: "/wp-content/themes/connectingworld1/business-directory-ajax.php",
		  type: "POST",
		  data: {
			  level : 3,
			  segment: segment,
			  family: family,
			  'class': Classe,
			  egci: egci
		  },
		  success: function(msg){	
		 	$("#categs").html(msg);
		 },
		 complete: function(){
		  	$("#loading-search").fadeOut();	 
		 }
		});
}

});