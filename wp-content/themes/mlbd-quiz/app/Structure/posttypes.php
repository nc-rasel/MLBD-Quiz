<?php

namespace Tonik\Theme\App\Structure;

/*
|-----------------------------------------------------------
| Theme Custom Post Types
|-----------------------------------------------------------
|
| This file is for registering your theme post types.
| Custom post types allow users to easily create
| and manage various types of content.
|
*/

use function Tonik\Theme\App\config;

/**
 * Registers `Event` custom post type.
 *
 * @return void
 */
function register_event_post_type()
{
    register_post_type('event', [
        'description' => __('Event.', config('textdomain')),
        'public' => true,
        'supports' => ['title', 'editor'],
        'labels' => [
            'name' => _x('Event', 'post type general name', config('textdomain')),
            'singular_name' => _x('Event', 'post type singular name', config('textdomain')),
            'menu_name' => _x('Event', 'admin menu', config('textdomain')),
            'name_admin_bar' => _x('Event', 'add new on admin bar', config('textdomain')),
            'add_new' => _x('Add New', 'event', config('textdomain')),
            'add_new_item' => __('Add New Event', config('textdomain')),
            'new_item' => __('New Event', config('textdomain')),
            'edit_item' => __('Edit Event', config('textdomain')),
            'view_item' => __('View Event', config('textdomain')),
            'all_items' => __('All Event', config('textdomain')),
            'search_items' => __('Search Event', config('textdomain')),
            'parent_item_colon' => __('Parent Event:', config('textdomain')),
            'not_found' => __('No Event found.', config('textdomain')),
            'not_found_in_trash' => __('No Event found in Trash.', config('textdomain')),
        ],
    ]);
}
add_action('init', 'Tonik\Theme\App\Structure\register_event_post_type');


/**
 * Registers `Question` custom post type.
 *
 * @return void
 */
// function register_question_post_type()
// {
//     register_post_type('Question', [
//         'description' => __('Question.', config('textdomain')),
//         'public' => true,
//         'supports' => ['title', 'editor'],
//         'labels' => [
//             'name' => _x('Question', 'post type general name', config('textdomain')),
//             'singular_name' => _x('Question', 'post type singular name', config('textdomain')),
//             'menu_name' => _x('Question', 'admin menu', config('textdomain')),
//             'name_admin_bar' => _x('Question', 'add new on admin bar', config('textdomain')),
//             'add_new' => _x('Add New', 'Question', config('textdomain')),
//             'add_new_item' => __('Add New Question', config('textdomain')),
//             'new_item' => __('New Question', config('textdomain')),
//             'edit_item' => __('Edit Question', config('textdomain')),
//             'view_item' => __('View Question', config('textdomain')),
//             'all_items' => __('All Question', config('textdomain')),
//             'search_items' => __('Search Question', config('textdomain')),
//             'parent_item_colon' => __('Parent Question:', config('textdomain')),
//             'not_found' => __('No Question found.', config('textdomain')),
//             'not_found_in_trash' => __('No Question found in Trash.', config('textdomain')),
//         ],
//     ]);
// }
// add_action('init', 'Tonik\Theme\App\Structure\register_question_post_type');