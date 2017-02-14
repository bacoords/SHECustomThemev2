<?php get_header(); ?>
			


<?php if ( have_posts() ) : ?>

    <!-- Main Content -->    

	<article>
		
	
			<div class="frame she-blue-background">
				<div class="bit-1 text-center">
						<BR>
				       	<h1>Photo Galleries</h1>
						<BR><BR>
				</div>
				       
			</div>



			<div class="frame she-white-background">
				<div class="she-blue-triangle"></div>

		 		<div class="bit-1">
		 			<div class="box-padding">
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
<?php $firstgallery = TRUE; ?>
<?php while ( have_posts() ) : the_post();  ?>
<?php 
    if ($firstgallery){
        echo the_title('<h2 class="she-blue-text">Featured: <strong>','</strong></h2><BR><BR></div></div></div>');
        get_template_part('tcs-galleries-v2');
        echo '<div class="frame"><div class="bit-1 box-padding"><h2>More Galleries</h2><br><BR></div></div><div class="frame">';
        $firstgallery = FALSE; 
    }else{ ?>

        <div class="bit-4">
           <div class="box-padding vimeo-thumbs">
               <a href="<?php the_permalink(); ?>">
                        <?php 
                        if ( has_post_thumbnail() ) {
                          the_post_thumbnail('thumbnail');
                        }
                        else {
                            echo '<img src="'. get_template_directory_uri() . '/img/houseshort.jpg" height="150" width="150">';
                        }
                    ?>
                    <h6><?php the_title(); ?></h6>
                </a>
            </div>
        </div>
              
            
    <?php }//End Else ?>
	<?php endwhile; ?>
    <div class="bit-4"></div>
    <div class="bit-4"></div>
    
    </div>
	<!-- End of the main loop -->



	</article>



<?php else : ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

		<div class="frame"><div class="bit-1"><BR><BR><BR><BR><BR><BR><BR><BR><BR></div></div>

    <!-- End Main Content -->
<?php get_footer(); ?>