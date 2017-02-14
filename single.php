<?php get_header(); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




    <!-- Main Content -->    

	<article>
		
	
			<div class="frame she-blue-background">
				<div class="bit-1">
				        <BR>
						<?php the_title('<h1 class="text-center">','</h1>' ); ?><BR><Br>
						 
				</div>
			</div>
			<div class="frame she-white-background">
				<div class="she-blue-triangle"></div>

 
					<div class="bit-2-of-3">
						<div class="box-padding page-defaults">
						<?php if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb('<h5 id="breadcrumbs">','</h5>');
                        } ?><BR><BR><BR>
                            <?php the_title('<h2><strong>','</strong></h2>' ); ?>
							<?php the_post_thumbnail('large'); ?>
							<BR><BR>
						 <h5>Posted on <?php the_time('F j, Y'); ?></h5>
						 <BR><BR>
							<?php the_content(); ?>							
						</div>

					</div>
					<div class="bit-3">
						<div class="box-padding-right">
							<?php dynamic_sidebar( 'widget_right_1' ); ?>

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