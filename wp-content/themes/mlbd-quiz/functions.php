<?php
use function Tonik\Theme\App\template;
/*
 |------------------------------------------------------------------
 | Bootstraping a Theme
 |------------------------------------------------------------------
 |
 | This file is responsible for bootstrapping your theme. Autoloads
 | composer packages, checks compatibility and loads theme files.
 | Most likely, you don't need to change anything in this file.
 | Your theme custom logic should be distributed across a
 | separated components in the `/app` directory.
 |
 */

// Require Composer's autoloading file
// if it's present in theme directory.
if (file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    require $composer;
}

// Before running we need to check if everything is in place.
// If something went wrong, we will display friendly alert.
$ok = require_once __DIR__ . '/bootstrap/compatibility.php';

if ($ok) {
    // Now, we can bootstrap our theme.
    $theme = require_once __DIR__ . '/bootstrap/theme.php';

    // Autoload theme. Uses localize_template() and
    // supports child theme overriding. However,
    // they must be under the same dir path.
    (new Tonik\Gin\Foundation\Autoloader($theme->get('config')))->register();
}

// Add class to A element of .primary-menu
function mlbd_quiz_primary_menu_anchor_class($item_output, $item, $depth, $args) {
    $item_output = preg_replace('/<a /', '<a class="nav-link" ', $item_output, 1);
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'mlbd_quiz_primary_menu_anchor_class', 10, 4);

// Add class to LI element of .primary-menu
function mlbd_quiz_primary_menu_li_class($objects, $args) {
    foreach($objects as $key => $item) {
      $objects[$key]->classes[] = 'nav-item';
    }
    return $objects;
}
add_filter('wp_nav_menu_objects', 'mlbd_quiz_primary_menu_li_class', 10, 2);

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5e7e4297121ff',
        'title' => 'Event Settings',
        'fields' => array(
            array(
                'key' => 'field_5e7e42a2b633f',
                'label' => 'Questions',
                'name' => 'questions',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5e7e430ab6340',
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '100',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => 'Enter your question',
                        'prepend' => '',
                        'append' => '?',
                        'maxlength' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_5e80aa8049742',
                'label' => 'Expired date',
                'name' => 'expired_date',
                'type' => 'date_time_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y g:i a',
                'return_format' => 'd/m/Y g:i a',
                'first_day' => 6,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'event',
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

/**
 * Register a Event Result page.
 */
function wpdocs_register_my_custom_menu_page() {
  add_menu_page(
    __( 'Event Result', 'textdomain' ),
    'Event Result',
    'manage_options',
    'events/result.php',
    'make_event_result_page',
    '',
    // plugins_url( 'myplugin/images/icon.png' ),
    30,
  );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

function make_event_result_page(){
    if( !isset($_GET['post_id'])){
        template('admin/event_results');
    }else{
        template('admin/event_result');
    }
}

function create_default_pages(){
    if( ! post_exists_by_name('thank-you', 'page')){
        $new_page = array(
            'slug' => 'thank-you',
            'title' => 'Thank You',
            'content' => "<h3 class='th-content'>Thank You For your feedback",
        );
        $new_page_id = wp_insert_post( array(
            'post_title' => $new_page['title'],
            'post_type'     => 'page',
            'post_name'  => $new_page['slug'],
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_content' => $new_page['content'],
            'post_status' => 'publish',
            'post_author' => 1,
            'menu_order' => 0,
            'page_template'  => 'page-thankyou-template.php'
        ));
    }
    if( ! post_exists_by_name('link-expired', 'page')){
        $new_page = array(
            'slug' => 'link-expired',
            'title' => 'Link Expired',
            'content' => "<h3 class='th-content'>Thank you for coming here but this link has expired",
        );
        $new_page_id = wp_insert_post( array(
            'post_title' => $new_page['title'],
            'post_type'     => 'page',
            'post_name'  => $new_page['slug'],
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_content' => $new_page['content'],
            'post_status' => 'publish',
            'post_author' => 1,
            'menu_order' => 0,
            'page_template'  => 'page-expired-event-template.php'
        ));
    }
}
add_action( 'after_setup_theme', 'create_default_pages' );

function post_exists_by_name( $post_name, $post_type='post' ) {
	global $wpdb;

	$query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
	$args = array();

	if ( !empty ( $post_name ) ) {
	     $query .= " AND post_name LIKE '%s' ";
	     $args[] = $post_name;
	}
	if ( !empty ( $post_type ) ) {
	     $query .= " AND post_type = '%s' ";
	     $args[] = $post_type;
	}

	if ( !empty ( $args ) )
	     return $wpdb->get_var( $wpdb->prepare($query, $args) );

	return 0;
}