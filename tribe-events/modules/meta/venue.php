<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<div class="tribe-events-meta-group tribe-events-meta-group-venue">
	<h3 class="tribe-events-single-section-title"> <?php esc_html_e( tribe_get_venue_label_singular(), 'the-events-calendar' ) ?> </h3>
	<dl>
		<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

		<dd class="tribe-venue"> <?php echo get_the_title( tribe_get_venue_id( ) ); ?> </dd>

		<?php if ( tribe_address_exists() ) : ?>
			<dd class="tribe-venue-location">
				<address class="tribe-events-address">
					<?php echo tribe_get_full_address(); ?>

					<?php if ( tribe_show_google_map_link() ) : ?>
						
<!--      Custom Google Maps-->
            <?php if ( tribe_get_venue_id( ) == '9116' ) : ?>
             
              <a href="https://www.google.com/maps/place/Goshen+Village+Apartments/@36.3516783,-119.4137777,17z/data=!3m1!4b1!4m5!3m4!1s0x8095277b8c355d17:0x82f17203369e354a!8m2!3d36.351674!4d-119.411589" class="tribe-events-gmap" target="_blank">+ Google Map</a>
              
            <?php elseif ( tribe_get_venue_id( ) == '9101' ) : ?>
             
              <a href="https://www.google.com/maps/place/Self-Help+Enterprises/@36.3435143,-119.3873517,17z/data=!4m5!3m4!1s0x809527a53ce408cf:0x8604f2e5f37feb40!8m2!3d36.34351!4d-119.385163" class="tribe-events-gmap" target="_blank">+ Google Map</a>
            
            <?php else : ?>
						
              <?php  echo tribe_get_map_link_html(); ?>
              
            <?php endif; ?>
					<?php endif; ?>
      
				</address>
			</dd>
		<?php endif; ?>

		<?php if ( ! empty( $phone ) ): ?>
			<dt> <?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?> </dt>
			<dd class="tribe-venue-tel"> <?php echo $phone ?> </dd>
		<?php endif ?>

		<?php if ( ! empty( $website ) ): ?>
			<dt> <?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> </dt>
			<dd class="url"> <?php echo $website ?> </dd>
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
	</dl>
</div>
