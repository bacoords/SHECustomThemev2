<?php get_header(); ?>

    <!-- Main Content -->    


        <!-- Feature Slider -->
      <section>

        <?php she_orbit_options_generate(); ?>

      </section>
        <!-- End Feature Slider -->



        <!-- Start Front Page Content (from options page)-->
            <?php    $content = of_get_option('front-content'); 
                echo $content;
                ?>
            
        <!-- End Front Page Content (from options page)-->


    <!-- What We Do Buttons -->
    <section  data-bottom-top="transform:translate(0px,100px);" data-top-top="transform:translate(0px,-100px);">
      <div class="frame she-blue-background"> 
        <div class="she-white-triangle">
          
        </div>
        
        <div class="bit-1 text-center">


        <BR><BR>

       
          <h1 class="text-center">What We Do</h1>
        

        <BR><BR>
      
       <div class="frame">
        <?php
             $programsid = of_get_option('menu_program');
              $mypages = get_pages( array( 'child_of' => $programsid, 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent' => $programsid ) );
              $counter = 0;
              foreach( $mypages as $page ) {    
                // $content = $page->post_content;
                // if ( ! $content ) // Check for empty page
                //   continue;
                $counter+=1;
                // $content = apply_filters( 'the_content', $content );
                ?>

                  <div class="bit-3">
                    <div class="she-circular-image text-center">

                      <a href="<?php echo get_permalink( $page->ID ); ?>">

                        <?php 
                        $imageblurb = get_post_meta( $page->ID, '_she_page_page_blurb_image', 1 );
                        $imageID = get_attachment_id_from_src($imageblurb);
                        $image = wp_get_attachment_image($imageID, 'she-circular-image');    
                        echo $image;
                        ?>

                        <h3><?php echo $page->post_title; ?></h3>

                      </a>

                      <p><?php echo get_post_meta( $page->ID, '_she_page_page_blurb', true ); ?></p>

                    </div>
                  </div>

                <?php
                  if($counter==3){
                    echo '</div><div class="frame">';
                    $counter = 0;
                  }
              } //end loop
              ?>
          </div>

        <div class="frame">
          <div class="bit-1">
            <BR><BR><BR><BR>
          </div>
        </div>

        </div>
        
          
          </div>

          <div class="she-blue-triangle">
            
          </div>
    </section>
        <!-- End What We Do Buttons -->





        <!-- Start Healthy Homes & Communities Section -->
    <section>
     <div class="frame">
         <div class="bit-1">
             <div class="box-padding">
                <h2 class="text-center">Healthy Homes &amp; Communities</h2>
                 <h4>Self-Help Enterprises has a long history of integrating healthy, sustainable development practices to create healthier, energy-efficient environments for community residents.</h4>
                 <BR><BR>
                 <h4>Learn more below about Self-Help Enterprises’ commitment to working with cities, counties and residents to improve health outcomes and reduce environmental impact.</h4>
             </div>
         </div>
     </div>
      <div class="frame">
          <div class="box">
            <div class="bit-3 she-circular-image text-center"  data-bottom-top="transform:translate(33%,0%);" data-top-top="transform:translate(0%,0%);">
              <BR><BR><BR>
            
              <a href="<?php echo get_site_url(); ?>/healthy-homes-communities/sustainability/"><span class="she-icons__houseleaf"></span><span class="screen-reader-text">Sustainability</span></a>

              <h4><strong>Sustainability</strong></h4>
              <p>Building homes that are energy efficient, use fewer resources, and are affordable.</p>
              
            </div>

            <div class="bit-3 she-circular-image text-center" data-bottom-top="transform:translate(0px,0px);" data-top-top="transform:translate(0px,0px);">
              <BR><BR><br>
             
             <a href="<?php echo get_site_url(); ?>/healthy-homes-communities/community-building/"><span class="she-icons__group"><span class="screen-reader-text">Community Building</span></span>
             </a>

              <h4><strong>Community Building</strong></h4>
              <p>Empowering people to become leaders in their community.</p>
              
            </div>

            <div class="bit-3 she-circular-image text-center"  data-bottom-top="transform:translate(-33%,0%);" data-top-top="transform:translate(0%,0%);">
              <BR><BR><br>
              
              <a href="<?php echo get_site_url(); ?>/healthy-homes-communities/health-and-wellness"><span class="she-icons__heart"></span><span class="screen-reader-text">Health &amp; Wellness</span></a>
              <h4><strong>Health &amp; Wellness</strong></h4>
              <p>Creating and supporting efforts to promote healthy homes and communities.</p>
              
            </div>
        </div>
      </div>
      <div class="frame">
        <div class="bit-1">
          <BR><BR><BR>
        </div>
      </div>
    </section>

        <!-- End Healthy Homes & Communities Section -->


      <!-- Start Featured Vimeo -->
      <?php 
         $vimeourl =  of_get_option('vimeo_code');
        //$vimeoid =  of_get_option('vimeo_code');
        //$vimeourl = 'http://vimeo.com/api/v2/video/' . $vimeoid . '.php';
        //$vimeocont = unserialize(file_get_contents($vimeourl));
        // $vimeothumb = $vimeocont[0]['thumbnail_large'];
          $vimeothumb = of_get_option('vimeo_featured_image');
       ?>
      <section>
      <div class="frame she-full-height-div she-blue-background she-blue-top-border"  style="background:url('<?php echo $vimeothumb; ?>') no-repeat center; background-size:cover;">
        <div class="she-blue-triangle"></div>
        <div class="bit-1"  data-bottom-top="transform:translate(0px,-100px); opacity:0;" data-top-top="transform:translate(0px,100px); opacity:1;">
 
              <div class="she-feature-header">
<!--                <a data-overlay="#0079c2" data-type="vimeo" href="http://www.vimeo.com/<?php echo $vimeourl; ?>" class="venobox text-center vimeo-tagline-header she-trans-blue"><h1 class="she-vimeotag"><?php echo of_get_option('vimeo_tagline_text'); ?></h1><h4><?php echo of_get_option('vimeo_sub_tagline_text'); ?></h4><BR><BR><h2>PLAY VIDEO &#x25b6;</h2><BR><BR></a>-->
            <span class="she-vimeo-overlay-link  text-center vimeo-tagline-header she-trans-blue"><h1 class="she-vimeotag"><?php echo of_get_option('vimeo_tagline_text'); ?></h1><h4><?php echo of_get_option('vimeo_sub_tagline_text'); ?></h4><BR><BR><h2>PLAY VIDEO &#x25b6;</h2><BR><BR></span>
          </div>
        </div>
       
      </div>

      </section>
        <!--Start Custom Overlay Frame-->
        <div class="frame she-vimeo-overlay-off">

            <div class="bit-1">
              <span class="she-vimeo-overlay-close uppercase">&#10005;</span>
               <div class="videoWrapper">
                    <iframe src="//player.vimeo.com/video/<?php echo $vimeourl; ?>" width="80%" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>

                </div>
        </div>
        <!--End Custom Overlay Frame-->

      <!-- End Featured Vimeo -->




    

      <!-- Start Featured Blog/Image Gallery -->
      <section>
<!-- Start Three Example -->
        <div class="frame she-full-height-div">
  
          <div class="bit-1 text-center">
            <BR><BR><BR><BR>
            
            <h2>On the Blog</h2>
            <BR><BR><BR><BR>
            <div class="frame">
            <?php
                $sticky = get_option( 'sticky_posts' );
                $args = array(
              'posts_per_page'   => 3,
              'offset'           => 0,
              'category'         => '',
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
              'suppress_filters' => true,
                'post__in'  => get_option( 'sticky_posts' ),
                'ignore_sticky_posts' => 1); 

              $blog_posts_array = get_posts( $args ); 

              foreach ( $blog_posts_array as $post ) : setup_postdata( $post ); ?>
              <div class="bit-3">
                <div class="box-padding text-left">
                    <?php 
                        if ( has_post_thumbnail() ) {
                          the_post_thumbnail('gallery-image');
                        }
                        else {
                            echo '<img src="'. get_template_directory_uri() . '/img/houseshort.jpg" alt="an image of a house">';
                        }
                    ?>
                  <div class="blog-blurb box-padding">
                    <h3><a href="<?php the_permalink(); ?>"><strong class="she-blue-text"><?php the_title(); ?></strong></a></h3>
                    <BR><BR>
                    <p><?php print_excerpt(150); ?></p>
                    <BR><BR>
                    <div class="text-right">
                    <a href="<?php the_permalink(); ?>" class="she-blue-ghost-btn text-right">Read More</a></div>
                    <BR><BR>
                  </div>
                </div>
              </div>
              <?php endforeach; 
              wp_reset_postdata();?>

            </div>
          </div>
        </div>
<!-- End Three Example -->



    <div class="frame">
      <div class="bit-1">
        <BR><BR><BR><BR><BR><BR>
      </div>
    </div>
  </section>
  <!-- End Featured Blog/Image Gallery -->
   
   
   
   
    <!--Begin Get Involved Section-->
<?php  $involvedthumb = of_get_option('involved_featured_image'); ?>
<div class="frame she-blue-background she-blue-top-border"  style="background:url('<?php echo $involvedthumb; ?>') no-repeat center; background-size:cover;">
   
    <div class="bit-1">
       <div class="she-blue-triangle"></div>
        <BR><BR>
        <div class="she-trans-blue box-padding text-center">
<!--             data-bottom-top="transform:translate(0px,-100px); opacity:0;" data-top-top="transform:translate(0px,100px); opacity:1;"-->
            <h4>There are many ways you can support our housing and community development efforts. From volunteering to a tax-deductible contribution to becoming a participant, you can join us in strengthening the communities we serve.</h4><BR>
            <a href="http://www.selfhelpenterprises.org/get-involved/" class="she-white-ghost-btn"><h2>Get Involved</h2></a>
            <BR><BR>
        </div>
         <BR><BR>
    </div>
   
</div>



<!--End Get Involved Section-->
    <!-- End Main Content -->
<?php get_footer(); ?>