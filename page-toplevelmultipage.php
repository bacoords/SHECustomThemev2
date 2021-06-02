<?php
/*
Template Name: Top-Level Page Template (External Links Only)
*/
?>
<?php get_header(); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




    <!-- Generate Child Page Buttons -->
    <section>
      <div class="frame she-blue-background">


        <div class="bit-1">
          <br><BR>
          <h1 class="uppercase text-center"><?php the_title(); ?></h1>
          <BR><BR>
        </div>

      <div class="frame">

    <?php
      $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent'=>$post->ID, 'exclude'=>289 ) );

     if( is_page( 'news-multimedia' ) ){ $thisnews = FALSE; } else { $thisnews = TRUE; }
    if( is_page( array( 'community-development', 'emergency-services' ) ) ){ $two_col = TRUE; } else { $two_col = FALSE; }




      if(!$thisnews){ ?>
        <!-- SHOW MEDIA LINKS FOR NEWS PAGE -->
          <div class="bit-3">
            <div class="she-circular-image text-center">

              <a href="<?php echo get_site_url(); ?>/blog/">

                <img src="<?php echo get_template_directory_uri(); ?>/img/news/BlogPhoto.3.JPG" alt="Button" />

                <h3>Blog</h3>

              </a>
            </div>
          </div>
           <div class="bit-3">
            <div class="she-circular-image text-center">

              <a href="<?php echo get_site_url(); ?>/media-coverage/">

                <img src="<?php echo get_template_directory_uri(); ?>/img/news/Press.JPG" alt="Button" />

                <h3>Press</h3>

              </a>
            </div>
          </div>
           <div class="bit-3">
            <div class="she-circular-image text-center">

              <a href="<?php echo get_site_url(); ?>/annual-reports/">

                <img src="<?php echo get_template_directory_uri(); ?>/img/news/AnnualReport.3.JPG" alt="Button" />

                <h3>Annual Reports</h3>

              </a>
            </div>
          </div>
          </div><div class="frame">
            <div class="bit-3">
            <div class="she-circular-image text-center">

              <a href="<?php echo get_site_url(); ?>/newsletters/">

                <img src="<?php echo get_template_directory_uri(); ?>/img/Newsletter.JPG" alt="Button" />

                <h3>Newsletters</h3>

              </a>
            </div>
          </div>

            <div class="bit-3">
            <div class="she-circular-image text-center">

              <a href="<?php echo get_site_url(); ?>/photo-gallery/">

                <img src="<?php echo get_template_directory_uri(); ?>/img/news/PhotoGallery.JPG" alt="Button" />

                <h3>Photo Gallery</h3>

              </a>
            </div>
          </div>
     <!-- END EXTRA LINKS FOR MEDIA PAGE -->

       <?php

          $counter+=1;
        }
      foreach( $mypages as $page ) {
        // $content = $page->post_content;
        // if ( ! $content ) // Check for empty page
        //  continue;

        // $content = apply_filters( 'the_content', $content );
               $counter+=1;

                ?>
                <?php if ( $two_col) {
                  echo '<div class="bit-2">';
                } else {

                  echo '<div class="bit-3">';
                } ?>

                    <div class="she-circular-image text-center">

                      <a href="<?php echo get_permalink($page->ID); ?>">

                        <?php
                        // $imageblurb = get_post_meta( $page->ID, '_she_page_page_blurb_image', 1 );
                        // $imageID = get_attachment_id_from_src($imageblurb);

                        $image = wp_get_attachment_image(get_post_meta( $page->ID, '_she_page_page_blurb_image_id', 1 ), 'she-circular-image');    
                        echo $image;
                        ?>

                        <h3><?php echo $page->post_title; ?></h3>

                      </a>
                      <?php if($thisnews){ ?>
                        <p><?php echo get_post_meta( $page->ID, '_she_page_page_blurb', true ); ?></p>
                      <?php } ?>
                    </div>
                  </div>

                <?php
                if ( $two_col) {
                    if($counter==2){
                    echo '</div><div class="frame">';
                    $counter = 0;
                  }
                } else {
                  if($counter==3){
                    echo '</div><div class="frame">';
                    $counter = 0;
                  }

                }

     } ?>



        </div>
          <BR><BR><BR><BR><BR><BR><BR><BR>
      </div>
      <div class="frame she-border-bottom-white">
        <div class="bit-1">

        </div>
      </div>
    </section>
        <!-- End Child Page Buttons -->













				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
    <!-- End Main Content -->
<?php get_footer(); ?>
