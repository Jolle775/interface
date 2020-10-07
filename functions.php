<?php
/**
 * Interface functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Interface
 */

function add_theme_scripts() {
   
	wp_enqueue_script( 'jquery');

	
	wp_enqueue_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array('jquery'), true); // all the bootstrap javascript goodness
	
	wp_enqueue_script( 'j-easing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'chart', 'https://cdn.jsdelivr.net/npm/chart.js@2.8.0', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/chart-pie-demo.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'sb-admin', get_template_directory_uri() . '/js/sb-admin-2.js', array ( 'jquery' ), 1.1, true);
	  
  }
  add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'interface_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function interface_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Interface, use a find and replace
		 * to change 'interface' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'interface', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'interface' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'interface_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'interface_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function interface_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'interface_content_width', 640 );
}
add_action( 'after_setup_theme', 'interface_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function interface_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'interface' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'interface' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'interface_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function interface_scripts() {
	wp_enqueue_style( 'interface-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'interface-style', 'rtl', 'replace' );

	wp_enqueue_script( 'interface-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'interface_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';

}
require get_template_directory() . '/post-types/transactions.php';

require get_template_directory() . '/post-types/investors.php';
require get_template_directory() . '/post-types/projects.php';

/**
 * Generated by the WordPress Meta Box Generator at http://goo.gl/8nwllb
 */
class Rational_Meta_Box {
	private $screens = array(
		'projects'
	);



	private $fields = array(
		array(
			'id' => 'invest',
			'label' => 'invest',
			'type' => 'number',
		),
		array(
			'id' => 'user_id',
			'label' => 'User_ID',
			'type' => 'number',
		),

	);

	/**
	 * Class construct method. Adds actions to their respective WordPress hooks.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	/**
	 * Hooks into WordPress' add_meta_boxes function.
	 * Goes through screens (post types) and adds the meta box.
	 */
	public function add_meta_boxes() {
		foreach ( $this->screens as $screen ) {
			add_meta_box(
				'projects',
				__( 'projects', 'projects_for_user' ),
				array( $this, 'add_meta_box_callback' ),
				$screen,
				'advanced',
				'high'
			);
		}
	}

	/**
	 * Generates the HTML for the meta box
	 * 
	 * @param object $post WordPress post object
	 */
	public function add_meta_box_callback( $post ) {
		wp_nonce_field( 'projects_data', 'projects_nonce' );
		$this->get_transaction( $post );

		$this->get_user( );

	}

	/**
	 * Generates the field's HTML for the meta box.
	 */

public function get_user(){
	$users = get_users( array("roles" => "subscriber"));
	//var_dump($users);
}

public function get_transaction($post){
	$rd_args = array(
		'meta_key' => 'projects',
		'meta_value' => $post->ID,
		'post_type' => 'transaction'
	);
	//$rd_query = new WP_Query( $rd_args );

	$rd_query = get_posts( $rd_args );
	$output = '';

	foreach ($rd_query as $transaction) : 
		$label = '<label for="' . $transaction->post_title . '">' . $transaction->post_title  . '</label>';
		$user = get_user_by('ID', get_field('user',$transaction->ID) );
		var_dump($user->data->user_login);
	$td = sprintf(
		'<td><input %s id="%s" name="%s" type="%s" value="%s"></td>',
		$transaction->post_title,

		$transaction->post_title,
		$transaction->post_title,
		'number',
		get_field('invest',$transaction->ID)
	);
	
	$td = sprintf(
		'<td><input %s id="%s" name="%s" type="%s" value="%s"></td>',

		$transaction->post_title,
		$transaction->post_title,
		'projects',
		'text',
		$user->data->user_login,
	
		
	);
	$td .= sprintf(
		'<td><input %s id="%s" name="%s" type="%s" value="%s"></td>',
		$transaction->post_title,

		$transaction->post_title,
		$transaction->post_title,
		'number',
		get_field('invest',$transaction->ID)
	);

		$output .= $this->row_format( $label, $td );
	endforeach;
	echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';

}


 

	public function generate_fields( $post ) {
		
		$output = '';
		foreach ( $this->fields as $key => $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'projects_' . $field['id'], true );
			switch ( $field['type'] ) {
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$field['type'] !== 'color' ? 'class="regular-text"' : '',
						$field['id'],
						$key,
						$field['type'],
						$db_value
					);
			}
			$output .= $this->row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	/**
	 * Generates the HTML for table rows.
	 */
	public function row_format( $label, $input ) {

	





		return sprintf(
			'<tr><th scope="row">%s</th>%s</tr>',
			$label,
			$input
		);
	}
	/**
	 * Hooks into WordPress' save_post function
	 */
	public function save_post( $post_id ) {
		if ( ! isset( $_POST['projects_nonce'] ) )
			return $post_id;

		$nonce = $_POST['projects_nonce'];
		if ( !wp_verify_nonce( $nonce, 'projects_data' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		foreach ( $this->fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;
				}
				update_post_meta( $post_id, 'projects_' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'projects_' . $field['id'], '0' );
			}
		}
	}
}
new Rational_Meta_Box;



function get_the_invest($user_id,$project_id){
	$meta_query_args = array(
		'relation' => 'AND', // Optional, defaults to "AND"
		array(
			'key'     => 'projects',
				'value'   => $project_id,
			'compare' => '='
		),
		array(
			'relation' => 'AND',
			array(
				'key'     => 'user',
				'value'   => $user_id,
				'compare' => '='
			)
		)
	);
	$meta_query = new WP_Meta_Query( $meta_query_args );

	$rd_args = array(
		'meta_key' => 'user',
		'meta_value' => $user_id,
		'post_type' => 'transaction',
		'meta_query' =>$meta_query_args
	);
	//$rd_query = new WP_Query( $rd_args );

	$rd_query = get_posts( $rd_args );
$sum= 0;
	foreach ($rd_query as $transaction){
		$sum = $sum + get_field('invest', $transaction->ID);

	}
	return $sum;

}

function get_projects($user_id){

	$rd_args = array(
		'meta_key' => 'user',
		'meta_value' => $user_id,
		'post_type' => 'transaction',
	
		
		
	);
	//$rd_query = new WP_Query( $rd_args );

	$rd_query = get_posts( $rd_args );#	$projects_ids[]
	$projects_ids = array();


	foreach ($rd_query as $post):
		$projects_ids[] = get_field('projects', $post->ID);
	endforeach;
	$result = $projects_ids;

	$final  = array();

foreach ($result as $current) {

    if ( ! in_array($current, $final)) {
        $final[] = $current;
    }
}

	return $final;

}

function get_docs($user_id){

	$rd_args = array(
		'meta_key' => 'user',
		'meta_value' => $user_id,
		'post_type' => 'attachment',
	
	
	);
	//$rd_query = new WP_Query( $rd_args );

	$rd_query = get_posts( $rd_args );#	$projects_ids[]
	
	return $rd_query;

}






function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function special_nav_class( $classes, $item ){
	if( is_home() ){ 
	$classes[] = "special-class";
	}
	return $classes;
   }
   add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

   //Step 3 :  Add this function to functions.php file to apply .mdl-navigation__link to each a element 

function add_menuclass($ulclass) {
	return preg_replace('/<a/', '<a class="nav-link"', $ulclass, -1);
	}
	add_filter('wp_nav_menu','add_menuclass');


	register_activation_hook( __FILE__, 'wpse43054_activation' );
function wpse43054_activation() 
{
    $role = get_role( 'subscriber' );
    if( $role ) $role->remove_cap( 'read' );
}

register_deactivation_hook( __FILE__, 'wpse43054_deactivation' );
function wpse43054_deactivation() 
{
    $role = get_role( 'subscriber' );
    if( $role ) $role->add_cap( 'read' );
}

add_action( 'init', 'wpse43054_maybe_redirect' );
function wpse43054_maybe_redirect() 
{
    if( is_admin() && ! current_user_can( 'read' ) )
    {
        wp_redirect( home_url(), 302 );
        exit();
    }
}

add_filter( 'get_user_metadata', 'wpse43054_hijack_admin_bar', 10, 3 );
function wpse43054_hijack_admin_bar( $null, $user_id, $key )
{
    if( 'show_admin_bar_front' != $key ) return null;
    if( ! current_user_can( 'read' ) ) return 0;
    return null;
}

function login_redirect( $redirect_to, $request, $user ){
    return home_url();
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );


add_action( 'init', 'fb_init' );
function fb_init() {
    // this in a function for init-hook
   
	
}

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5f611364275d8',
		'title' => 'Transactions',
		'fields' => array(
			array(
				'key' => 'field_5f61136429567',
				'label' => 'USer',
				'name' => 'user',
				'type' => 'user',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '45',
					'class' => '',
					'id' => '',
				),
				'role' => '',
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'id',
			),
			array(
				'key' => 'field_5f61137361031',
				'label' => 'projects',
				'name' => 'projects',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '45',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'projects',
				),
				'taxonomy' => '',
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
			),
			array(
				'key' => 'field_5f611480376bd',
				'label' => 'invest',
				'name' => 'invest',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '9',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_5f64d80d1cb42',
				'label' => 'EndDatum',
				'name' => 'end_date',
				'type' => 'date_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'd/m/Y',
				'return_format' => 'd/m/Y',
				'first_day' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'transaction',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_5f64ae6a8d7ac',
		'title' => 'Transactions (copy)',
		'fields' => array(
			array(
				'key' => 'field_5f64ae6a8ef7e',
				'label' => 'USer',
				'name' => 'user',
				'type' => 'user',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '45',
					'class' => '',
					'id' => '',
				),
				'role' => '',
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'id',
			),
			array(
				'key' => 'field_5f64ae6a8efb7',
				'label' => 'projects',
				'name' => 'projects',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '45',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'projects',
				),
				'taxonomy' => '',
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'attachment',
					'operator' => '==',
					'value' => 'application/pdf',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_5f612d3c5a953',
		'title' => 'projects',
		'fields' => array(
			array(
				'key' => 'field_5f612d41e8d1a',
				'label' => 'Rendite',
				'name' => 'rendite',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5f61336fc365b',
				'label' => '',
				'name' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5f6133a2c365c',
						'label' => 'label',
						'name' => 'label',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5f64d672854a2',
						'label' => '',
						'name' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5f64d684854a3',
						'label' => 'value',
						'name' => 'value',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
				),
			),
			array(
				'key' => 'field_5f61367374a65',
				'label' => 'complete_invest',
				'name' => 'complete_invest',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'projects',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	endif;


	function fb_get_file( $file ) {

		$upload     = wp_upload_dir();
		$the_file   = $file; 
		$file       = $upload[ 'basedir' ] . '/' . $file;
		if ( !is_file( $file ) ) {
			status_header( 404 );
			die( '404 &#8212; File not found.' );
		}
		else {
			$image = get_posts( array( 'post_type' => 'attachment', 'meta_query' => array( array( 'key' => '_wp_attached_file', 'value' => $the_file ) ) ) );
			if ( 0 < count( $image ) && 0 < $image[0] -> post_parent ) { // attachment found and parent available
				if ( post_password_required( $image[0] -> post_parent ) ) { // password for the post is not available
					wp_die( get_the_password_form() );// show the password form 
				}
				$status = get_post_meta( $image[0] -> post_parent, '_inpsyde_protect_content', true );
	
				if ( 1 == $status &&  !is_user_logged_in() ) {
					wp_redirect( wp_login_url( $upload[ 'baseurl' ] . '/' . $the_file ) );
					die();
				}
			}
			else {
				// not a normal attachment check for thumbnail
				$filename   = pathinfo( $the_file );
				$images     = get_posts( array( 'post_type' => 'attachment', 'meta_query' => array( array( 'key' => '_wp_attachment_metadata', 'compare' => 'LIKE', 'value' => $filename[ 'filename' ] . '.' . $filename[ 'extension' ] ) ) ) );
				if ( 0 < count( $images ) ) {
					foreach ( $images as $SINGLEimage ) {
						$meta = wp_get_attachment_metadata( $SINGLEimage -> ID );
						if ( 0 < count( $meta[ 'sizes' ] ) ) {
							$filepath   = pathinfo( $meta[ 'file' ] );
							if ( $filepath[ 'dirname' ] == $filename[ 'dirname' ] ) {// current path of the thumbnail
								foreach ( $meta[ 'sizes' ] as $SINGLEsize ) {
									if ( $filename[ 'filename' ] . '.' . $filename[ 'extension' ] == $SINGLEsize[ 'file' ] ) {
										if ( post_password_required( $SINGLEimage -> post_parent ) ) { // password for the post is not available
											wp_die( get_the_password_form() );// show the password form 
										}
										die('dD');
										$status = get_post_meta( $SINGLEimage -> post_parent, '_inpsyde_protect_content', true );
	
										if ( 1 == $status &&  !is_user_logged_in() ) {
											wp_redirect( wp_login_url( $upload[ 'baseurl' ] . '/' . $the_file ) );
											die();
										}
									}
								}
							}
						}
					}
				}
			}
		}
		$mime       = wp_check_filetype( $file );
	
		if( false === $mime[ 'type' ] && function_exists( 'mime_content_type' ) )
			$mime[ 'type' ] = mime_content_type( $file );
	
		if( $mime[ 'type' ] )
			$mimetype = $mime[ 'type' ];
		else
			$mimetype = 'image/' . substr( $file, strrpos( $file, '.' ) + 1 );
	
		header( 'Content-type: ' . $mimetype ); // always send this
		if ( false === strpos( $_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS' ) )
			header( 'Content-Length: ' . filesize( $file ) );
	
		$last_modified = gmdate( 'D, d M Y H:i:s', filemtime( $file ) );
		$etag = '"' . md5( $last_modified ) . '"';
		header( "Last-Modified: $last_modified GMT" );
		header( 'ETag: ' . $etag );
		header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', time() + 100000000 ) . ' GMT' );
	
		// Support for Conditional GET
		$client_etag = isset( $_SERVER['HTTP_IF_NONE_MATCH'] ) ? stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) : false;
	
		if( ! isset( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) )
			$_SERVER['HTTP_IF_MODIFIED_SINCE'] = false;
	
		$client_last_modified = trim( $_SERVER['HTTP_IF_MODIFIED_SINCE'] );
		// If string is empty, return 0. If not, attempt to parse into a timestamp
		$client_modified_timestamp = $client_last_modified ? strtotime( $client_last_modified ) : 0;
	
		// Make a timestamp for our most recent modification...
		$modified_timestamp = strtotime($last_modified);
	
		if ( ( $client_last_modified && $client_etag )
			? ( ( $client_modified_timestamp >= $modified_timestamp) && ( $client_etag == $etag ) )
			: ( ( $client_modified_timestamp >= $modified_timestamp) || ( $client_etag == $etag ) )
			) {
			status_header( 304 );
			exit;
		}
	
		// If we made it this far, just serve the file
		readfile( $file );
		die();
	}

	add_filter( 'generate_rewrite_rules', 'fb_generate_rewrite_rules' );

function fb_generate_rewrite_rules( $wprewrite ) {
        $upload = wp_upload_dir();
        $path = str_replace( site_url( '/' ), '', $upload[ 'baseurl' ] );
        $wprewrite -> non_wp_rules = array( $path . '/(.*)' => 'index.php?file=$1' );
        return $wprewrite;
}
