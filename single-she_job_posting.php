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


							 ?>

							<p><?php the_content( ); ?></p>
						</div>
							
					</div>
				</div>
			</div>


<div class="frame">
	<div class="bit-1 she-border-bottom-gray">
		<BR><BR><BR><BR><BR><BR>
	</div>
</div>
		<!-- End The Description -->


<div class="frame">
	<div class="bit-1-of-3">
		<div class="box-padding box-padding-vert" style="padding-left:20%;">

			<a href="<?php echo get_post_meta(get_the_ID(), '_she_career_jobapp',TRUE); ?>" class="she-blue-ghost-btn" target="_blank">APPLY NOW</a>
			<BR><BR><BR>
			<h3 class="she-blue-text"><strong>Our Benefits</strong></h3>
			<ul class="no-bullet she-blue-text career-sidebar">
				<li>Medical Insurance </li>
				<li>Dental &amp; Vision Insurance</li>
				<li>Sick Leave</li>
				<li>Flexible Spending Account</li>
				<li>Group Life Insurance</li>
				<li>Long- term Disability</li>
				<li>Health/Fitness Club</li>
			</ul>
			<BR><BR><BR>
			<h3 class="she-blue-text"><strong>Retirement</strong></h3>
			<ul class="no-bullet she-blue-text career-sidebar">
				<li>401K and Employer Match</li>
			</ul>
			<BR><BR><BR>
			<h3 class="she-blue-text"><strong>More</strong></h3>
			<ul class="no-bullet she-blue-text career-sidebar">
				<li>Paid Holidays</li>
				<li>Education Assistance</li>
				<li>Computer Purchase Loan</li>
				<li>Employee Assistance Program</li>
				<BR><BR><BR>
				<li>EQUAL OPPORTUNITY EMPLOYER</li>
			</ul>
			
			
			
			
		</div>
	</div>
	<div class="bit-2-of-3">
		<div class="box-padding box-padding-vert career-list she-border-left-gray">
			<h2><strong>Responsibilities</strong></h2>
			<BR>
			<?php echo wpautop(get_post_meta( get_the_ID(), '_she_career_responsibilities', true) ); ?>
			<BR><BR><BR>
			<h2><strong>Must Haves</strong></h2>
			<BR>
			<?php echo wpautop(get_post_meta( get_the_ID(), '_she_career_must_haves', true) ); ?>
			<BR><BR><BR>
			<h2><strong>Skills</strong></h2>
			<BR>
			<?php echo wpautop(get_post_meta( get_the_ID(), '_she_career_skills', true) ); ?>
			<BR><BR><BR>
		</div>
	</div>
</div>












<div class="frame">
	<div class="bit-1">
		<BR><BR><BR><BR><BR><BR>
	</div>
</div>

	</article>


				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>    
    <!-- End Main Content -->





<?php get_footer(); ?>
