// Custom Gallery Script by TCS
var $ =jQuery.noConflict(); 

$(document).ready(she_custom_gallery);

$(window).resize(she_custom_gallery);



function she_custom_gallery(){
	if( $( window ).width() < 1100){
		$(".tcs-gallery-img-wrapper").removeAttr( 'style' );
		$(".tcs-gallery-caption").removeAttr( 'style' );
		$(".tcs-gallery-img-wrapper").unbind( 'mouseenter' );
		$(".tcs-gallery-img-wrapper").unbind( 'mouseleave' );
		// $(".tcs-gallery-img-wrapper").each(function(){




		// });
	} else if( $( ".tcs-gallery-row-case" ).width() >= 1100){
		$(".tcs-gallery-row-case").each(function(){
			//$(this).children('.tcs-gallery-img-wrapper').css('width','500px');
			// Count Images
			var totalimgs = $(this).children('.tcs-gallery-img-wrapper').length;
			//var totalimgs = 9;
			// Determing Available Width
			var totalwidth = $( ".tcs-gallery-row-case" ).innerWidth();
            totalwidth -= 3;
			// Delete white border amount
			var maxwidth = totalwidth;
			//determine static width
			var galsstaticwidth = totalwidth / totalimgs;
			// Determine size for hovered img
	        // var maxpicwidth = $( window ).width() - ($( window ).width() * .25); //reasonable size for picture
	        // if (maxpicwidth < 600) { 
	        //   var galshoveredwidth = maxpicwidth; 
	        // }else{ 
	        //   var galshoveredwidth = 600; 
	        // };
	        var galshoveredwidth = 600; 
	        // Determine size for skinny images
	        var galsskinnywidth = (maxwidth - galshoveredwidth) / (totalimgs - 1);
	        var moveleft = ((galshoveredwidth - galsstaticwidth) / 2) * -1;
	       
	       // change all widths to static width
	        $(this).children('.tcs-gallery-img-wrapper').css('width',galsstaticwidth);
	       	// $(this).children('.tcs-gallery-img-wrapper > .tcs-gallery-img').css('width',galshoveredwidth);

	       	// $(this).children('.tcs-gallery-img-wrapper > .tcs-gallery-img').css('right',moveleft);




		    $(this).children('.tcs-gallery-img-wrapper').mouseenter(function(){

		      $(this).siblings().css('width',galsskinnywidth);   
		      $(this).width(galshoveredwidth);
		      $(this).children(".tcs-gallery-img").children(".tcs-gallery-caption").css("transform","translateY(-50px)");

		    });
		    $(this).children('.tcs-gallery-img-wrapper').mouseleave(function(){
			  $(this).css('width',galsstaticwidth);
		      $(this).siblings().css('width',galsstaticwidth);

		      $(this).children(".tcs-gallery-img").children(".tcs-gallery-caption").delay(5000).css("transform","translateY(50px)");
		    }); 

		});
	}
}