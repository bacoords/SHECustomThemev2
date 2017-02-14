<?php get_header(); ?>
			




    <!-- Main Content -->    

	<article ng-app="app">
		
	
			<div class="small-12 she-blue-background text-center">
				        <BR>
				       	<h1>Current Projects</h1>
						<BR><BR>
			</div>
			<div class="small-12 she-white-background">
				<div class="she-blue-triangle"></div>

 				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="small-10 small-offset-1 medium-8 medium-offset-2">
						<div class="row">
							<div class="she-circular-image">
								<?php the_post_thumbnail('thumb','class=alignleft'); ?></div>
								<h2><?php the_title(); ?> <small><?php echo get_post_meta( get_the_ID(),'_she_property_total_units' , true ); ?> Units</small></h2>
								 <div ng-show="!art<?php the_ID(); ?>">
								 	<p><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>">Continue Reading</a></p>
								 </div>								

								 
						</div>
						<div class="row"><hr></div>
					</div>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
			</div>
			


	


	</article>

		<div class="row"><div class="small-12"><BR><BR><BR><BR><BR><BR><BR><BR><BR></div></div>
    
    <!-- End Main Content -->
<?php get_footer(); ?>