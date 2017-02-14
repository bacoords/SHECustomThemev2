<?php
//
// Overrides for all The Events Calendar Hooks
//

// Rename 'Events' to 'Classes'
// Singular
add_filter( 'tribe_event_label_singular', 'she_tec_event_display_name' );
function she_tec_event_display_name() {
	return 'Class';
}
add_filter( 'tribe_event_label_singular_lowercase', 'she_tec_event_display_name_lowercase' );
function she_tec_event_display_name_lowercase() {
	return 'class';
}
// Plural
add_filter( 'tribe_event_label_plural', 'she_tec_event_display_name_plural' );
function she_tec_event_display_name_plural() {
	return 'Classes';
}
add_filter( 'tribe_event_label_plural_lowercase', 'she_tec_event_display_name_plural_lowercase' );
function she_tec_event_display_name_plural_lowercase() {
	return 'classes';
}


//
function she_tec_related_posts_args_limiter ( $args = array() ) {
    global $post;
    $event_start_date = strtotime( $post->EventStartDate );
    $event_end_date = strtotime( $post->EventEndDate );
    $date_format = Tribe__Events__Date_Utils::DBDATETIMEFORMAT;
    $args['eventDisplay'] = 'custom';
    $args['start_date'] = date_i18n(
        $date_format,
        $event_start_date
    );
    $args['end_date'] = date_i18n(
        $date_format,
        strtotime( '+12 month', $event_end_date )
    );
    return $args;
}
add_filter( 'tribe_related_posts_args', 'she_tec_related_posts_args_limiter', 10, 1 );






//
// Add our custom 'multiple dates' to any display of dates.
//
add_filter( 'tribe_events_event_schedule_details', 'she_tec_append_recurring_info_dates', 9, 2 );

function she_tec_append_recurring_info_dates( $schedule_details, $event_id = 0 ) {

  if ( empty( $event_id ) ) {
    
    $event_id = get_the_ID();
    
  }
    
  $inner = '';
  
  $fields = get_post_meta( $event_id, 'she_tec_addit_dates', true );

  if ( isset( $fields ) && ! empty( $fields ) && is_array( $fields ) ) :

    foreach ( (array) $fields as $key => $entry ) {

      $inner .= '<div class="she-tec-upcoming-dates">';
      
      if ( isset( $entry['date'] ) )
        $inner .= '' . $entry['date'];
      
      if ( isset( $entry['start_time'] ) ) :
        $inner .= ' @ ' . date('g:i a', strtotime( $entry['start_time'] ) );
      else :
        $inner .= ' @ ' . tribe_get_start_time($event_id);
      endif;
      
      if ( isset( $entry['end_time'] ) ) :
        $inner .= ' - ' . date('g:i a', strtotime( $entry['end_time'] ) );
      else :
        $inner .= ' - ' . tribe_get_end_time($event_id);
      endif;
      
     $inner .= '</div>';
    }

  endif;
  
  if ( tribe_event_is_multiday($event_id) ) :
    return $inner;
  else : 
    return $schedule_details . $inner;
  endif;
}

// *****************
// Output Value of Additional Field
// $sep   Can add default separator
function she_tec_output_additional_date($sep = '<BR>'){
  
   if ( empty( $event_id ) ) {
    
    $event_id = get_the_ID();
    
  }
    
  $fields = get_post_meta( $event_id, 'she_tec_addit_dates', true );

  if ( isset( $fields ) && ! empty( $fields ) && is_array( $fields ) ) :
  
    $sep_counter = 0;

    foreach ( (array) $fields as $key => $entry ) {

      $date = $start_time = $end_time = '';

      if ( isset( $entry['date'] ) ) :
        
        if($sep_counter > 0)
          echo $sep;
      
        echo $entry['date'];

        if ( isset( $entry['start_time'] ) ) :
         echo ' @ ' . date('g:i a', strtotime( $entry['start_time'] ) );
        else :
         echo ' @ ' . tribe_get_start_time($event_id);
        endif;

        if ( isset( $entry['end_time'] ) ) :
         echo ' - ' . date('g:i a', strtotime( $entry['end_time'] ) );
        else :
         echo ' - ' . tribe_get_end_time($event_id);
        endif;

      
        $sep_counter++;
      
      endif;

  }

  endif;
  
}


/**
  *
  * Determine Additional Date is Set.
  */
function she_tec_has_additional_date(){
  
  if ( empty( $event_id ) ) {
    
    $event_id = get_the_ID();
    
  }
    
  $fields = get_post_meta( $event_id, 'she_tec_addit_dates', true );


  if ( isset( $fields ) && ! empty( $fields ) && is_array( $fields ) ) :

       return true;

  endif;
  
  return false;
}



// Use CMB For additional fields

function she_tec_metabox( $meta_boxes ) {
  $prefix = 'she_tec_'; // Prefix for all fields
  $meta_boxes['tec_event'] = array(
    'id' => 'she_tec_metabox',
    'title' => 'Display Dates & Times for Multiday Events',
    'pages' => array('tribe_events'), // post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'fields' => array(
      array(
      'id'          => $prefix . 'addit_dates',
      'type'        => 'group',
      'description' => __( 'For events that span multiple dates, use the TIME & DATE section above to set the span of time you\'d like the event to appear on the calendar. Also, set the time to \'All Day Event\'. Use the fields below to add the specific dates and meeting times. ', 'cmb2' ),
      'options'     => array(
          'group_title'   => __( 'Date {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
          'add_button'    => __( 'Add Another Date', 'cmb2' ),
          'remove_button' => __( 'Remove Date', 'cmb2' ),
          'sortable'      => false, // beta
      ),
      // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
      'fields'      => array(
        array(
          'name' => 'Date',
          'id'   => 'date',
          'type' => 'text_date',
        ),
        array(
          'name' => 'Start Time',
          'id'   => 'start_time',
//          'description' => 'Optional. If different from main event date.',
          'type' => 'text_time',
          'time_format' => 'g:i a',
        ),
        array(
          'name' => 'End Time',
          'id'   => 'end_time',
//          'description' => 'Optional. If different from main event date.',
          'type' => 'text_time',
          'time_format' => 'g:i a',
        ),
      ),
    ),
    ),
  );

  return $meta_boxes;
}

add_filter( 'cmb_meta_boxes', 'she_tec_metabox' );


/*
  * 
  */
function tec_enqueue_admin_css($hook) {
    if ( ( 'post.php' != $hook ) && ( 'post-new.php' != $hook ) ) {
        return;
    }

    wp_register_style( 'tec_custom_wp_admin_css', get_template_directory_uri() . '/css/tecoverrides-admin.css', false, '1.0.0' );
    wp_enqueue_style( 'tec_custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'tec_enqueue_admin_css' );