<?php
/*
Author: Three Cords Studio
URL: http://www.threecordsstudio.com/
*/


//Disable view of Admin bar on front end
show_admin_bar( false );

//Remove unnecessary admin pages
function remove_menus(){
  remove_submenu_page( 'themes.php', 'customize.php', 'theme-editor.php' );
}
add_action( 'admin_menu', 'remove_menus' );

//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function example_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'tcs_dashboard_widget',         // Widget slug.
                 'BrianCoords.com - Support',         // Title.
                 'example_dashboard_widget_function' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'example_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function example_dashboard_widget_function() {

	// Display whatever it is you want to show.
	echo "<h3><a href='https://www.briancoords.com' target='_blank'>BrianCoords.com</a></h3><p><a href='mailto:bacoords@gmail.com'>bacoords@gmail.com</a></p><p>951-314-4449</p>";
}

//Enable Post Thumbnails (Featured Images)
add_theme_support('post-thumbnails');
add_image_size( 'she-circular-image', 300, 200, array( 'center', 'center' )  ); 
add_image_size( 'gallery-image', 600, 300, array( 'center', 'center' )  ); 
// Make Images NOT Clickable by Default
update_option('image_default_link_type','none');
// Remove formatting of gallery
add_filter( 'use_default_gallery_style', '__return_false' );
//Adds gallery shortcode defaults of size="medium" and columns="3" 
function she_change_default_gallery( $out, $pairs, $atts ) {
   
    $atts = shortcode_atts( array(
        'columns' => '3',
        'link' => 'file',
        'size' => 'medium',
         ), $atts );

    $out['columns'] = $atts['columns'];
    $out['size'] = $atts['size'];

    return $out;

}
add_filter( 'shortcode_atts_gallery', 'she_change_default_gallery', 10, 3 );




//
// Custom Login Page Logo
//
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/SHELogo50Resize.jpg);
            background-size:300px 350px;
            width: 300px; 
            height: 350px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Self Help Enterprises';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );







// Add SHE Color to TINY MCE Color Picker
function my_mce4_options( $init ) {
$default_colours = '
    "000000", "Black",        "993300", "Burnt orange", "333300", "Dark olive",   "003300", "Dark green",   "003366", "Dark azure",   "000080", "Navy Blue",      "333399", "Indigo",       "333333", "Very dark gray", 
    "800000", "Maroon",       "FF6600", "Orange",       "808000", "Olive",        "008000", "Green",        "008080", "Teal",         "0000FF", "Blue",           "666699", "Grayish blue", "808080", "Gray", 
    "FF0000", "Red",          "FF9900", "Amber",        "99CC00", "Yellow green", "339966", "Sea green",    "33CCCC", "Turquoise",    "3366FF", "Royal blue",     "800080", "Purple",       "999999", "Medium gray", 
    "FF00FF", "Magenta",      "FFCC00", "Gold",         "FFFF00", "Yellow",       "00FF00", "Lime",         "00FFFF", "Aqua",         "00CCFF", "Sky blue",       "993366", "Brown",        "C0C0C0", "Silver", 
    "FF99CC", "Pink",         "FFCC99", "Peach",        "FFFF99", "Light yellow", "CCFFCC", "Pale green",   "CCFFFF", "Pale cyan",    "99CCFF", "Light sky blue", "CC99FF", "Plum",         "FFFFFF", "White"
';
$custom_colours = '
    "2185c7", "SHE Blue", 
';
$init['textcolor_map'] = '['.$custom_colours.']'; // build colour grid default+custom colors
$init['textcolor_rows'] = 6; // enable 6th row for custom colours in grid
return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');
// $default_colours.','.



//Custom Theme Attributes
$custom_background_defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => '',
	'default-position-x'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $custom_background_defaults );

// Changes to Post Excerpts
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );
// Variable & intelligent excerpt length.
function print_excerpt($length) { // Max excerpt length. Length is set in characters
    global $post;
    $text = $post->post_excerpt;
    if ( '' == $text ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    }
    $text = strip_shortcodes($text); // optional, recommended
    $text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags

    $text = substr($text,0,$length);
    $excerpt = reverse_strrchr($text, '.', 1);
    if( $excerpt ) {
        echo apply_filters('the_excerpt',$excerpt);
    } else {
        echo apply_filters('the_excerpt',$text);
    }
}

// Returns the portion of haystack which goes until the last occurrence of needle
function reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}



// Include File to Disable Comments
require_once('inc/functions-disable-comments.php');


// 
// Enqueue Scripts
// 


/**
 * Proper way to enqueue scripts and styles
 */
//function theme_scripts() {
//	wp_enqueue_script( 'script-name-1', get_template_directory_uri() . '/js/tcs-galleries-v2.js', array('jquery'), null, true);
//     wp_enqueue_script( 'script-name-2', get_template_directory_uri() . '/inc/venobox/venobox.min.js', array('jquery'), null, true);
//      wp_enqueue_script( 'script-name-3', get_template_directory_uri() . '/js/top-menu-scroll.js', array('jquery'), null, true);
//      wp_enqueue_script( 'script-name-4', get_template_directory_uri() . '/js/skrollr.min.js', array('jquery'), null, true);
//       wp_enqueue_script( 'script-name-5', get_template_directory_uri() . '/js/she-final-scripts.js', array('jquery'), null, true);
//}
//
//add_action( 'wp_enqueue_scripts', 'theme_scripts' );

    //she_call_property_rc_slider_script(); 
// she_call_property_slider_script();  
  // she_call_smooth_scroll_script();
 // she_call_blog_slider_script(); 


// function custom_shortcode_scripts() {


//     global $post;
//     if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'gallery') ) {
//         wp_enqueue_script('Custom Gallery Script', get_template_directory_uri() . '/js/tcs-gallery-script.js', array(), '1.0.0', true );
//     }



// }
// add_action( 'wp_enqueue_scripts', 'custom_shortcode_scripts');

// function custom_template_scripts() {
//     if ( is_page_template( 'single-she_property.php' ) ) {
//        wp_enqueue_script('Custom Gallery Script', get_template_directory_uri() . '/js/tcs-gallery-script.js', array(), '1.0.0', true );
//     } 
// }
// add_action('wp_enqueue_scripts','custom_template_scripts' );


// 
// Widgetize
// 

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name' => 'Blogs Sidebar',
        'id' => 'widget_right_1',
        'before_widget' => '<div class="blog-blurb box-padding box-padding-vert">',
        'after_widget' => '</div><BR><BR><BR>',
        'before_title' => '<h3><strong>',
        'after_title' => '</strong></h3><BR><BR>',
    ) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );






//  *********************************************************************************
// Custom Post Type - Property
//  *********************************************************************************
// Creates the custom post type
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'she_property',
		array(
			'labels' => array(
				'name' => __( 'Properties' ),
				'singular_name' => __( 'Property' ),
				'add_new_item'  => __( 'Add New Property' ),
				'new_item'       => __( 'New Property' ),
				'edit_item'          => __( 'Edit Property' ),
				'view_item'          => __( 'View Property' ),
				'all_items'          => __( 'All Properties' )

			),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-location-alt',
		'supports' => array(
				'title', 'editor', 'thumbnail', 'revisions',
				),
		'rewrite' => array('slug' => 'properties'),

		)
	);
}
//Creates a custom taxonomy so they can have own set of Categories
function SHE_property_taxonomy_init() {
	// create a new taxonomy
	register_taxonomy(
		'property_type',
		'she_property',
		array(
			'label' => __( 'Property Categories' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'SHE_property_taxonomy_init' );
register_taxonomy_for_object_type('property_type','she_property');


//Removes the ability to create a custom slug
add_action( 'add_meta_boxes', 'SHE_Property_add_meta_boxes' );
function SHE_Property_add_meta_boxes() {
    remove_meta_box( 'slugdiv', 'she_property', 'normal' );
}


//Create Metaboxes via github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
function she_property_metaboxes( $meta_boxes ) {
    $prefix = '_she_property_'; // Prefix for all fields
    $meta_boxes['she_property_address_metabox'] = array(
        'id' => 'she_property_address_metabox',
        'title' => 'Address Information',
        'pages' => array('she_property'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Address',
                'desc' => 'Number and Street',
                'id' => $prefix . 'address',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'City',
                'desc' => 'City',
                'id' => $prefix . 'city',
                'type' => 'text_small'
            ),
            array(
                'name' => 'State',
                'desc' => 'State',
                'default' => 'CA',
                'id' => $prefix . 'state',
                'type' => 'text_small'
            ),
            array(
                'name' => 'Zip Code',
                'desc' => 'Zip Code',
                'id' => $prefix . 'zip',
                'type' => 'text_small'
            ),
            array(
                'name' => 'Custom Google Maps Link',
                'desc' => 'Enter a Custom Google Maps Link here to override the default. (must start with http://)',
                'id' => $prefix . 'custom_gmap',
                'type' => 'text'
            ),
        ),
    );
	$meta_boxes['she_property_contact_metabox'] = array(
        'id' => 'she_property_contact_metabox',
        'title' => 'Contact Information',
        'pages' => array('she_property'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Phone Number',
                'desc' => 'Contact Phone Number',
                'id' => $prefix . 'phone',
                'type' => 'text_small'
            ),
            array(
                'name' => 'Email Address',
                'desc' => 'sample@email.com',
                'id' => $prefix . 'email',
                'type' => 'text_email'
            ),
            array(
                'name' => 'Number of Units/Tagline',
                'desc' => 'Total Number of Units',
                'id' => $prefix . 'total_units',
                'type' => 'text'
            ),
        ),
    );
    $meta_boxes['she_property_pdf_metabox'] = array(
        'id' => 'she_property_pdf_metabox',
        'title' => 'PDF Info Sheet',
        'pages' => array('she_property'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
        array(
            'name' => 'PDF Info Sheet',
            'desc' => 'Attach PDF Info Sheet Here.',
            'id' => $prefix . 'pdf',
            'type' => 'file',
            // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        ),
        ),
    );

	$meta_boxes['she_property_images_metabox'] = array(
        'id' => 'she_property_images_metabox',
        'title' => 'Image Gallery',
        'pages' => array('she_property'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
		array(
		    'name' => 'Image Gallery',
		    'desc' => 'Select Images for the Image Gallery',
		    'id' => $prefix . 'image_gallery',
		    'type' => 'file_list',
		    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		),
        ),
    );



    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'she_property_metaboxes' );



// Add shortcode
function she_sc_display_props( $atts, $content = null ) {
       $args = array(
        'posts_per_page'   => 25,
        'offset'           => 0,
        'category'         => '',
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'she_property',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    global $press;
    ob_start();
    foreach ($articles_array as $press ) {
        $current_art =  $press->ID;
        $current_content = $press->post_content;
        $current_title = $press->post_title;
        $current_excerpt = $press->post_excerpt;
        $current_art_slug = $press->post_name;
        $current_pdf = get_post_meta($press->ID, '_she_newsletter_news_pdf',TRUE); 
        // setup_postdata($press);

        ?>        
            

                <div class="row">
                   
                   
                        
                        <h3><strong><?php echo $current_title; ?></strong></h3>
                       
                    <?php echo $current_content; ?>
                      
                    <div class="text-right">
                        <a href="<?php echo $current_pdf; ?>" class="she-blue-ghost-btn text-right" target="new">READ</a>
                    </div>
                </div>
                <div class="row">
                    <br>
                </div>
            

        <?php
         
    }
    // wp_reset_postdata(); 
    return ob_get_clean();


}
add_shortcode( 'DisplayNewslettersLoop', 'she_sc_display_news' );



















//  *********************************************************************************
// Custom Post Type: Press/Media Coverage
//  *********************************************************************************

// Create Post Type
add_action( 'init', 'create_post_type_media_cov' );
function create_post_type_media_cov() {
    register_post_type( 'she_media_cov',
        array(
            'labels' => array(
                'name' => __( 'Press' ),
                'singular_name' => __( 'Press Item' ),
                'add_new_item'  => __( 'Add Press Item' ),
                'new_item'       => __( 'New Press Item' ),
                'edit_item'          => __( 'Edit Press Item' ),
                'view_item'          => __( 'View Press Item' ),
                'all_items'          => __( 'All Press Items' )

            ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array(
                'title', 'editor', 'revisions',
                ),
        'rewrite' => array('slug' => 'media-coverage'),

        )
    );
}
// Add PDF Upload Ability
function she_news_item_metaboxes( $meta_boxes ) {
    $prefix = '_she_media_'; // Prefix for all fields
    $meta_boxes['news_item'] = array(
        'id' => 'news_item',
        'title' => 'Press Info',
        'pages' => array('she_media_cov'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Publication Name',
                'desc' => 'Name of Publication',
                'id' => $prefix . 'news_name',
                'type' => 'text' ),
            array(
                'name' => 'Publication Date',
                'desc' => 'Date Publication Appeared',
                'id' => $prefix . 'news_date',
                'type' => 'text' ),
            array(
                'name' => 'Upload PDF Here',
                'desc' => 'Upload the PDF Attachment Here',
                'id' => $prefix . 'news_pdf',
                'type' => 'file',
                'allow' => array( 'attachment' )
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'she_news_item_metaboxes' );
// Add shortcode
function she_sc_display_press( $atts, $content = null ) {
       $args = array(
        'posts_per_page'   => 25,
        'offset'           => 0,
        'category'         => '',
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'she_media_cov',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    global $press;
    ob_start();
    foreach ($articles_array as $press ) {
        $current_art =  $press->ID;
        $current_content = $press->post_content;
        $current_title = $press->post_title;
        $current_excerpt = $press->post_excerpt;
        $current_art_slug = $press->post_name;
        $current_pdf = get_post_meta($press->ID, '_she_media_news_pdf',TRUE); 
        $current_name = get_post_meta($press->ID, '_she_media_news_name',TRUE); 
        $current_date = get_post_meta($press->ID, '_she_media_news_date',TRUE); 
        // setup_postdata($press);

        ?>        
            

                <div class="row">
                   
                   
                        
                        <h3><strong><?php echo $current_title; ?></strong></h3>

                        <h4>
                            <?php echo $current_name; ?>
                            <?php if(!empty($current_date)) { ?>
                            <small> on <?php echo $current_date; ?></small>
                            <?php } ?>
                        </h4>
                       
                    <?php echo $current_content; ?>
                      
                    <div class="text-right">
                        <a href="<?php echo $current_pdf; ?>" class="she-blue-ghost-btn text-right" target="new">READ</a>
                    </div>
                </div>
                <div class="row">
                    <br>
                </div>
            

        <?php
         
    }
    // wp_reset_postdata(); 
    return ob_get_clean();


}
add_shortcode( 'DisplayPressLoop', 'she_sc_display_press' );











//  *********************************************************************************
// Custom Post Type: Newsletters
//  *********************************************************************************

// Create Post Type
add_action( 'init', 'create_post_type_newsletter' );
function create_post_type_newsletter() {
    register_post_type( 'she_newsletter',
        array(
            'labels' => array(
                'name' => __( 'Newsletter' ),
                'singular_name' => __( 'Newletter' ),
                'add_new_item'  => __( 'Add Newletter' ),
                'new_item'       => __( 'New Newletter' ),
                'edit_item'          => __( 'Edit Newletter' ),
                'view_item'          => __( 'View Newletter' ),
                'all_items'          => __( 'All Newsletters' )

            ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-media-document',
        'supports' => array(
                'title', 'editor', 'revisions',
                ),
        'rewrite' => array('slug' => 'newsletters'),

        )
    );
}
// Add PDF Upload Ability
function she_newsletter_metaboxes( $meta_boxes ) {
    $prefix = '_she_newsletter_'; // Prefix for all fields
    $meta_boxes['newsletter'] = array(
        'id' => 'newsletter',
        'title' => 'Attach Newsletter',
        'pages' => array('she_newsletter'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Constant Contact Link',
                'desc' => 'Paste Newsletter Link Here',
                'id' => $prefix . 'news_pdf',
                'type' => 'text'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'she_newsletter_metaboxes' );
// Add shortcode
function she_sc_display_news( $atts, $content = null ) {
       $args = array(
        'posts_per_page'   => 25,
        'offset'           => 0,
        'category'         => '',
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'she_newsletter',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    global $press;
    ob_start();
    foreach ($articles_array as $press ) {
        $current_art =  $press->ID;
        $current_content = $press->post_content;
        $current_title = $press->post_title;
        $current_excerpt = $press->post_excerpt;
        $current_art_slug = $press->post_name;
        $current_pdf = get_post_meta($press->ID, '_she_newsletter_news_pdf',TRUE); 
        // setup_postdata($press);

        ?>        
            

                <div class="row">
                   
                   
                        
                        <h3><strong><?php echo $current_title; ?></strong></h3>
                       
                    <?php echo $current_content; ?>
                      
                    <div class="text-right">
                        <a href="<?php echo $current_pdf; ?>" class="she-blue-ghost-btn text-right" target="new">READ</a>
                    </div>
                </div>
                <div class="row">
                    <br>
                </div>
            

        <?php
         
    }
    // wp_reset_postdata(); 
    return ob_get_clean();


}
add_shortcode( 'DisplayNewslettersLoop', 'she_sc_display_news' );





//  *********************************************************************************
// Custom Post Type: Annual Reports
//  *********************************************************************************

// Create Post Type
add_action( 'init', 'create_post_type_annualreport' );
function create_post_type_annualreport() {
    register_post_type( 'she_annualreport',
        array(
            'labels' => array(
                'name' => __( 'Annual Reports' ),
                'singular_name' => __( 'Annual Report' ),
                'add_new_item'  => __( 'Add Annual Report' ),
                'new_item'       => __( 'New Annual Report' ),
                'edit_item'          => __( 'Edit Annual Report' ),
                'view_item'          => __( 'View Annual Report' ),
                'all_items'          => __( 'All Annual Reports' )

            ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array(
                'title', 'revisions',
                ),
        'rewrite' => array('slug' => 'annual-reports'),

        )
    );
}
// Add PDF Upload Ability
function she_annualreport_metaboxes( $meta_boxes ) {
    $prefix = '_she_annualreport_'; // Prefix for all fields
    $meta_boxes['annualreport'] = array(
        'id' => 'annualreport',
        'title' => 'Attach Annual Report',
        'pages' => array('she_annualreport'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Upload PDF Here',
                'desc' => 'Upload the PDF Attachment Here',
                'id' => $prefix . 'news_pdf',
                'type' => 'file',
                'allow' => array( 'attachment' )
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'she_annualreport_metaboxes' );

















//  *********************************************************************************
// Custom Metaboxes for Pages to enable Blurb Photos and Text and Galleries
//  *********************************************************************************
function she_page_blurb_metaboxes( $meta_boxes ) {
    $prefix = '_she_page_'; // Prefix for all fields
    $meta_boxes['page_blurb'] = array(
        'id' => 'page_blurb',
        'title' => 'Page Blurb/Thumbnail Icon',
        'pages' => array('page'), // post type
        'context' => 'side',
        'priority' => 'low',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Page Blurb',
                'desc' => 'Short blurb (one sentence) to describe this page (optional)',
                'id' => $prefix . 'page_blurb',
                'type' => 'text'
            ),
            array(
                'name' => 'Image for Icon',
                'desc' => 'Select the Image that will represent the Page',
                'id' => $prefix . 'page_blurb_image',
                'type' => 'file',
                'allow' => array( 'attachment' )
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'she_page_blurb_metaboxes' );

//Gets attachment id of image from URL
function get_attachment_id_from_src ($image_src) {

		global $wpdb;
		$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
		$id = $wpdb->get_var($query);
		return $id;

	}










//
// Meta Boxes for Photo Galleries Custom
//
function she_page_gallery_metaboxes( $meta_boxes ) {
    $prefix = '_she_page_'; // Prefix for all fields
    $meta_boxes['page_gallery'] = array(
        'id' => 'page_gallery',
        'title' => 'Images',
        'pages' => array('she_photo_gall'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields'      => array(
            array(
                'name' => 'Select Images',
                'desc' => 'Select/Upload Images for Gallery',
                'id' => $prefix . 'page_gallery',
                'type' => 'file_list'
            ),

        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'she_page_gallery_metaboxes' );

/**
 * Adds a box to display the shortcode.
 */
function myplugin_add_meta_box() {



		add_meta_box(
			'myplugin_sectionid',
			__( 'Shortcode to Insert into Page', 'myplugin_textdomain' ),
			'myplugin_meta_box_callback',
			'she_photo_gall'
		);

}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );

function myplugin_meta_box_callback( $post ) {
        echo '<label for="myplugin_new_field">';
        _e( 'Save gallery to use anywhere on site.', 'myplugin_textdomain' );
        echo '</label>';
        echo '<p>Instructions: Copy/paste the custom shortcode below to embed your gallery in any page.</p>';
        echo '<h3>ShortCode: [ShowGallery id="' . $post->ID . '"]</h3>'; 
}
add_filter('manage_edit-she_photo_gall_columns', 'my_columns');
function my_columns($columns) {
    $columns['shortcodes'] = 'Shortcode';
    return $columns;
}
add_action('manage_posts_custom_column',  'my_show_columns');
function my_show_columns($name) {
    global $post;
    switch ($name) {
        case 'shortcodes':
            $shortcodes = 'ShortCode: [ShowGallery id="' . $post->ID . '"]'; 
            echo $shortcodes;
    }
}






function she_page_vimeo_metaboxes( $meta_boxes ) {
    $prefix = '_she_page_vimeo_'; // Prefix for all fields
    $meta_boxes['page_vimeo'] = array(
        'id' => 'page_vimeo',
        'title' => 'Add Custom Vimeo Box - Use with Shortcode [CustomVimeoBox]',
        'pages' => array('page'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields'      => array(
                     array(
                        'name' => 'Vimeo Code',
                        'desc' => '8 Digit code at end of Vimeo Url',
                        'id'   => $prefix . 'code',
                        'type' => 'text',
                    ),
                     array(
                        'name' => 'Headline',
                        'desc' => 'Large Heading',
                        'id'   => $prefix . 'headline',
                        'type' => 'text',
                    ),
                     array(
                        'name' => 'Tagline',
                        'desc' => 'Small sentence description.',
                        'id'   => $prefix . 'title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Select Images',
                        'desc' => 'Select/Upload Images for vimeo',
                        'id'   => $prefix . 'coverimage',
                        'type' => 'file'
                    ),
 
                ),
            );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'she_page_vimeo_metaboxes' );




// Initialize the metabox class github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'lib/metabox-a/init.php' );
    }
}
















//  *********************************************************************************
// Custom Options Panel via http://wptheming.com/options-framework-theme/
//  *********************************************************************************

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
add_action('optionsframework_after','exampletheme_options_after', 100);
function exampletheme_options_after() { ?>
    <p>Welcome to the Custom Front Page Editor!</p>
<?php }
/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
 add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#orbit_visible_one').click(function() {
  		jQuery('#section-orbit_front_image_one').fadeToggle(400);
  		jQuery('#section-orbit_tagline_text_one').fadeToggle(400);
  		jQuery('#section-orbit_button_text_one').fadeToggle(400);
  		jQuery('#section-orbit_select_pages_one').fadeToggle(400);
	});

	if (jQuery('#orbit_visible_one:checked').val() !== undefined) {
		jQuery('#section-orbit_front_image_one').show();
		jQuery('#section-orbit_tagline_text_one').show();
		jQuery('#section-orbit_button_text_one').show();
		jQuery('#section-orbit_select_pages_one').show();
	}

});
</script>

<?php
}

function she_orbit_options_generate() {
        $link_id = of_get_option('orbit_select_pages_one');
        $permalink = get_permalink( $link_id );

?>
    <div class="frame">
        <div class="bit-1 she-full-height-div she-blue-background text-center" style="background:url('<?php echo of_get_option('orbit_front_image_one'); ?>') no-repeat center; background-size:cover;">
          <div class="frame">
         
            <div class="bit-1 text-center">
                <div class="she-feature-header" >
                  <div class="she-trans-blue box-padding box-padding-vert">
                    <h1 ><?php echo of_get_option('orbit_tagline_text_one'); ?></h1><BR>
                    <a href="<?php echo $permalink; ?>" class="she-white-ghost-btn"><h2><?php echo of_get_option('orbit_button_text_one'); ?></h2></a>
                  </div>
                </div>
            </div>
           </div>
        </div>
    </div>

          
<?


}









//  *********************************************************************************
// Generate Show/Hide Button for Articles
//  *********************************************************************************

// Include script if Global Variable found
//function she_call_blog_slider_script() {
//    global $she_blog_add_script;
//
//    if ( ! $she_blog_add_script ) {
//        return;
//    }
//        
//    else {
//    return she_article_toggle_script();
//    }
//}
// Creates Custom script for Articles
function she_article_toggle_script(){

    echo  "<script>
            jQuery(document).ready(function(){";

    $args = array(
        'posts_per_page'   => 5,
        'offset'           => 0,
        'category'         => 'newsandevents',
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    foreach ($articles_array as $article ) {
        $current_art =  $article->ID;
        echo '$(".art-toggle-btn-' . $current_art . '").click(function(){';
        echo '$(".art-toggle-body-' . $current_art . '").slideToggle(500);';
        echo '$(".art-toggle-excerpt-' . $current_art . '").toggle(10, function(e){
             $(this).is(":visible") ? $(".art-toggle-btn-' . $current_art . '").text("READ") : $(".art-toggle-btn-' . $current_art . '").text("HIDE");
        });';

        // echo '$(".art-toggle-btn-' . $current_art . '").text("HIDE");';
        // echo ' $(this).is(":visible") ? $(".art-toggle-btn-' . $current_art . '").text("READ") : $(".art-toggle-btn-' . $current_art . '").text("HIDE");';
        echo '});';
    }
     

    echo "$('a').click(function(){
            $('html, body').animate({
                scrollTop: $( $(this).attr('href') ).offset().top
            }, 500);
           
            return false;
        });";
  
    echo "});";
    echo "</script>";
    
             
}
// Creates Loop of Blog Posts
function she_article_toggle_generate(){

    $args = array(
        'posts_per_page'   => 5,
        'offset'           => 0,
        'category'         => 'newsandevents',
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    global $post;
    foreach ($articles_array as $post ) {
        $current_art =  $post->ID;
        $current_art_slug = $post->post_name;
        setup_postdata($post);
        ?>        
            

                <div class="row she-article-row">
                    <div class="she-circular-image-thumb">
                        <a id="<?php echo $current_art_slug; ?>"></a>
                        <a href="#<?php echo $current_art_slug; ?>" class="art-toggle-btn-<?php echo $current_art; ?>"><?php the_post_thumbnail('she-circular-image','class=alignleft'); ?></a>
                    </div>
                        <h3><?php the_title(); ?></h3>
<!--                         <div class="art-toggle-excerpt-<?php echo $current_art; ?>">
                            <p><?php the_excerpt(); ?></p>
                        </div> -->
                         <div class="art-toggle-body-<?php echo $current_art; ?>" style="display:none">
                            <p><?php the_content(); ?></p>
                        </div>
                        <div class="text-right">
                            <a href="#<?php echo $current_art_slug; ?>" class="she-blue-ghost-btn text-right art-toggle-btn-<?php echo $current_art; ?>">READ</a>
                        </div>
                </div>
                <div class="row">
                    <hr>
                </div>
            

        <?php
         
    }
    wp_reset_postdata(); 

}
















// ************************************************************************************
// Custom Display for Properties (Current Projects)
// ************************************************************************************
// Include script if Global Variable found
function she_call_property_slider_script() {
    global $she_property_add_script;

    if ( ! $she_property_add_script ) {
        return;
    }
        
    else {
    return she_property_toggle_script();
    }
}
// Script for She 
function she_property_toggle_script(){

    echo  "<script>
            jQuery(document).ready(function(){";

    $args = array(
        'posts_per_page'   => 50,
        'offset'           => 0,
        'property_type'         => 'current-projects',
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'she_property',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    foreach ($articles_array as $article ) {
        $current_art =  $article->ID;
        echo '$(".art-toggle-btn-' . $current_art . '").click(function(){';
        echo '$(".art-toggle-body-' . $current_art . '").slideToggle(500);';
        echo '$(".art-toggle-excerpt-' . $current_art . '").toggle(10, function(e){
             $(this).is(":visible") ? $(".art-toggle-btn-' . $current_art . '").text("READ") : $(".art-toggle-btn-' . $current_art . '").text("HIDE");
        });';
        // echo '$(".art-toggle-btn-' . $current_art . '").text("HIDE");';
        // echo ' $(this).is(":visible") ? $(".art-toggle-btn-' . $current_art . '").text("READ") : $(".art-toggle-btn-' . $current_art . '").text("HIDE");';
        echo '});';
    }
     

    echo "});";
    echo "$('a').click(function(){
            $('html, body').animate({
                scrollTop: $( $(this).attr('href') ).offset().top
            }, 500);
           
            return false;
        });";
    echo "</script>";
    
             
}
// Creates Loop of Properties
function she_property_toggle_generate(){

    $args = array(
        'posts_per_page'   => 50,
        'offset'           => 0,
        'property_type'    => 'current-projects',
        'orderby'          => 'title',
        'order'            => 'ASC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'she_property',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    global $post;
    foreach ($articles_array as $post ) {
        $current_art =  $post->ID;
        $current_art_slug = $post->post_name;
        setup_postdata($post);
        $curaddress = get_post_meta( get_the_ID(),'_she_property_address' , true ); 
        $curcity = get_post_meta( get_the_ID(),'_she_property_city' , true );
        $curstate = get_post_meta( get_the_ID(),'_she_property_state' , true );
        $curzip = get_post_meta( get_the_ID(),'_she_property_zip' , true ); 
         
        $curaddressmaps = str_replace("%20", "+", urlencode($curaddress));
        $curcitymaps = str_replace("%20", "+", urlencode($curcity));
        $curgmapsoverride = get_post_meta( get_the_ID(),'_she_property_custom_gmap' , true );
        if($curgmapsoverride != ''){
            $gmapslink = $curgmapsoverride;
        } else {
            $gmapslink = "http://maps.google.com/?q=" . $curaddressmaps . ',+' . $curcitymaps . ',+' . $curstate . '+' . $curzip;   
        }
                                 
        
                        
                        
        ?>        
            


                <div class="frame she-article-row" id="<?php echo $current_art_slug; ?>">
                    <div class="bit-1">
                        <div class="frame">
                            <div class="bit-3 text-center">
                                <div class="she-circular-image-thumb">

                                    <a href="#<?php echo $current_art_slug; ?>" class="art-toggle-btn-<?php echo $current_art; ?>"><?php the_post_thumbnail('she-circular-image','class=alignleft'); ?></a>
                                </div>
                                                
                            </div>
                            <div class="bit-3 ">
                                <div class="box-padding-vert text-center">
                                    <h3><?php the_title(); ?></h3>        
                                </div>
                                
                            </div>
                            <div class="bit-3 ">
                                <div class="box-padding-vert text-center">
                                    <a href="#<?php echo $current_art_slug; ?>" class="she-blue-ghost-btn text-right art-toggle-btn-<?php echo $current_art; ?>">LEARN MORE</a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="frame">  
                            <div class="bit-1">
                                <div class="art-toggle-body-<?php echo $current_art; ?> box-padding" style="display:none">
                                   <div class="frame">
                                       <div class="bit-2">
                                          <?php the_content(); ?>
                                       </div>
                                       <div class="bit-2">
                                            <?php if($curcity !='' && $curstate !=''){ ?>
                                        <p> <a href="<?php echo $gmapslink; ?>" target="new" class="she-blue-text">Visit on Google Maps</a></p>
                                        <?php } ?>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="frame">
                    <div class="bit-1">
                        <br>
                    </div>  
                </div>

        <?php
         
    }
    wp_reset_postdata(); 

}
//UPCOMING CATEGORY
//
//
// Include script if Global Variable found
function she_call_property_upcoming_slider_script() {
    global $she_property_upcoming_add_script;

    if ( ! $she_property_upcoming_add_script ) {
        return;
    }
        
    else {
    return she_property_upcoming_toggle_script();
    }
}
// Script for She 
function she_property_upcoming_toggle_script(){

    echo  "<script>
            jQuery(document).ready(function(){";

    $args = array(
        'posts_per_page'   => 50,
        'offset'           => 0,
        'property_type'    => 'upcoming-projects',
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'she_property',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    foreach ($articles_array as $article ) {
        $current_art =  $article->ID;
        echo '$(".art-toggle-btn-' . $current_art . '").click(function(){';
        echo '$(".art-toggle-body-' . $current_art . '").slideToggle(500);';
        echo '$(".art-toggle-excerpt-' . $current_art . '").toggle(10, function(e){
             $(this).is(":visible") ? $(".art-toggle-btn-' . $current_art . '").text("READ") : $(".art-toggle-btn-' . $current_art . '").text("HIDE");
        });';
        // echo '$(".art-toggle-btn-' . $current_art . '").text("HIDE");';
        // echo ' $(this).is(":visible") ? $(".art-toggle-btn-' . $current_art . '").text("READ") : $(".art-toggle-btn-' . $current_art . '").text("HIDE");';
        echo '});';
    }
     

    echo "});";
    echo "$('a').click(function(){
            $('html, body').animate({
                scrollTop: $( $(this).attr('href') ).offset().top
            }, 500);
           
            return false;
        });";
    echo "</script>";
    
             
}
// Creates Loop of Properties (upcoming)
function she_property_upcoming_toggle_generate(){

    $args = array(
        'posts_per_page'   => 50,
        'offset'           => 0,
        'property_type'    => 'upcoming-projects',
        'orderby'          => 'title',
        'order'            => 'ASC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'she_property',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    global $post;
    foreach ($articles_array as $post ) {
        $current_art =  $post->ID;
        $current_art_slug = $post->post_name;
        setup_postdata($post);
        
        $curaddress = get_post_meta( get_the_ID(),'_she_property_address' , true ); 
        $curcity = get_post_meta( get_the_ID(),'_she_property_city' , true );
        $curstate = get_post_meta( get_the_ID(),'_she_property_state' , true );
        $curzip = get_post_meta( get_the_ID(),'_she_property_zip' , true );   
        $curaddressmaps = str_replace("%20", "+", urlencode($curaddress));
        $curcitymaps = str_replace("%20", "+", urlencode($curcity));
        $curgmapsoverride = get_post_meta( get_the_ID(),'_she_property_custom_gmap' , true );
        if($curgmapsoverride != ''){
            $gmapslink = $curgmapsoverride;
        } else {
            $gmapslink = "http://maps.google.com/?q=" . $curaddressmaps . ',+' . $curcitymaps . ',+' . $curstate . '+' . $curzip;   
        }
            
                        
                        
        ?>        
            


                <div class="frame she-article-row" id="<?php echo $current_art_slug; ?>">
                    <div class="bit-1">
                        <div class="frame">
                            <div class="bit-3 text-center">
                                <div class="she-circular-image-thumb">

                                    <a href="#<?php echo $current_art_slug; ?>" class="art-toggle-btn-<?php echo $current_art; ?>"><?php the_post_thumbnail('she-circular-image','class=alignleft'); ?></a>
                                </div>
                                                
                            </div>
                            <div class="bit-3 ">
                                <div class="box-padding-vert text-center">
                                    <h3><?php the_title(); ?></h3>        
                                </div>
                                
                            </div>
                            <div class="bit-3 ">
                                <div class="box-padding-vert text-center">
                                    <a href="#<?php echo $current_art_slug; ?>" class="she-blue-ghost-btn text-right art-toggle-btn-<?php echo $current_art; ?>">LEARN MORE</a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="frame">  
                            <div class="bit-1">
                                <div class="art-toggle-body-<?php echo $current_art; ?> box-padding" style="display:none">
                                   <div class="frame">
                                       <div class="bit-2">
                                          <?php the_content(); ?>
                                       </div>
                                       <div class="bit-2">
                                            <?php if($curcity !='' && $curstate !=''){ ?>
                                        <p> <a href="<?php echo $gmapslink; ?>" target="new" class="she-blue-text">Visit on Google Maps</a></p>
                                        <?php } ?>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="frame">
                    <div class="bit-1">
                        <br>
                    </div>  
                </div>

        <?php
         
    }
    wp_reset_postdata(); 

}




// 
// Include Smooth Scroll if No Conflict
// 
function she_call_smooth_scroll_script() {
    global $she_set_smooth_scroll_script;

    if ( ! $she_set_smooth_scroll_script ) {
        return;
    }
        
    else {
    return she_smooth_scroll_script();
    }
}
function she_smooth_scroll_script(){
    ?>
    <!-- SMOOTH SCROLL -->
    <script>
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
    </script>
      <!-- End of SMOOTH SCROLL -->

    <?php 
}







// ************************************************************************************
// Custom Display for Properties (Rental Communities)
// ************************************************************************************
// Include script if Global Variable found
function she_call_property_rc_slider_script() {
    global $she_property_rc_add_script;

    if ( ! $she_property_rc_add_script ) {
        return;
    }
        
    else {
    return she_property_rc_toggle_script();
    }
}
// Script for She 
function she_property_rc_toggle_script(){

    echo  "<script>
            jQuery(document).ready(function(){";

    $args = array(
        'posts_per_page'   => 50,
        'offset'           => 0,
        'property_type'    => 'rental-communities',
        'orderby'          => 'title',
        'order'            => 'ASC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'she_property',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    foreach ($articles_array as $article ) {
        $current_art =  $article->ID;
        
        echo '$(".art-toggle-btn-' . $current_art . '").click(function(){';
        echo '$(".art-toggle-body-' . $current_art . '").slideToggle(500);';
        echo '$(".art-toggle-excerpt-' . $current_art . '").toggle(10, function(e){
             $(this).is(":visible") ? $(".art-toggle-btn-' . $current_art . '").text("READ") : $(".art-toggle-btn-' . $current_art . '").text("HIDE");
        });';
        // echo '$(".art-toggle-btn-' . $current_art . '").text("HIDE");';
        // echo ' $(this).is(":visible") ? $(".art-toggle-btn-' . $current_art . '").text("READ") : $(".art-toggle-btn-' . $current_art . '").text("HIDE");';
        echo '});';
    }
     

    echo "});";
    echo "$('a').click(function(){
            $('html, body').animate({
                scrollTop: $( $(this).attr('href') ).offset().top
            }, 500);
           
            return false;
        });";
    echo "</script>";
    
             
}
// Creates Loop of Properties
function she_property_rc_toggle_generate(){

    $args = array(
        'posts_per_page'   => 50,
        'offset'           => 0,
        'property_type'    => 'rental-communities',
        'orderby'          => 'title',
        'order'            => 'ASC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'she_property',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    global $post;
    foreach ($articles_array as $post ) {
        $current_art =  $post->ID;
        $current_art_slug = $post->post_name;
        setup_postdata($post);
        $curunits = get_post_meta( get_the_ID(),'_she_property_total_units' , true );
        $curaddress = get_post_meta( get_the_ID(),'_she_property_address' , true ); 
        $curcity = get_post_meta( get_the_ID(),'_she_property_city' , true );
        $curstate = get_post_meta( get_the_ID(),'_she_property_state' , true );
        $curzip = get_post_meta( get_the_ID(),'_she_property_zip' , true );       
        $curgmapsoverride = get_post_meta( get_the_ID(),'_she_property_custom_gmap' , true );
        if($curgmapsoverride != ''){
            $gmapslink = $curgmapsoverride;
        } else {
            $gmapslink = "http://maps.google.com/?q=" . $curaddressmaps . ',+' . $curcitymaps . ',+' . $curstate . '+' . $curzip;   
        }
                        
                        
        ?>        
            

                <div class="frame she-article-row" id="<?php echo $current_art_slug; ?>">
                    <div class="bit-1">
                        <div class="frame">
                            <div class="bit-3 text-center">
                                <div class="she-circular-image-thumb">

                                    <a href="#<?php echo $current_art_slug; ?>" class="art-toggle-btn-<?php echo $current_art; ?>"><?php the_post_thumbnail('she-circular-image','class=alignleft'); ?></a>
                                </div>
                                                
                            </div>
                            <div class="bit-3 ">
                                <div class="box-padding-vert text-center">
                                    <h3><?php the_title(); ?></h3> 
                                    <p><strong><?php echo $curcity . ', ' . $curstate; ?></strong></p>       
                                </div>
                                
                            </div>
                            <div class="bit-3 ">
                                <div class="box-padding-vert text-center">
                                    <a href="#<?php echo $current_art_slug; ?>" class="she-blue-ghost-btn text-right art-toggle-btn-<?php echo $current_art; ?>">LEARN MORE</a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="frame">  
                            <div class="bit-1">
                                <div class="art-toggle-body-<?php echo $current_art; ?> box-padding" style="display:none">
                                    <?php if($curcity !='' && $curstate !=''){ ?>
                                    <div class="frame">
                                        <div class="bit-1 text-right"> <p> <a href="<?php echo $gmapslink; ?>" target="new" class="she-blue-text">Visit on Google Maps</a></p></div>
                                    </div>
                                   
                                    <?php } ?>
                                    <p><?php echo $curunits; ?></p>
                                    <div class="text-right">
                                        <p><a href="<?php echo the_permalink(); ?>"><strong>Keep Reading...</strong></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="frame">
                    <div class="bit-1">
                        <br>
                    </div>  
                </div>
            

        <?php
         
    }
    wp_reset_postdata(); 

}















//  *********************************************************************************
// Custom Post Type: Job Posting
//  *********************************************************************************

// Create Post Type
add_action( 'init', 'create_post_type_job_posting' );
function create_post_type_job_posting() {
    register_post_type( 'she_job_posting',
        array(
            'labels' => array(
                'name' => __( 'Job Posting' ),
                'singular_name' => __( 'Job Posting' ),
                'add_new_item'  => __( 'Add Job Posting' ),
                'new_item'       => __( 'New Job Posting' ),
                'edit_item'          => __( 'Edit Job Posting' ),
                'view_item'          => __( 'View Job Posting' ),
                'all_items'          => __( 'All Job Postings' )

            ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-universal-access',
        'supports' => array(
                'title', 'editor', 'revisions',
                ),
        'rewrite' => array('slug' => 'careers'),

        )
    );
}
// Add PDF Upload Ability
function she_job_posting_metaboxes( $meta_boxes ) {
    $prefix = '_she_career_'; // Prefix for all fields
    $meta_boxes['job_postings'] = array(
        'id' => 'job_posting',
        'title' => 'Job Info',
        'pages' => array('she_job_posting'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Responsibilities',
                'desc' => 'Enter Job Responsibilities',
                'id' => $prefix . 'responsibilities',
                'type' => 'wysiwyg' ),
            array(
                'name' => 'Must Haves',
                'desc' => 'Enter Must Haves',
                'id' => $prefix . 'must_haves',
                'type' => 'wysiwyg' ),
            array(
                'name' => 'Skills',
                'desc' => 'Enter Job Skills',
                'id' => $prefix . 'skills',
                'type' => 'wysiwyg',
            ),
            array(
                'name' => 'Job Application',
                'desc' => 'Select/Upload PDF',
                'id'   => $prefix . 'jobapp',
                'type' => 'file'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'she_job_posting_metaboxes' );




//  *********************************************************************************
// Custom Post Type: Photo Gallery
//  *********************************************************************************

// Create Post Type
add_action( 'init', 'create_post_type_photo_gall' );
function create_post_type_photo_gall() {
    register_post_type( 'she_photo_gall',
        array(
            'labels' => array(
                'name' => __( 'Galleries' ),
                'singular_name' => __( 'Gallery' ),
                'add_new_item'  => __( 'Add Gallery' ),
                'new_item'       => __( 'New Gallery' ),
                'edit_item'          => __( 'Edit Gallery' ),
                'view_item'          => __( 'View Gallery' ),
                'all_items'          => __( 'All Galleries' )

            ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array(
                'title', 'thumbnail'
                ),
        'rewrite' => array('slug' => 'photo-gallery'),

        )
    );
}










// 
// Include Custom Shortcodes
// 
require_once('inc/functions-custom-shortcodes.php');

//
//Include Menu 
//
require_once('inc/functions-menu.php');

//
//Include Icon Shortcodes
//
require_once('inc/functions-icon-shortcodes.php');

//
//Include Icon Shortcodes
//
require_once('inc/functions-tecoverrides.php');