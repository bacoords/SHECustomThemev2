<?php
/*
Template Name: Contact Page Template
*/
?>
<?php get_header(); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<!-- Featured Image Header -->
	<?php if ( has_post_thumbnail() ) { 

		$posturl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>
        <!-- Feature Slider -->

	<div class="frame she-full-height-div she-blue-background text-center" style="background:url('<?php echo $posturl; ?>') no-repeat center; background-size:cover;" >
          <div class="bit-1">
	          <div class="she-feature-header"  data-top-top="transform:translate(0px,0px); opacity:1;" data-top-bottom="transform:translate(0px,200px); opacity:0;" >
	          	
				<h1 class="she-trans-blue"> <?php the_title(); ?></h1>
			</div>
		</div>
	</div>
    <div class="she-blue-triangle"></div>


      
	<?php
		} 
		else {
	?>
  <div class="frame  she-blue-background">
	<div class="bit-1">
		<div class="">
	    <BR><BR>
	      <h1 class="uppercase text-center"><?php the_title(); ?></h1>
	    <BR><BR></div>
    </div>
  </div>
	<?php

		}
	?>

    <!-- Main Content -->    



	<article>
	
	<div class="frame she-blue-background">
		<div class="bit-1">
			<div class="box text-center">







                <h4 class="tk-museo-sans"><strong>Phone: (559) 651-1000</strong></h4><BR>
				<h4 class="tk-museo-sans"><a href="mailto:info@selfhelpenterprises.org">info@selfhelpenterprises.org</a></h4><BR>
				<h4 class="tk-museo-sans"><strong>Fax: (559) 651-3634</strong></h4><BR>
				<div class="frame">
					<div class="bit-2">
						<div class="box">
							<h4 class="tk-museo-sans"><strong>Business Address</strong><BR>
				8445 W. Elowin Court<BR>
				Visalia, CA 93291</h4>
						</div>
					</div>
                    <div class="bit-2">
						<div class="box">
							<h4 class="tk-museo-sans"><strong>Mailing Address</strong><BR>
				P.O. Box 6520<BR>
				Visalia, CA 93290</h4>
						</div>
					</div>
				</div>
				
			
				
				<BR><BR><BR>
<!--
                <div class="frame">
                    <div class="bit-1">
                        <div class="box-padding">
                            <?php // the_content(); ?>
                        </div>
                    </div>
                </div>
-->
				
				
				<BR><BR><BR><BR>
			</div>
		</div>
	</div>
	<div class="frame">
	 <div class="she-blue-triangle"></div>
		<div class="bit-1">
			<div class="box">
				<h2 style="text-align: center;"><strong>CONNECT</strong></h2>
				<div class="frame">
				    <div class="bit-4 text-center"><a href="http://www.facebook.com/selfhelpenterprises" target="_blank">
                        <span class="she-icons__facebook"></span><span class="screen-reader-text">Facebook</span></a>
				    </div>
				    <div class="bit-4 text-center"><a href="http://www.linkedin.com/company/self-help-enterprises" target="_blank">
                        <span class="she-icons__linkedin"></span><span class="screen-reader-text">LinkedIn</span></a>
				    </div>
                    <div class="bit-4 text-center"><a href="http://visitor.r20.constantcontact.com/d.jsp?llr=xgxexupab&p=oi&m=1116313115863&sit=tut4q8oib&f=c3b373c6-daf4-4a53-9ac0-2cff4d91ceb1" target="_blank">
                        <span class="she-icons__newsletter"></span><span class="screen-reader-text">Newsletter</span></a>
				    </div>
                    <div class="bit-4 text-center"><a href="https://vimeo.com/user1983551" target="_blank">
                        <span class="she-icons__vimeo"></span><span class="screen-reader-text">Vimeo</span></a>
				    </div>
                </div>
				<BR><BR><BR><BR>
				<h2 style="text-align: center;"><strong>LOCATION</strong></h2>
				
                <div class="box-padding">
                    <div class="google-maps"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3213.71312468193!2d-119.38736368472277!3d36.34350198004511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809527a53ce408cf%3A0x8604f2e5f37feb40!2sSelf-Help+Enterprises!5e0!3m2!1sen!2sus!4v1503585872056" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                </div>
			</div>
		</div>
	</div>
	<div class="frame">
		<div class="bit-1">
			<BR><BR><BR><BR><BR><BR><BR><BR><BR>
		</div>
	</div>
	


	</article>


				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>    
    <!-- End Main Content -->
<?php get_footer(); ?>