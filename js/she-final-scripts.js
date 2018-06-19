(function($) {

  $(document).ready(function($){



      var isMobile = {
          Android: function() {
              return navigator.userAgent.match(/Android/i);
          },
          BlackBerry: function() {
              return navigator.userAgent.match(/BlackBerry/i);
          },
          iOS: function() {
              return navigator.userAgent.match(/iPhone|iPad|iPod/i);
          },
          Opera: function() {
              return navigator.userAgent.match(/Opera Mini/i);
          },
          Windows: function() {
              return navigator.userAgent.match(/IEMobile/i);
          },
          any: function() {
              return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
          }
      };



      if ($('.venobox').length > 0) {
         /* custom settings */
        $('.venobox').venobox({
            framewidth: '',        // default: ''
            frameheight: '',       // default: ''
            border: '0',             // default: '0'
            bgcolor: '#fff',         // default: '#fff'
            titleattr: 'title',    // default: 'title'
            numeratio: false,            // default: false
            infinigall: false            // default: false
        });
      } //End Venobox



      // Mobile Nav Click Functions
      $('.she-mobile-nav-link').click(function() {
        $('.she-mobile-nav-off').fadeIn(500);
      });
      $('.she-mobile-nav-close').click(function() {
        $('.she-mobile-nav-off').removeAttr( 'style' );
      });
      $('.she-mobile-nav-off').click(function() {
        $(this).removeAttr( 'style' );
      });


      // Search Buttom Overlay Click Functions
      $('.she-search-overlay-link').click(function() {
        $('.she-search-overlay-off').fadeIn(500);
      });
      $('.she-search-overlay-close').click(function() {
        $('.she-search-overlay-off').removeAttr( 'style' );
      });



      // Vimeo Overlay Click Functions
      $('.she-vimeo-overlay-link').click(function() {
        $('.she-vimeo-overlay-off').fadeIn(500);
      });
      $('.she-vimeo-overlay-close').click(function() {
        $('.she-vimeo-overlay-off').removeAttr( 'style' );
      });
      $('.she-vimeo-overlay-off').click(function() {
        $(this).removeAttr( 'style' );
      });


      // Intake Form Overlay Click Functions
      $('.she-intake-overlay-link').click(function() {
        $('.she-intake-overlay-off').fadeIn(500);
      });
      $('.she-intake-overlay-close').click(function() {
        $('.she-intake-overlay-off').removeAttr( 'style' );
      });




    $('.she-article-row').each(function(){
          // $('.she-article-row').click(function(){
          //      $('.art-toggle-body', this).slideToggle(500);
          // });

          $('.art-toggle-btn').click(function(){
               $(this).parents('.she-article-row').find('.art-toggle-body').slideDown(500);
                $(this).hide();
          });


      });



      $('a').click(function(){
        $('html, body').animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 500);

        return false;
      });

        if( !isMobile.any() ){
         // she_equalize();
        }
           //Equalizer for divs in row!
        function she_equalize(){
            $('.equalize-container').each(function(){


            var bigbrother = -1;
            var masterwidth = $('.equalize-container').width();

            if($('.equalize').width() != masterwidth){
              $('.equalize').each(function() {
                bigbrother = bigbrother > $('.equalize').height() ? bigbrother : $('.equalize').height();
              });

              $('.equalize').each(function() {
                $('.equalize').height(bigbrother);
              });

            }

          });
        }

        $(window).resize(she_re_equalize);

        function she_re_equalize(){
          $('.equalize').removeAttr( 'style' );
          she_equalize();
        }





   if( !isMobile.any() ){
        window.onload=function(){
          var s = skrollr.init();
        };
      }


  });

})( jQuery );
