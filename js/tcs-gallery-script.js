

      // Custom Gallery Script by TCS
      $(document).ready(she_custom_gallery);

      $(window).resize(she_custom_gallery);

      function she_custom_gallery(){
      
         var counter = 1;
         var galleryid = "#gallery-" + counter;
         var galleryitemclass = "gallery-item-" + counter;
         var galleryiconclass = "gallery-icon-" + counter;

        do{
            $(galleryid + " > .gallery-item").addClass(galleryitemclass);
            $(galleryid + " > .gallery-item > .gallery-icon").addClass(galleryiconclass);


          $(galleryid + " > .gallery-item > .gallery-icon > a").addClass("venobox");
          $(galleryid + " > .gallery-item > .gallery-icon > a").attr('data-gall', 'myGallery');
          $(galleryid + " > .gallery-item > .gallery-icon > a").attr('data-overlay', '#0079c2');
            var galleryitemclass = ".gallery-item-" + counter;
            var galleryiconclass = ".gallery-icon-" + counter;
          // determine screen size realted variables
            var totalgals = $(galleryitemclass).length;
            var totalwidth = $(galleryid).width();


          // declare constants

            var maxwidth = totalwidth - (3 * totalgals); //compsensate for white border
            var galsstaticwidth = maxwidth / totalgals;
            var maxpicwidth = $( window ).width() - ($( window ).width() * .25); //reasonable size for picture
            if (maxpicwidth < 600) { 
              var galshoveredwidth = maxpicwidth; 
            }else{ 
              var galshoveredwidth = 600; 
            };
            
            var galsskinnywidth = (maxwidth - galshoveredwidth) / (totalgals - 1);
            var moveleft = ((galshoveredwidth - galsstaticwidth) / 2) * -1;
            




           // change all widths to static width
            $(galleryitemclass).css('width',galsstaticwidth);
            $(galleryiconclass).css('width',galshoveredwidth);
            // $(".gallery-item > dt").css('left',moveleft);

            $( galleryitemclass).each(function(){
              var imgSrc = $("dt > a > img", this).attr("src");
              var imgSrc = "url('" + imgSrc + "')";
              $("dt > a > img").css("height","500px");
              $("dt > a > img").css("opacity","0");
               // $("dt > a > img").css("opacity","0.5");
              $(this).css({
                "background-image":imgSrc,
                "background-color":"#000",
                "background-size":"cover",
                "background-position":"center",
                "background-repeat":"no-repeat",
              });
              delete imgSrc;
            });


          //Hover functions
            $( galleryitemclass).mouseenter(function(){
              $(".gallery-item").css('width',galsskinnywidth);
              
              $(this).width(galshoveredwidth);
              $(this).find(".gallery-caption").css("transform","translateY(-50px)");
            });
            $( galleryitemclass).mouseleave(function(){
              $(".gallery-item").css('width',galsstaticwidth);
             $(".gallery-caption").css("transform","translateY(50px)");
            });   
          




              counter += 1;
             var galleryid = "#gallery-" + counter;
             var galleryitemclass = "gallery-item-" + counter;
             var galleryiconclass = "gallery-icon-" + counter;

        }
        while ($(galleryid).length > 0)
     // // determine screen size realted variables
     //        var totalgals = $('.gallery-item').length;
     //        var totalwidth = $('.gallery').width();


     //      // declare constants

     //        var maxwidth = totalwidth - (3 * totalgals); //compsensate for white border
     //        var galsstaticwidth = maxwidth / totalgals;
     //        var maxpicwidth = $( window ).width() - ($( window ).width() * .25); //reasonable size for picture
     //        if (maxpicwidth < 600) { 
     //          var galshoveredwidth = maxpicwidth; 
     //        }else{ 
     //          var galshoveredwidth = 600; 
     //        };
            
     //        var galsskinnywidth = (maxwidth - galshoveredwidth) / (totalgals - 1);
     //        var moveleft = ((galshoveredwidth - galsstaticwidth) / 2) * -1;
            
          

     //      // change all widths to static width
     //        $(".gallery-item").css('width',galsstaticwidth);
     //        $(".gallery-icon").css('width',galshoveredwidth);
     //        // $(".gallery-item > dt").css('left',moveleft);

     //        $(".gallery-item").each(function(){
     //          var imgSrc = $("dt > a > img", this).attr("src");
     //          var imgSrc = "url('" + imgSrc + "')";
     //          $("dt > a > img").css("height","500px");
     //          $("dt > a > img").css("opacity","0");
     //           // $("dt > a > img").css("opacity","0.5");
     //          $(this).css({
     //            "background-image":imgSrc,
     //            "background-color":"#000",
     //            "background-size":"cover",
     //            "background-position":"center",
     //            "background-repeat":"no-repeat",
     //          });
     //          delete imgSrc;
     //        });


     //      //Hover functions
     //        $(".gallery-item").mouseenter(function(){
     //          $(".gallery-item").css('width',galsskinnywidth);
     //         $(this).width(galshoveredwidth);
     //        });
     //        $(".gallery-item").mouseleave(function(){
     //          $(".gallery-item").css('width',galsstaticwidth);
     //        });   
          

          

          
        }
          

          
      // End Custom Gallery Script by TCS