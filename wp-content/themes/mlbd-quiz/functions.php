<?php

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
        'title' => 'Event Question Set',
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