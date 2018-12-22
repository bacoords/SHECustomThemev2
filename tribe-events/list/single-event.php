<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
//$venue_details = tribe_get_venue_details();

$venue_details = array(
  'name' => get_the_title( tribe_get_venue_id( ) ),
  'address' => tribe_get_full_address()
);


// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>

<!-- Event Cost -->
<?php if ( tribe_get_cost() ) : ?>
	<div class="tribe-events-event-cost">
		<span><?php echo tribe_get_cost( null, true ); ?></span>
	</div>
<?php endif; ?>

<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>
<h2 class="tribe-events-list-event-title">
	<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
		<?php the_title() ?>
	</a>
</h2>
<?php do_action( 'tribe_events_after_the_event_title' ) ?>

<!-- Event Meta -->
<?php do_action( 'tribe_events_before_the_meta' ) ?>
<div class="tribe-events-event-meta">
	<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

		<!-- Schedule & Recurrence Details -->
		<div class="tribe-event-schedule-details">
			<?php echo tribe_events_event_schedule_details() ?>
		</div>

		<?php if ( $venue_details ) : ?>
			<!-- Venue Display Info -->
			<div class="tribe-events-venue-details">
				<?php echo implode( ', ', $venue_details ); ?>
				<?php
				if ( tribe_get_map_link() ) {
          //Custom Google Maps
           if ( tribe_get_venue_id( ) == '9116' ) {

             echo ' <a href="https://www.google.com/maps/place/Goshen+Village+Apartments/@36.3516783,-119.4137777,17z/data=!3m1!4b1!4m5!3m4!1s0x8095277b8c355d17:0x82f17203369e354a!8m2!3d36.351674!4d-119.411589" class="tribe-events-gmap" target="_blank">+ Google Map</a>';

           } elseif ( tribe_get_venue_id( ) == '9101' ) {

             echo ' <a href="https://www.google.com/maps/place/Self-Help+Enterprises/@36.3435143,-119.3873517,17z/data=!4m5!3m4!1s0x809527a53ce408cf:0x8604f2e5f37feb40!8m2!3d36.34351!4d-119.385163" class="tribe-events-gmap" target="_blank">+ Google Map</a>';

           } else {

               echo tribe_get_map_link_html();

           }
				}
				?>
			</div> <!-- .tribe-events-venue-details -->
		<?php endif; ?>

	</div>
</div><!-- .tribe-events-event-meta -->
<?php do_action( 'tribe_events_after_the_meta' ) ?>

<!-- Event Image -->
<?php echo tribe_event_featured_image( null, 'medium' ) ?>



<!-- Event Content -->
<?php do_action( 'tribe_events_before_the_content' ) ?>

<?php
if( tribe_event_in_category( 'sgma-calendar', $event_id ) ) {
	// function she_tribe_custom_excerpt_length( $length ) { return 100; }
	// add_filter( 'excerpt_length', 'she_tribe_custom_excerpt_length', 999 );
}
?>



<div class="tribe-events-list-event-description tribe-events-content">
	<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
	<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Find out more', 'the-events-calendar' ) ?> &raquo;</a>
</div><!-- .tribe-events-list-event-description -->
<?php
// remove_filter( 'excerpt_length', 'she_tribe_custom_excerpt_length');
do_action( 'tribe_events_after_the_content' );
