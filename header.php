<!doctype html>
<html class="no-js" lang="en" ng-app>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css?v=2.0" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/translate.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inc/venobox/venobox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tecoverrides.css" type="text/css" media="screen" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
        <!-- Typekit Fonts -->
        <script src="https://use.typekit.net/fbv3sky.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        <!-- Modernizer -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>

    <script type="text/javascript">
      var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    

    
    <?php wp_head(); ?>

  </head>
  <body>


    <?php  get_template_part('nav-mobile' );?>


    <?php  get_template_part('nav-desktop' );?>

