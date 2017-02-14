<?php get_header(); ?>
			


<?php if ( have_posts() ) : ?>

    <!-- Main Content -->    

	<article>
		
	
			<div class="frame she-blue-background">
				<div class="bit-1 text-center">
						<BR>
				       	<h1>Blog</h1>
						<BR><BR>
				</div>
				       
			</div>



			<div class="frame she-white-background">
				<div class="she-blue-triangle"></div>

		 		<div class="bit-2-of-3">
		 			<div class="box-padding">
                        <?php if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                        } ?><BR><BR><BR>
					<?php
										
					    // $args = array(
					    //     'posts_per_page'   => 5,
					    //     'offset'           => 0,
					    //     'category'         => 'newsandevents',
					    //     'orderby'          => 'post_date',
					    //     'order'            => 'DESC',
					    //     'include'          => '',
					    //     'exclude'          => '',
					    //     'meta_key'         => '',
					    //     'meta_value'       => '',
					    //     'post_type'        => 'post',
					    //     'post_mime_type'   => '',
					    //     'post_parent'      => '',
					    //     'post_status'      => 'publish',
					    //     'suppress_filters' => true );

					    // $articles_array = get_posts( $args );
					    // global $post;
					    // foreach ($articles_array as $post ) {
					    //     $current_art =  $post->ID;
					    //     $current_art_slug = $post->post_name;
					    //     setup_postdata($post);
					        ?>        
					            
<!-- Start of the main loop. -->
<?php while ( have_posts() ) : the_post();  ?>
                <div class="she-article-row">
                    <div class="frame">
                        <?php if ( has_post_thumbnail() ) { ?>
                        <div class="bit-3">


                            <?php the_post_thumbnail('thumbnail','class=alignleft'); ?>
                        </div>

                         <div class="bit-3">
                       <?php } else { ?>
                         <div class="bit-2-of-3">
                       <?php  } ?>


                            <h3><?php the_title(); ?></h3>
                            <h5><?php the_time('F j, Y'); ?></h5>
                        </div>
                        <div class="bit-3">

                            <div class="text-right">
                                <a href="<?php the_permalink(); ?>" class="she-blue-ghost-btn text-right">READ</a>
                            </div>
                        </div>
                    </div>

                    <div class="frame">
                        <div class="bit-1">
                            <BR><BR><BR><BR><BR>
                        </div>
                    </div>
                </div>
	<?php endwhile; ?>
	<!-- End of the main loop -->
                <div class="frame">
                    <div class="bit-1">
                        <div class="text-center blog-paginate">
                            <?php
                                global $wp_query;

                                $big = 999999999; // need an unlikely integer

                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $wp_query->max_num_pages
                                ) );
                                ?>

                            </div>
                        </div>
                    </div>
                </div>	
            </div>			
            <div class="bit-3">
                <div class="box-padding-right">
                    <?php dynamic_sidebar( 'widget_right_1' ); ?>

                </div>
            </div>
        </div>
			
	


	</article>



<?php else : ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

		<div class="frame"><div class="bit-1"><BR><BR><BR><BR><BR><BR><BR><BR><BR></div></div>

    <!-- End Main Content -->
<?php get_footer(); ?>