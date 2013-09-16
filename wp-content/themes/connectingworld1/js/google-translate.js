$(document).ready(function(){      
	  $('body').css('height','900px');
		
			 $("input#reset").click(function() {
			$.cookie('destLang', null);
			location.reload();
			 });
			 function translateTo( destLang ){ //this can be declared in the global scope too if 											you need it somewhere else
             //translate from english to the selected language
			 $('body').translate( 'english', destLang, {   
               not: '.jq-translate-ui, #parts',  //by default the generated element has this className
               fromOriginal:true   //always translate from english (even after the page has been translated)
             });
         }

      $.translate(function(){  //when the Google Language API is loaded
         $.translate().ui('select','option')
           .appendTo('#google-translate')	//insert the element to the page
           .change(function(){   //when selecting another language   
             translateTo( $(this).val() );
             $.cookie('destLang', $(this).val(),{expires: 2});
             // set a cookie to remember the selected language
             return false; //prevent default browser action
          }
       )

			if	($.cookie('destLang')) {
				translateTo($.cookie('destLang'));
				$(".jq-translate-ui").val($.cookie('destLang'));
				}
			else {
			$(".jq-translate-ui").val("English");
			};
				

      }); //end of Google Language API loaded
   });