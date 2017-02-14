<?php get_header(); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




    <!-- Main Content -->    

	<article>
		
	<!-- Start Title -->
			<div class="frame ">
				<div class="bit-1">
			        <BR>
			        <h1 class="text-center"><?php the_title(); ?></h1>
			        	
					<BR><Br>
				</div>	
			</div>
	<!-- End Title -->




		<!-- Start Gallery of Featured Images -->
		<div class="frame">
			<div class="bit-1">
				<BR><BR><BR><BR><BR>
			<?php 
				// $mykey_values = get_post_meta( get_the_ID(),'_she_property_image_gallery', FALSE);
				  
				  
				//   foreach ( $mykey_values[0] as $key => $value) {
				//   		$imgsrc .= $key . ',';
				  		
				// 	    // echo '<li><a href="'.$value.'" class="cboxModal" rel="lightbox[postID]">';
				// 	    // echo '<img src="'.$value.'">';
				// 	    // echo '</a></li>'; 
				// 	  }	
				// 	  $newimgsrc = substr_replace($imgsrc ,"",-1);
				// 	  $gallerystring = '[gallery ids="' . $newimgsrc . '" size="large" link="file"]';
					 
				// 	  echo do_shortcode($gallerystring);
			 ?>
			<?php get_template_part('tcs-galleries-v2'); ?>
			</div>
		</div>
		<!-- End Gallery of Featured Images -->


	</article>


				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>    
    <!-- End Main Content -->

<div class="frame">
    <div class="bit-1">
        <div class="text-center">
            <a href="<?php echo get_site_url(); ?>/photo-gallery/" class="she-blue-ghost-btn">Return to Galleries</a>
            <BR><BR><BR>
        </div>
    </div>
</div>



<?php get_footer(); ?>
