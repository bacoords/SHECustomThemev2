<?php
/**
 * CMB Theme Options
 * @version 0.1.0
 */

/**
 * Our admin class.
 */
class she_volunteer_admin {

	/**
	 * Option key, and option page slug
	 * @var string
	 */
	private $key = 'she_volunteer_options';

	/**
	 * Array of metaboxes/fields
	 * @var array
	 */
	protected $option_metabox = array();

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	public function __construct() {
		// Set our title.
		$this->title = __( 'Volunteer Form Locations', 'SHECustomThemev2' );

		// Set our CMB fields.
		$this->fields = array(
			array(
				'id'          => 'she_volunteer_repeat_group',
				'type'        => 'group',
				'description' => __( 'Save locations for front-end volunteer form.', 'cmb' ),
				'options'     => array(
					'group_title'   => __( 'Location {#}', 'cmb' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Location', 'cmb' ),
					'remove_button' => __( 'Remove Location', 'cmb' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => 'Location Title',
						'id'   => 'title',
						'type' => 'text',
					),
					array(
						'name' => 'Description',
						'description' => 'Write a short description for this Location',
						'id'   => 'description',
						'type' => 'textarea_small',
					),
					array(
						'name' => 'Location Latitude',
						'id'   => 'latitude',
						'type' => 'text',
					),
					array(
						'name' => 'Location Longitude',
						'id'   => 'longitude',
						'type' => 'text',
					),
				),
			),
		);
 	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
	}

	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb_options_page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb_metabox_form( $this->option_metabox(), $this->key ); ?>
		</div>
		<?php
	}

	/**
	 * Defines the theme option metabox and field configuration
	 * @since  0.1.0
	 * @return array
	 */
	public function option_metabox() {
		return array(
			'id'         => 'option_metabox',
			'title'      => 'Locations',
			'show_on'    => array(
				'key' => 'options-page',
				'value' => array(
					$this->key,
				),
			),
			'show_names' => true,
			'fields'     => $this->fields,
		);
	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {

		// Allowed fields to retrieve.
		if ( in_array( $field, array( 'key', 'fields', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}
		if ( 'option_metabox' === $field ) {
			return $this->option_metabox();
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

// Get it started.
$she_volunteer_admin = new she_volunteer_admin();
$she_volunteer_admin->hooks();

/**
 * Wrapper function around cmb_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function she_volunteer_get_option( $key = '' ) {
	global $she_volunteer_admin;
	return cmb_get_option( $she_volunteer_admin->key, $key );
}
