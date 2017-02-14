<?php

// *********************************************************************************
// Custom Shortcodes
//  *********************************************************************************


// Remove <P> tags from Shortcodes via http://www.johannheyne.de
    function shortcode_empty_paragraph_fix( $content ) {

        $array = array (
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );

        $content = strtr( $content, $array );

        return $content;
    }

    add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );


// Block Grid
function she_sc_grid_two( $atts, $content = null ) {
    return '<div class="frame grid-padding equalize-container">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'GridTwo', 'she_sc_grid_two' );
function she_sc_gridthree( $atts, $content = null ) {
    return '<div class="frame grid-padding equalize-container">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'GridThree', 'she_sc_gridthree' );
function she_sc_gridFour( $atts, $content = null ) {
    return '<div class="frame grid-padding equalize-container">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'GridFour', 'she_sc_gridFour' );

function she_sc_gridFive( $atts, $content = null ) {

    return '<div class="frame grid-padding equalize-container">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'GridFive', 'she_sc_gridFive' );

function she_sc_gridsix( $atts, $content = null ) {

    return '<div class="frame grid-padding equalize-container">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'GridSix', 'she_sc_gridsix' );

function she_sc_griditemtwo( $atts, $content = null ) {
    return '<div class="bit-2 equalize"><div class="box-padding text-center">' . do_shortcode( $content ) . '</div></div>';
}
add_shortcode( 'GridItemTwo', 'she_sc_griditemtwo' );
function she_sc_griditemthree( $atts, $content = null ) {
    return '<div class="bit-3 equalize"><div class="box-padding text-center">' . do_shortcode( $content ) . '</div></div>';
}
add_shortcode( 'GridItemThree', 'she_sc_griditemthree' );
function she_sc_griditemFour( $atts, $content = null ) {
    return '<div class="bit-4 equalize"><div class="box-padding text-center">' . do_shortcode( $content ) . '</div></div>';
}
add_shortcode( 'GridItemFour', 'she_sc_griditemFour' );

function she_sc_griditemFive( $atts, $content = null ) {
    return '<div class="bit-5 equalize"><div class="box-padding text-center">' . do_shortcode( $content ) . '</div></div>';
}
add_shortcode( 'GridItemFive', 'she_sc_griditemFive' );

function she_sc_griditemsix( $atts, $content = null ) {
    return '<div class="bit-6 equalize"><div class="box-padding text-center">' . do_shortcode( $content ) . '</div></div>';
}
add_shortcode( 'GridItemSix', 'she_sc_griditemsix' );


//[Buffer Shortcode]
function she_sc_buffer( $atts, $content = null ) {
     $a = shortcode_atts( array(
            'rows' => 5,
        ), $atts );
    $counter = 0;
    $returnstring = '<br>';
    while ($counter < $a['id']){
        $returnstring .= '<br>';
        $counter = $counter + 1;
    }
   // return $returnstring;
    return '<BR><BR><BR><BR><BR>';
}
add_shortcode( 'Buffer', 'she_sc_buffer' );



// Creates the Blue Triangle Heading
function she_sc_blue_triangle_heading( $atts, $content = null ) {
    return '<div class="frame">
               <div class="bit-1">
                            <div class="she-border-bottom-blue">
                                <h2 id="<?php echo $page->post_name; ?>" class="text-center she-blue-text hefty-header">' . do_shortcode( $content ) . '</h2>
                            </div>
                            <div class="she-blue-triangle-mini"></div>
                        </div>
                    </div>';
}
add_shortcode( 'HeadingBlueTriangle', 'she_sc_blue_triangle_heading' );




// Displays the Contents of a page by ID
function she_sc_display_page( $atts, $content = null ) {
    $a = shortcode_atts( array(
            'id' => 289,
        ), $atts );


    $hhc_post = get_post($a['id']);

    // return '<div class="small-10 small-offset-1 medium-8 medium-offset-2">
    //                         <h4 class="text-center uppercase"><strong>' . $hhc_post->post_title . '</strong></h4><hr>
    //                     </div>' . 
    // do_shortcode($hhc_post->post_content);
    ob_start();
        ?>

        <!-- Start Healthy Homes & Communities Section -->
    </div></div></div>
    <div class="frame">
        <div class="bit-1">
            <div class="box-padding">
                <div class="she-border-bottom-blue">
                   <br><BR>
                    <h2 class="she-blue-text text-center hefty-header">Healthy Homes and Communities</h2>
                </div>
                <div class="she-blue-triangle-mini"></div>
            </div>
        </div>
    </div>
    
    <section>

      <div class="frame">
        <div class="box-padding">
            <div class="bit-3 text-center">
              
              <a href="<?php echo get_site_url(); ?>/healthy-homes-communities/sustainability/"><span class="she-icons__houseleaf"></span></a>

              <h4><strong>Sustainability</strong></h4>
              <p>Building homes that are energy efficient, use fewer resources, and are affordable.</p>
              
            </div>

            <div class="bit-3 text-center">
            
             <a href="<?php echo get_site_url(); ?>/healthy-homes-communities/community-building/"><span class="she-icons__group"></span></a>

              <h4><strong>Community Building</strong></h4>
              <p>Empowering people to become leaders in their community. </p>
              
            </div>

            <div class="bit-3 text-center">
             
              <a href="<?php echo get_site_url(); ?>/healthy-homes-communities/health-and-wellness/"><span class="she-icons__heart"></span></a>
              <h4><strong>Health &amp; Wellness</strong></h4>
              <p>Creating and supporting efforts to promote healthy homes and communities. </p>
              
            </div>
        </div>
      </div>
    </section>
    <BR><BR>
    <div class="frame"><div class="bit-1"><div class="box-padding">
        <!-- End Healthy Homes & Communities Section -->





        
        <?php
        return ob_get_clean();
}
add_shortcode( 'DisplayPage', 'she_sc_display_page' );
add_shortcode( 'HealthyHomesandCommunities', 'she_sc_display_page' );





// Displays the Blog Posts
function she_sc_display_blogs( $atts, $content = null ) {
    global $she_blog_add_script;

    $she_blog_add_script = true;
    ob_start();
    she_article_toggle_generate();
    return ob_get_clean();
}
add_shortcode( 'DisplayBlogsLoop', 'she_sc_display_blogs' ); 


// Displays the Properties(current-projects)
function she_sc_display_properties_building( $atts, $content = null ) {
    global $she_property_add_script;

    $she_property_add_script = true;
    ob_start();




    she_property_toggle_generate();
    



    return ob_get_clean();
}
add_shortcode( 'DisplayPropertiesCurrentProjects', 'she_sc_display_properties_building' ); 
// Displays the Properties(current-projects)
function she_sc_display_properties_upcoming( $atts, $content = null ) {
    global $she_property_upcoming_add_script;

    $she_property_upcoming_add_script = true;
    ob_start();




    she_property_upcoming_toggle_generate();
    



    return ob_get_clean();
}
add_shortcode( 'DisplayPropertiesUpcoming', 'she_sc_display_properties_upcoming' ); 


// Displays the Properties(rental-communties)
function she_sc_display_properties_rc( $atts, $content = null ) {
    global $she_property_rc_add_script;

    $she_property_rc_add_script = true;
    ob_start();




    she_property_rc_toggle_generate();
    



    return ob_get_clean();
}
add_shortcode( 'DisplayPropertiesRentalCommunities', 'she_sc_display_properties_rc' ); 



// Creates a Ghost Button
function she_sc_blue_ghost_btn( $atts, $content = null ) {
    return "<span class='she-blue-ghost-btn'>" . do_shortcode( $content ) . "</span>";
}
add_shortcode( 'Button', 'she_sc_blue_ghost_btn' ); 

// Makes Content Full Screen Width
function she_sc_full_width( $atts, $content = null ) {
    return "</div></div></div><div class='frame'>
        <div class='bit-1'>" . do_shortcode( $content ) . "</div></div><div class='frame'>
        <div class='bit-1'><div class='box-padding page-defaults'>
            <BR><BR><BR><BR>";
}
add_shortcode( 'FullScreenWidth', 'she_sc_full_width' ); 


// Creates a Vimeo Full Screen addition
function she_sc_vimeo( $atts, $content = null ) {

        $a = shortcode_atts( array(
            'id' => 84815429,
            'headline' => 'Watch Video',
            'tagline' => 'Self Help Enterprises',
        ), $atts );
        $vimeourl = 'http://vimeo.com/api/v2/video/' . $a['id'] . '.php';
        $vimeocont = unserialize(file_get_contents($vimeourl));
        $vimeothumb = $vimeocont[0]['thumbnail_large'];
        ob_start();
    ?>
      <!-- Start Featured Vimeo -->
      
  </div>
      <section>
<!--Start Custom Overlay Frame-->
<div class="frame she-vimeo-overlay-off">

    <div class="bit-1">
       <div class="videoWrapper">
            <iframe src="//player.vimeo.com/video/<?php echo $a['id']; ?>" width="100%" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        <span class="she-vimeo-overlay-close uppercase">&#10005;</span>
        </div>
</div>
<!--End Custom Overlay Frame-->
       
       
        <div class="frame she-full-height-div she-blue-background text-center" style="background:url('<?php echo $vimeothumb; ?>') no-repeat center; background-size:cover;" >
         
          <div class="bit-1 she-feature-header"  data-bottom-top="transform:translate(0px,-100px); opacity:0;" data-top-top="transform:translate(0px,100px); opacity:1;">
            
               <div class="vimeo-tagline-header she-trans-blue">
                  <span class="she-vimeo-overlay-link">
                   <h1 class="she-vimeotag"><?php echo $a['headline']; ?></h1>
                   <h4><?php echo $a['tagline']; ?></h4>
                    <BR><BR>
                    <span class="she-vimeo-overlay-link"><h3 class="uppercase she-blue-text"><strong>PLAY VIDEO &#x25b6;</strong></h3>                                
                    <BR><BR>
                    </span> 
              </div>
              
          </div>
          
        </div>  
      </section>


<!-- End Featured Vimeo -->
    <div class="box-padding page-defaults">
            <BR><BR><BR><BR>
    <?php
    $returnstring = ob_get_contents();
    ob_get_clean();
    return $returnstring;
}
add_shortcode( 'Vimeo', 'she_sc_vimeo' ); 



// Creates a Custom Vimeo Full Screen addition
function she_sc_custom_vimeo( $atts, $content = null ) {

    $vimeoid = get_post_meta( get_the_ID(), '_she_page_vimeo_code', true );
    $headline = get_post_meta( get_the_ID(), '_she_page_vimeo_headline', true );
    $tagline = get_post_meta( get_the_ID(), '_she_page_vimeo_title', true );
    $vimeothumb =  get_post_meta( get_the_ID(), '_she_page_vimeo_coverimage', 1 );
//        $vimeourl = 'http://vimeo.com/api/v2/video/' . $vimeoid . '.php';
//        $vimeocont = unserialize(file_get_contents($vimeourl));
//        $vimeothumb = $vimeocont[0]['thumbnail_large'];

        ob_start();
    ?>
      <!-- Start Featured Vimeo -->
      
  </div>

<!--Start Custom Overlay Frame-->
<div class="frame she-vimeo-overlay-off">

    <div class="bit-1">
      <span class="she-vimeo-overlay-close uppercase">&#10005;</span>
       <div class="videoWrapper">
            <iframe src="//player.vimeo.com/video/<?php echo $vimeoid; ?>" width="80%" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        
        </div>
</div>
<!--End Custom Overlay Frame-->
       
  <section>   
        <div class="frame she-full-height-div she-blue-background text-center" style="background:url('<?php echo $vimeothumb; ?>') no-repeat center; background-size:cover;" >
          
          <div class="bit-1"  data-bottom-top="transform:translate(0px,-100px); opacity:0;" data-top-top="transform:translate(0px,100px); opacity:1;">
            
               <div class="she-feature-header">
                  <span class="she-vimeo-overlay-link  text-center vimeo-tagline-header she-trans-blue">
                   <h1 class="she-vimeotag"><?php echo $headline; ?></h1>
                   <h4><?php echo $tagline; ?></h4>
                    <BR><BR>
                    <h2 >PLAY VIDEO &#x25b6;</h2>                                
                    <BR><BR>
                    </span> 
              </div>
              
          </div>
          
        </div>  
      </section>


<!-- End Featured Vimeo -->
    <div class="box-padding page-defaults">
            <BR><BR><BR><BR>
    <?php
    $returnstring = ob_get_contents();
    ob_get_clean();
    return $returnstring;
}
add_shortcode( 'CustomVimeoBox', 'she_sc_custom_vimeo' ); 








// [IntakeFormButton]  Displays a contact form.
function she_sc_contact_form( $atts, $content = null ){
    ob_start();

     ?>
     <div class="frame she-intake-overlay-off">

            <div class="bit-1">
              <span class="she-intake-overlay-close uppercase">&#10005;</span>
              <h2 style="color:#444;">Interest Form</h2>
              <h4 style="color:#444;">Please fill out the form.</h4>
            <?php echo do_shortcode( '[contact-form-7 id="688" title="Contact form 1"]' ); ?>
            </div>
        </div> 
        <?php if(is_page_template('page-contact.php')) { ?>
        <span class="she-intake-overlay-link she-white-ghost-btn">Contact Us</span>
        <?php } else { ?>
        <div class="text-center"><span class="she-intake-overlay-link she-blue-ghost-btn text-center">Interest Form</span></div>
        <?php } ?>

    <?php
    $return_string = ob_get_contents();
    ob_end_clean();
    return $return_string;
}
add_shortcode( 'IntakeFormButton', 'she_sc_contact_form' ); 


// [BigBlueParagraph]  Gives that nice big SelfHelpBlue to the font.
function she_sc_lead_blue( $atts, $content = null  ){
     return "<p class='lead she-blue-text'>" . do_shortcode( $content ) . "</h3>";

}
add_shortcode( 'BigBlueParagraph', 'she_sc_lead_blue' ); 


// [ShowJobPostings]  Shows Job Postings.
function she_sc_job_postings( $atts, $content = null  ){
    // Generate Career Link Boxes

     $args = array(
        'posts_per_page'   => 5,
        'offset'           => 0,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'she_job_posting',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

    $articles_array = get_posts( $args );
    global $post; 
    ob_start();        ?>
   </div><div class="frame equalizer-content">
    <?php 
        if(empty($articles_array)){
            echo '<div class="text-center"><h3>Thank you for your interest. We currently do not have any openings.</h3></div>';
        } else {
            foreach ($articles_array as $post ) { 
                ?>
                <div class="bit-3">
                    <div class="box-padding">
                        <div class="career-box">
                            <a href="<?php the_permalink(); ?>" class="career-link">
                                <?php the_title('<h3><strong>','</strong></h3>'); ?>
                                <BR><BR>
                                <a href="<?php the_permalink(); ?>" class="she-blue-ghost-btn">Learn More</a>
                            </a>
                        </div>
                    </div>
                </div>
                <?php                
                } 
        }?>
    </div><div class="box-padding page-defaults">
    <?php 
    $return_string = ob_get_contents();
    wp_reset_postdata();
    ob_end_clean();
    return $return_string;
    


}
add_shortcode( 'ShowJobPostings', 'she_sc_job_postings' ); 


function she_custom_gallery_shortcode( $atts, $content = null  ){
            $a = shortcode_atts( array(
            'id' => 000,
        ), $atts );
    ob_start(); ?>
        </div>
        <?php // echo get_template_part('tcs-galleries-v2'); 
//        	$entries = get_post_meta( $a['id'], '_she_page_' . 'repeat_group', true );
            $counter = 0;
            $rowcounter = 0;
            $thisrow = 1;

//            foreach ( (array) $entries as $key => $entry ) {
//                $counter++;
//                $title = '';
//                //
//                if ( isset( $entry['title'] ) )
//                    $title = esc_html( $entry['title'] );
//
//                // Show Title
//                echo '<h2 class="text-left she-blue-text">'.$title.'</h2>';
//                echo '<br><BR><BR>';

                // Get Image Array
                //$mykey_values =  $entry['_she_page_page_gallery'];
                $mykey_values =  get_post_meta( $a['id'], '_she_page_page_gallery', FALSE );
                // Start container Div
                echo "<div id='tcs-gallery-" . $counter . "' class='tcs-gallery'>";
                echo "<div class='tcs-gallery-row-case tcs-gallery-row-case-".$thisrow."'>";
                $imgcounter = 0; 

                  foreach ( $mykey_values[0] as $key => $value) {
                      if($rowcounter == 0){
                          echo "<div class='tcs-gallery-row-case tcs-gallery-row-case-".$thisrow."'>";
                      }
                        $imgcounter++;
                        $rowcounter++;
                        $attachment_meta = get_post($key);
                        $smallerurl = wp_get_attachment_image_src($key,'gallery-image', true);
                        // if(isset($attachment_meta->post_excerpt)) {
                        // 	$caption = $attachment_meta->post_excerpt;
                        // }
                        echo "<div class='tcs-gallery-img-wrapper'>";
                        echo "<div style='background:url(" . $smallerurl[0] . ") no-repeat center; background-size:cover;' class='tcs-gallery-img tcs-gallery-row-".$thisrow." tcs-gallery-item-" . $imgcounter . "'>";
                        echo "<div class='tcs-gallery-inner'>";
                        echo "<a href='".$value ."' class='venobox tcs-gallery-link' data-gall='myGallery".$counter."' title='".$attachment_meta->post_excerpt."'>";
                        echo "</a>";
                        echo "</div>";

                        if($attachment_meta->post_excerpt !== ''){
                            echo "<div class='tcs-gallery-caption'>";
                            echo "<h3 class='uppercase'><strong>";
                            echo $attachment_meta->post_excerpt;
                            echo "</strong></h3>";
                            echo "</div>";
                        }
                        echo "</div>"; //End Img
                        echo "</div>"; //End Wrapper
                        // echo '<li><a href="'.$value.'" class="cboxModal" rel="lightbox[postID]">';
                        // echo '<img src="'.$value.'">';
                        // echo '</a></li>'; 
                        $endofrow = 0;
                        if($rowcounter == 9){
                            $thisrow++;
                            $rowcounter = 0;
                            $endofrow = 1;
                            echo "</div><!--End ROW-->";
                            
                        }
                      }
                    if($endofrow==0){
                        echo "</div><!--End ROW-->";
                    }	
                    echo "</div>";

                    echo "<div class='frame'>
                            <div class='bit-1'>
                                <br><BR><BR>
                            </div>
                        </div>";
                    $thisrow++;
                    $rowcounter = 0;



//            }//END MAJOR LOOP per gallery ?>
        <div class='box-padding page-defaults'>
    <?php
    $return_string = ob_get_contents();
    wp_reset_postdata();
    ob_end_clean();
    return $return_string;
}
add_shortcode( 'ShowGallery', 'she_custom_gallery_shortcode' ); 















// 
// Custom TinyMCE Buttons
// 
// Hooks your functions into the correct filters
function my_add_mce_button() {
    // check user permissions
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }
    // check if WYSIWYG is enabled
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
        add_filter( 'mce_buttons', 'my_register_mce_button' );
    }
}
add_action('admin_head', 'my_add_mce_button');

// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {
    $plugin_array['my_mce_button'] = get_template_directory_uri() .'/js/customshortcodes.js';
    return $plugin_array;
}

// Register new button in the editor
function my_register_mce_button( $buttons ) {
    array_push( $buttons, 'my_mce_button' );
    return $buttons;
}

//
//Removing Shortcodes from Excerpts
//
add_filter( 'the_excerpt', 'remove_media_credit_from_excerpt' );
function remove_media_credit_from_excerpt( $excerpt ) {
	return preg_replace ( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $excerpt);
}


?>