<?php


function she_dev_rental_communities_output() {
	// Creates Loop of Properties
		$args = array(
			'posts_per_page'   => 50,
			'offset'           => 0,
			'property_type'    => 'rental-communities',
			'orderby'          => 'title',
			'order'            => 'ASC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'she_property',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true,
		);

		$articles_array = get_posts( $args );
		global $post;
		foreach ( $articles_array as $post ) {
			$current_art      = $post->ID;
			$current_art_slug = $post->post_name;
			setup_postdata( $post );
			$curunits         = get_post_meta( get_the_ID(), '_she_property_total_units', true );
			$curaddress       = get_post_meta( get_the_ID(), '_she_property_address', true );
			$curcity          = get_post_meta( get_the_ID(), '_she_property_city', true );
			$curstate         = get_post_meta( get_the_ID(), '_she_property_state', true );
			$curzip           = get_post_meta( get_the_ID(), '_she_property_zip', true );
			$curgmapsoverride = get_post_meta( get_the_ID(), '_she_property_custom_gmap', true );
			if ( $curgmapsoverride != '' ) {
				$gmapslink = $curgmapsoverride;
			} else {
				$gmapslink = 'http://maps.google.com/?q=' . $curaddressmaps . ',+' . $curcitymaps . ',+' . $curstate . '+' . $curzip;
			}

			?>


				<div class="frame she-article-row" id="<?php echo $current_art_slug; ?>">
					<div class="bit-1">
						<div class="frame">
							<div class="bit-3 text-center">
								<div class="she-circular-image-thumb">

									<a href="#<?php echo $current_art_slug; ?>" class="art-toggle-btn-<?php echo $current_art; ?>"><?php the_post_thumbnail( 'she-circular-image', 'class=alignleft' ); ?></a>
								</div>

							</div>
							<div class="bit-3 ">
								<div class="box-padding-vert text-center">
									<h3><?php the_title(); ?></h3>
									<p><strong><?php echo $curcity . ', ' . $curstate; ?></strong></p>
								</div>

							</div>
							<div class="bit-3 ">
								<div class="box-padding-vert text-center">
									<a href="#<?php echo $current_art_slug; ?>" class="she-blue-ghost-btn text-right art-toggle-btn-<?php echo $current_art; ?>">LEARN MORE</a>
								</div>

							</div>
						</div>
						<div class="frame">
							<div class="bit-1">
								<div class="art-toggle-body-<?php echo $current_art; ?> box-padding" style="display:none">
									<?php if ( $curcity != '' && $curstate != '' ) { ?>
									<div class="frame">
										<div class="bit-1 text-right"> <p> <a href="<?php echo $gmapslink; ?>" target="new" class="she-blue-text">Visit on Google Maps</a></p></div>
									</div>

									<?php } ?>
									<p><?php echo $curunits; ?></p>
									<div class="text-right">
										<p><a href="<?php echo the_permalink(); ?>"><strong>Keep Reading...</strong></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="frame">
					<div class="bit-1">
						<br>
					</div>
				</div>


			<?php

		}
		wp_reset_postdata();
}
add_shortcode( 'she_new_rental', 'she_dev_rental_communities_output' );

