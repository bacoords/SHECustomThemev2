<?php
/*
Template Name: Top-Level Page Template (One Page Scroller)
*/
    global $she_set_smooth_scroll_script;

    $she_set_smooth_scroll_script = true;

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

      <div class="frame she-blue-background">

		<?php
			$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent'=>$post->ID, 'exclude'=>289 ) );

			foreach( $mypages as $page ) {
				// $content = $page->post_content;
				// if ( ! $content ) // Check for empty page
				// 	continue;

				// $content = apply_filters( 'the_content', $content );
               $counter+=1;

                ?>

                  <div class="bit-3">
                    <div class="she-circular-image text-center">

                      <a href="#<?php echo $page->post_name; ?>">

                        <?php
                        // $imageblurb = get_post_meta( $page->ID, '_she_page_page_blurb_image', 1 );
                        // $imageID = get_attachment_id_from_src($imageblurb);
                        $image = wp_get_attachment_image(get_post_meta( $page->ID, '_she_page_page_blurb_image_id', 1 ), 'she-circular-image');
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
		 } ?>



        </div>
          <BR><BR><BR><BR>
      </div>

    </section>
        <!-- End Child Page Buttons -->






    <!-- Main Content Parent Page-->
		<div class="frame she-white-background">
			<div class="bit-1">
				<div class="box-padding page-defaults">
					<!-- Main Parent Page Content (if any) -->
					<?php the_content(); ?>
					<BR><BR><BR><BR>
				</div>
			</div>
		</div>
	<!-- End Mail Content -->


	<!-- Start Child Page Loop -->
	<?php
		$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'parent'=>$post->ID ) );

		foreach( $mypages as $page ) {

		?>
				<article>
			<!-- Start the Header for Each Page -->
					<?php
					 	if ( has_post_thumbnail($page->ID) ) {

					 		$posturl = wp_get_attachment_url( get_post_thumbnail_id($page->ID) );
					 		?>

						<div class="frame">
							<div class="bit-1">

									<div id="<?php echo $page->post_name; ?>"  class="she-full-height-div she-blue-background text-center" style="background:url('<?php echo $posturl; ?>') no-repeat center; background-size:cover;">
						         		 <div class="she-feature-header" data-bottom-top="transform:translate(0px,-100px);" data-top-bottom="transform:translate(0px,100px);">
								          	<BR><BR><BR>
											<h1  class="she-trans-blue "> <?php echo $page->post_title; ?></h1>

										</div>
									</div>
						     	 <div class="she-blue-triangle"></div>

					    </div>
					  <?php } else { ?>
					<div class="frame">
						<div class="bit-1">
                            <div class="box-padding">
                                <div class="she-border-bottom-blue">
                                    <h2 id="<?php echo $page->post_name; ?>" class="text-center she-blue-text uppercase hefty-header"><?php echo $page->post_title; ?></h2>
                                </div>
				            </div>
							<div class="she-blue-triangle-mini"></div>
						</div>
					</div>
					<?php  } ?>




			<!-- End the Header for Each Page -->



			<!-- Begin Content For each Page -->

			<div class="frame">
				<div class="bit-1">
									 <?php $content = $page->post_content;
			if ( ! $content ) // Check for empty page
				continue;

			$content = apply_filters( 'the_content', $content ); ?>

						<div class="box-padding page-defaults"><?php echo $content; ?></div>

				</div>
			</div>
			<div class="frame">
				<div class="bit-1">
					<BR><BR><BR><BR><BR>
				</div>
			</div>
			</article>

			<!-- End Content For each Page -->


				<?php
				}
			?>
		<!-- End Child Page Loop -->




	</div>







				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
    <!-- End Main Content -->
<?php get_footer(); ?>
