 jQuery(function($) {
      function menutoggleinnerhide() {
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        $(".menu-toggle-body-bar").slideUp(300);
        $(".menu-toggle-body-about").hide();
        $(".menu-toggle-body-programs").hide();
        $(".menu-toggle-body-getinvolved").hide();
        $(".menu-toggle-body-newsandmulti").hide();
        $(".she-navbar-fixed-body-bar").slideUp(300);
        // $(".she-navbar-fixed").delay(300).css("border-bottom","solid 1px #ddd");
          }

      $(document).ready(function(){
      $(".menu-toggle-btn-aboutus").mouseenter(function(){
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        $(".menu-toggle-btn-aboutus").css("border-bottom","solid 2px #2185c7");
        $(".menu-toggle-body-getinvolved").hide();
        $(".menu-toggle-body-newsandmulti").hide();
        $(".menu-toggle-body-programs").hide();
        $(".menu-toggle-body-aboutus").show();
        $(".she-navbar-fixed-body-bar").slideDown(300);
        // $(".she-navbar-fixed").css("border-bottom","0px");
        $(".menu-toggle-body-bar").show();
          });


      $(".menu-toggle-btn-programs").mouseenter(function(){
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        $(".menu-toggle-btn-programs").css("border-bottom","solid 2px #2185c7");
        $(".menu-toggle-body-newsandmulti").hide();
        $(".menu-toggle-body-aboutus").hide();
        $(".menu-toggle-body-getinvolved").hide();
        $(".menu-toggle-body-programs").show();
        $(".she-navbar-fixed-body-bar").slideDown(300);
        // $(".she-navbar-fixed").css("border-bottom","0px");
        $(".menu-toggle-body-bar").show();
          });


      $(".menu-toggle-btn-getinvolved").mouseenter(function(){
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        $(".menu-toggle-btn-getinvolved").css("border-bottom","solid 2px #2185c7");
        $(".menu-toggle-body-aboutus").hide();
        $(".menu-toggle-body-programs").hide();
        $(".menu-toggle-body-newsandmulti").hide();
        $(".menu-toggle-body-getinvolved").show();
        $(".she-navbar-fixed-body-bar").slideDown(300);
        // $(".she-navbar-fixed").css("border-bottom","0px");
        $(".menu-toggle-body-bar").show();
          });


      $(".menu-toggle-btn-newsandmulti").mouseenter(function(){
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        $(".menu-toggle-btn-newsandmulti").css("border-bottom","solid 2px #2185c7");
        $(".menu-toggle-body-aboutus").hide();
        $(".menu-toggle-body-programs").hide();
        $(".menu-toggle-body-getinvolved").hide();
        $(".menu-toggle-body-newsandmulti").show();
        $(".she-navbar-fixed-body-bar").slideDown(300);
        // $(".she-navbar-fixed").css("border-bottom","0px");
        $(".menu-toggle-body-bar").show();
          });


      $(".menu-toggle-btn-contactus").mouseenter(function(){
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        $(".menu-toggle-btn-contactus").css("border-bottom","solid 2px #2185c7");
        $(".menu-toggle-body-bar").slideUp(300);
        $(".menu-toggle-body-about").hide();
        $(".menu-toggle-body-programs").hide();
        $(".menu-toggle-body-getinvolved").hide();
        $(".menu-toggle-body-newsandmulti").hide();
        $(".she-navbar-fixed-body-bar").slideUp(300);
        // $(".she-navbar-fixed").delay(300).css("border-bottom","solid 1px #ddd");
          });

      $(".menu-toggle-btn-donate").mouseenter(function(){
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        $(".menu-toggle-btn-donate").css("border-bottom","solid 2px #2185c7");
        $(".menu-toggle-body-bar").slideUp(300);
        $(".menu-toggle-body-about").hide();
        $(".menu-toggle-body-programs").hide();
        $(".menu-toggle-body-getinvolved").hide();
        $(".menu-toggle-body-newsandmulti").hide();
        $(".she-navbar-fixed-body-bar").slideUp(300);
        // $(".she-navbar-fixed").delay(300).css("border-bottom","solid 1px #ddd");
          });


      $(".menu-toggle-btn-facebook").mouseenter(function(){
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        // $(".menu-toggle-btn-facebook").css("border-bottom","solid 2px #2185c7");
        $(".menu-toggle-body-bar").slideUp(300);
        $(".menu-toggle-body-about").hide();
        $(".menu-toggle-body-programs").hide();
        $(".menu-toggle-body-getinvolved").hide();
        $(".menu-toggle-body-newsandmulti").hide();
        $(".she-navbar-fixed-body-bar").slideUp(300);
        // $(".she-navbar-fixed").delay(300).css("border-bottom","solid 1px #ddd");
          });

      $(".menu-toggle-btn-linkdin").mouseenter(function(){
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        // $(".menu-toggle-btn-linkdin").css("border-bottom","solid 2px #2185c7");
        $(".menu-toggle-body-bar").slideUp(300);
        $(".menu-toggle-body-about").hide();
        $(".menu-toggle-body-programs").hide();
        $(".menu-toggle-body-getinvolved").hide();
        $(".menu-toggle-body-newsandmulti").hide();
        $(".she-navbar-fixed-body-bar").slideUp(300);
        // $(".she-navbar-fixed").delay(300).css("border-bottom","solid 1px #ddd");
          });
      $(".menu-toggle-btn-search").mouseenter(function(){
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        // $(".menu-toggle-btn-linkdin").css("border-bottom","solid 2px #2185c7");
        $(".menu-toggle-body-bar").slideUp(300);
        $(".menu-toggle-body-about").hide();
        $(".menu-toggle-body-programs").hide();
        $(".menu-toggle-body-getinvolved").hide();
        $(".menu-toggle-body-newsandmulti").hide();
        $(".she-navbar-fixed-body-bar").slideUp(300);
        // $(".she-navbar-fixed").delay(300).css("border-bottom","solid 1px #ddd");
          });
      $(".menu-toggle-btn-home").mouseenter(function(){
        $(".menu-toggle-btn-reset").css("border-bottom","solid 2px transparent");
        $(".menu-toggle-btn-home").css("border-bottom","solid 2px #2185c7");
        $(".menu-toggle-body-bar").slideUp(300);
        $(".menu-toggle-body-about").hide();
        $(".menu-toggle-body-programs").hide();
        $(".menu-toggle-body-getinvolved").hide();
        $(".menu-toggle-body-newsandmulti").hide();
        $(".she-navbar-fixed-body-bar").slideUp(300);
        // $(".she-navbar-fixed").delay(300).css("border-bottom","solid 1px #ddd");
          });


      $(".menu-toggle-body-main").mouseleave(menutoggleinnerhide);
      });


          var lastScrollTop = 0;
        $(window).scroll(function(event){
           var st = $(this).scrollTop();
           if (st < 45 ){
              $(".menu-toggle-scroll").show();
              $(".menu-toggle-body-bar").hide();
           }
           else if (st > lastScrollTop){
               $(".menu-toggle-scroll").css("top","-90px");
           } else {
              $(".menu-toggle-scroll").css("top","0px");
              $(".menu-toggle-body-bar").hide();
           }
           lastScrollTop = st;
        });
});
