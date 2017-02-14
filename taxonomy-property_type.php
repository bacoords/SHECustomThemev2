<?php get_header(); ?>
			




    <!-- Main Content -->    

	<article>
		
	
			<div class="small-12 she-blue-background text-center">
				        <BR>
				       	<h1>Property Type</h1>
						<BR><BR>
			</div>
			<div class="small-12 she-white-background">
				<div class="she-blue-triangle"></div>

 				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="small-10 small-offset-1 medium-8 medium-offset-2">
						<div class="row she-circular-image">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb','class=alignleft'); ?></a><?php the_title('<h1>','</h1>' ); ?><BR><Br>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>">Read</a>
								
							
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