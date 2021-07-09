<?php


function she_dev_rental_communities_output() {
	// Creates Loop of Properties.
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
	ob_start();
	?>
	<div class="she-rc-shortcode">
		<div class="frame">
			<div class="bit-4">
				<div class="box-padding">
					<h2 class="hefty-header">Search By:</h2>
				</div>
			</div>
			<div class="bit-4">
				<div class="box-padding">
					<button class="toggle-counties">County</button>
				</div>
			</div>
			<div class="bit-4">
				<div class="box-padding">
					<button class="toggle-cities">City</button>
				</div>
			</div>
			<div class="bit-4">
				<div class="box-padding">
					<input type="text" class="toggle-keyword" placeholder="Search Keyword">
				</div>
			</div>
		</div>
		<div class="she-rc-counties frame">
			<?php
			$counties = array(
				'Fresno County'     => 'Fresno County',
				'Kern County'       => 'Kern County',
				'Kings County'      => 'Kings County',
				'Madera County'     => 'Madera County',
				'Mariposa County'   => 'Mariposa County',
				'Merced County'     => 'Merced County',
				'Stanislaus County' => 'Stanislaus County',
				'Tulare County'     => 'Tulare County',
			);
			foreach ( $counties as $key => $value ) :
				?>
				<div class="bit-4">
					<div class="box-padding box-padding-vert">
						<button data-filter-county="<?php echo esc_attr( $key ); ?>" class="secondary"><?php echo esc_html( $value ); ?></button>
					</div>
					
				</div>
			<?php endforeach; ?>
		</div>

		<div class="she-rc-cities frame">
			<?php
			$cities = array();
			foreach ( $articles_array as $art_post ) {
				$cities[] = get_post_meta( $art_post->ID, '_she_property_city', true );
			}
			sort( $cities );
			$cities = array_unique( $cities );
			foreach ( $cities as $key => $value ) :
				?>
				<div class="bit-4">
					<div class="box-padding box-padding-vert">
						<button data-filter-city="<?php echo esc_attr( $value ); ?>" class="secondary"><?php echo esc_html( $value ); ?></button>
					</div>
					
				</div>
			<?php endforeach; ?>
		</div>
		<div class="frame">
			<?php
			foreach ( $articles_array as $post ) {
				$current_art      = $post->ID;
				$current_art_slug = $post->post_name;
				setup_postdata( $post );
				$curunits         = get_post_meta( $post->ID, '_she_property_total_units', true );
				$curaddress       = get_post_meta( $post->ID, '_she_property_address', true );
				$curcity          = get_post_meta( $post->ID, '_she_property_city', true );
				$curstate         = get_post_meta( $post->ID, '_she_property_state', true );
				$curcounty        = get_post_meta( $post->ID, '_she_property_county', true );
				$curzip           = get_post_meta( $post->ID, '_she_property_zip', true );
				$curgmapsoverride = get_post_meta( $post->ID, '_she_property_custom_gmap', true );
				$keywords         = array(
					get_the_title(),
					$curcity,
					$curcounty,
				);
				$keywords         = implode( ', ', $keywords );
				if ( $curgmapsoverride !== '' ) {
					$gmapslink = $curgmapsoverride;
				} else {
					$gmapslink = 'http://maps.google.com/?q=' . $curaddressmaps . ',+' . $curcitymaps . ',+' . $curstate . '+' . $curzip;
				}

				?>
					<div class="bit-4 she-article-column" id="<?php echo esc_attr( $current_art_slug ); ?>" data-city="<?php echo esc_attr( $curcity ); ?>" data-county="<?php echo esc_attr( $curcounty ); ?>" data-keyword="<?php echo esc_attr( $keywords ); ?>">
						<div class="she-article-row">
							<div class="she-rc-box">
								<div class="text-center">
									<a href="<?php echo get_the_permalink(); ?>">
										<span class="she-image-thumb">
											<?php the_post_thumbnail( 'large', '' ); ?>
										</span>
										<h3><?php the_title(); ?></h3>
									</a>
								</div>
							</div>
						</div>
					</div>

				<?php
			}
			?>
			</div>
			<div class="frame">
				<div class="bit-3">

					<div class="box-padding">
						<button class="she-rc-show-all">List all properties</button>
					</div>
				</div>
				<div class="bit-3"></div>
				<div class="bit-3"></div>
			</div>
		</div>
		<style>
			.she-rc-shortcode {
				margin-bottom: 20px;
			}
			.she-rc-shortcode .she-rc-box h3{ color: #fff;background-color: #0079c2; font-weight:bold; display: block; padding-bottom: 0px; }
			.she-rc-shortcode .she-rc-box a {display:block; }
			.she-rc-shortcode .she-rc-box a .she-image-thumb {display:block; height: 170px; overflow:hidden; }
			.she-rc-shortcode .she-rc-box a img {display:block;}
			.she-rc-shortcode .she-rc-box {margin: 10px;}
			.she-rc-shortcode button{
				-webkit-appearance: none;
				appearance: none;
				border:3px solid #0079c2;
				padding: 5px 15px;
				color: #fff;
				background-color: #0079c2;
				font-weight:bold;
				display: block;
				width: 100%;
				font-size: 22px;
				cursor: pointer;
			}
			.she-rc-shortcode button.secondary{
				border:3px solid #e8CB89;
				background-color: #e8CB89;
			}
			.she-rc-shortcode .she-rc-cities,
			.she-rc-shortcode .she-rc-counties{
				display: none;
			}
			/* .she-rc-shortcode .she-article-column{
				display: none;
			} */
			/* .she-rc-shortcode .she-article-column:nth-of-type(1n+4){
				display: none;
			} */
			.she-rc-shortcode button.active{
				border-color: #e8CB89;
			}
			.she-rc-shortcode button.secondary.active{
				border-color: #0079c2;
			}
			.she-rc-shortcode input{
				-webkit-appearance: none;
				appearance: none;
				border:3px solid #0079c2;
				padding: 5px 15px;
				color: #333;
				background-color: transparent;
				font-weight:bold;
				display: block;
				font-size: 22px;
			}
			</style>
			<script>

				jQuery('.toggle-counties').click(function(){
					jQuery(this).toggleClass('active');
					jQuery('.she-rc-counties').toggle();
				});
				jQuery('.toggle-cities').click(function(){
					jQuery(this).toggleClass('active');
					jQuery('.she-rc-cities').toggle();
				});
				jQuery('.she-rc-show-all').click(function(){
					jQuery('.she-article-column').show();
					jQuery('.she-rc-shortcode button').removeClass('active');
					jQuery('.she-rc-cities').hide();
					jQuery('.she-rc-counties').hide();
				});
				jQuery('[data-filter-county]').click(function(){
					var county = jQuery(this).data('filter-county');
					jQuery('[data-filter-county]').removeClass('active');
					jQuery(this).addClass('active');
					jQuery('.she-article-column').each(function(){
						if ( jQuery(this).data('county') == county ) {
							jQuery(this).show();
						} else {
							jQuery(this).hide();
						}
					});
				});
				jQuery('[data-filter-city]').click(function(){
					var city = jQuery(this).data('filter-city');
					jQuery('[data-filter-city]').removeClass('active');
					jQuery(this).addClass('active');
					jQuery('.she-article-column').each(function(){
						if ( jQuery(this).data('city') == city ) {
							jQuery(this).show();
						} else {
							jQuery(this).hide();
						}
					});
				});
				
				var wto;
				jQuery('.toggle-keyword').on('keyup', function() {
					clearTimeout(wto);
					wto = setTimeout(function() {
						var keyword = jQuery('.toggle-keyword').val().toLowerCase();
						console.log( 'keyword' );
						jQuery('.she-article-column').each(function(){
							if ( jQuery(this).data('keyword').toLowerCase().indexOf(keyword) > -1 ) {
								jQuery(this).show();
							} else {
								jQuery(this).hide();
							}
						});
					}, 500);
				});
			</script>
		<?php
		wp_reset_postdata();
		return ob_get_clean();
}
add_shortcode( 'she_new_rental', 'she_dev_rental_communities_output' );
