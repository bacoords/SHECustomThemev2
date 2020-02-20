<?php
// add_theme_support('menus');
 


 // register_nav_menu( 'aboutus', 'About Us' );
 // register_nav_menu( 'programs', 'Programs' );
 // register_nav_menu( 'newsandmulti', 'News and Multimedia' );
 // register_nav_menu( 'getinvolved', 'Get Involved' );
 // register_nav_menu( 'contactus', 'Contact Us' );

/** *********************************************************************************
 * Menu (What We Do) top bar
 * *********************************************************************************/
function foundation_top_bar_aboutus() {
    $aboutid = of_get_option('menu_about');

    ?>

        <ul class="inline-list">
    <?php
    $mypages = get_pages( array( 'child_of' => $aboutid, 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent'=>$aboutid, 'exclude'=>289 ) );
    foreach( $mypages as $page ) {            
    ?>
            <li><a href="<?php echo get_site_url(); ?>/about-us/#<?php echo $page->post_name; ?>"><?php echo $page->post_title; ?></a></li>
    <?php
    } 
    ?> 
        </ul> 
    <?php  
}
function foundation_top_bar_programs() {
 $programsid = of_get_option('menu_program');
    ?>
        <ul class="inline-list">
    <?php
    $mypages = get_pages( array( 'child_of' =>  $programsid, 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent'=> $programsid ) );
    foreach( $mypages as $page ) {            
    ?>
            <li><a href="<?php echo get_permalink( $page->ID ); ?>"><?php echo $page->post_title; ?></a></li>
    <?php
    } 
    ?> 
        </ul> 
    <?php  

}
function foundation_top_bar_newsandmulti() {
     $namid = of_get_option('menu_news');
    ?>
        <ul class="inline-list">
            <li><a href="<?php echo get_site_url(); ?>/blog/">Blog</a></li>
            <li><a href="<?php echo get_site_url(); ?>/media-coverage/">Press</a></li>
            <li><a href="<?php echo get_site_url(); ?>/newsletters/">Newsletters</a></li>
            <li><a href="<?php echo get_site_url(); ?>/annual-reports/">Annual Reports</a></li>
            <li><a href="<?php echo get_site_url(); ?>/photo-gallery/">Photo Galleries</a></li>
    <?php
    $mypages = get_pages( array( 'child_of' => $namid, 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent'=>$namid ) );
    foreach( $mypages as $page ) {            
    ?>
            <li><a href="<?php echo get_permalink( $page->ID ); ?>"><?php echo $page->post_title; ?></a></li>
    <?php
    } 
    ?> 
        </ul> 
    <?php  
}
function foundation_top_bar_getinvolved() {
    $getid = of_get_option('menu_getinvolved');
    ?>
        <ul class="inline-list">
    <?php
    $mypages = get_pages( array( 'child_of' => $getid, 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent'=>$getid ) );
    foreach( $mypages as $page ) {            
    ?>
            <li><a href="<?php echo get_site_url(); ?>/get-involved/#<?php echo $page->post_name; ?>"><?php echo $page->post_title; ?></a></li>
    <?php
    } 
    ?> 
		<li><a href="<?php echo get_site_url( 'events' ); ?>">Events</a></li>
        </ul> 
    <?php  
}
function foundation_top_bar_contactus() {
     $contactid = of_get_option('menu_contact');
    ?>
        <ul class="inline-list">
    <?php
    $mypages = get_pages( array( 'child_of' => $contactid, 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent'=>$contactid ) );
    foreach( $mypages as $page ) {            
    ?>
            <li><a href="<?php echo get_site_url(); ?>/contact-us/#<?php echo $page->post_name; ?>"><?php echo $page->post_title; ?></a></li>
    <?php
    } 
    ?> 
        </ul> 
    <?php  
} ?>