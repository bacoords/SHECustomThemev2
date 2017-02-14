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
	<!-- Start The Description -->
			<div class="frame">
				<div class="bit-1">
					<div class="box-padding text-center">
						<div class="box-padding">
							<?php 
								$currunits = get_post_meta( get_the_ID(),'_she_property_total_units' , true );
								if ($currunits) {
									echo '<h3>' . $currunits . ' Units</h3><BR><BR><BR>';
								} 
                                global $she_template_is_property;

							 ?>
                            
							<p><?php the_content( ); ?></p>
						</div>
							
					</div>
				</div>
			</div>



		<!-- End The Description -->





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








		<!-- Start Google Map Embed -->
		
		
		<div class="frame">
			<div class="bit-1">
				<div class="box-padding text-center">
					

					<br><BR><BR><BR>
					<h4 class="text-center uppercase"><strong>Location</strong></h4>
					<hr>
					<BR><BR><BR>
												<?php 
						echo get_post_meta( get_the_ID(),'_she_property_address' , true ) . '<BR>'; 
						echo get_post_meta( get_the_ID(),'_she_property_city' , true ) . ', ';
						echo get_post_meta( get_the_ID(),'_she_property_state' , true ) . ' ';
						echo get_post_meta( get_the_ID(),'_she_property_zip' , true );
					?>
					<Br><BR><BR><BR>
					 <div class="google-maps"><iframe
						  width="800"
						  height="200"
						  frameborder="0" style="border:0"
						  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAF9M0oLUumyRJ-0NMlKt-rmXyik_4K7ag&q=<?php

//$curaddress = get_post_meta( get_the_ID(),'_she_property_address' , true ); 
//$curcity = get_post_meta( get_the_ID(),'_she_property_city' , true );
//$curstate = get_post_meta( get_the_ID(),'_she_property_state' , true );
//$curzip = get_post_meta( get_the_ID(),'_she_property_zip' , true );


						echo urlencode(get_post_meta( get_the_ID(),'_she_property_address' , true )) . '+'; 
						echo urlencode(get_post_meta( get_the_ID(),'_she_property_city' , true )) . ',';
						echo get_post_meta( get_the_ID(),'_she_property_state' , true ) . '+';
						echo get_post_meta( get_the_ID(),'_she_property_zip' , true );
					?>">
						</iframe></div>
					<br>
					<BR><BR><BR>
				</div>
			</div>
		</div>
		<!-- End Google Map Embed -->


		<!-- Begin PDF Download Link -->
		<div class="frame">
			<div class="bit-1">
				<div class="box-padding text-center">
					<?php $pdflink = get_post_meta( get_the_ID(),'_she_property_pdf' , true ); 
						$contemail = get_post_meta( get_the_ID(),'_she_property_email' , true );
						$contphone = get_post_meta( get_the_ID(),'_she_property_phone' , true );
					?>

					<h4 class="text-center uppercase"><strong>More Information</strong></h4>
					<hr>
					<?php if(!empty($contemail)){ ?>
					Email: <a href="mailto:<?php echo $contemail; ?>" target="new"><?php echo $contemail; ?></a><BR><BR>
					<?php } ?>	
					<?php if(!empty($contphone)){ ?>
					Phone: <?php echo $contphone ?><BR><BR>
					<?php } ?>	

					<?php if(!empty($pdflink)){ ?>
					<a href="<?php echo $pdflink; ?>" class="she-blue-ghost-btn" target="new">DOWNLOAD PDF</a>
					<?php } ?>	
					<BR><BR><BR><BR><BR><BR>			
				</div>
			</div>
		</div>

		<!-- End PDF Download Link -->




		













	</article>


				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>    
    <!-- End Main Content -->





<?php get_footer(); ?>
