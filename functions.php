<?php
require get_theme_file_path() . '/inc/post-types-taxonomies.php';

function school_enqueues()
{
  wp_enqueue_style(
        'school-normalize',
        get_stylesheet_uri('/assets/styles/normalize.css'),
        array(),
        wp_get_theme()->get('Version'),
        'all'
  );

  wp_enqueue_style(
        'school-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version'),
        'all'
  );
}

add_action('wp_enqueue_scripts', 'school_enqueues');



wp_register_style('animate-on-scroll-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css');

wp_enqueue_style('animate-on-scroll-style');

wp_register_script('animate-on-scroll-script', 'https://unpkg.com/aos@2.3.1/dist/aos.js', null, null, true);

wp_enqueue_script('animate-on-scroll-script');

wp_enqueue_script('animate-on-scroll-init', 
                get_theme_file_uri( '/assets/scripts/animate-on-scroll-init.js' ), 
                array(),
                wp_get_theme()->get( 'Version' ), 
                array( 'strategy' => 'defer' ) 
);

require get_theme_file_path() . '/custom-blocks/custom-blocks.php';

function register_student_post_type() {
  $labels = [
    'name' => 'Students',
    'singular_name' => 'Student',
    'menu_name' => 'Students',
    'name_admin_bar' => 'Student',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Student',
    'new_item' => 'New Student',
    'edit_item' => 'Edit Student',
    'view_item' => 'View Student',
    'all_items' => 'All Students',
    'search_items' => 'Search Students',
    'not_found' => 'No students found.',
    'not_found_in_trash' => 'No students found in Trash.',
  ];

  $args = [
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'students'],
    'show_in_rest' => true,
    'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
    'menu_icon' => 'dashicons-welcome-learn-more',
    'taxonomies' => ['cohort'],
    'template' => [
      ['core/image'],
      ['core/paragraph', ['placeholder' => 'Write a description...']],
    ],

    'template_lock' => 'all',
  ];

  register_post_type('student', $args);
}
add_action('init', 'register_student_post_type');

function custom_student_title_placeholder($title) {
  $screen = get_current_screen();
  if ($screen->post_type === 'student') {
    $title = 'Add student name';
  }
  return $title;
}
add_filter('enter_title_here', 'custom_student_title_placeholder');

function register_student_role_taxonomy() {
    $labels = [
        'name'              => 'Roles',
        'singular_name'     => 'Role',
        'search_items'      => 'Search Roles',
        'all_items'         => 'All Roles',
        'parent_item'       => 'Parent Role',
        'parent_item_colon' => 'Parent Role:',
        'edit_item'         => 'Edit Role',
        'update_item'       => 'Update Role',
        'add_new_item'      => 'Add New Role',
        'new_item_name'     => 'New Role Name',
        'menu_name'         => 'Roles',
    ];

    $args = [
        'labels'            => $labels,
        'hierarchical'      => true, 
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => ['slug' => 'role'],
        'show_in_rest'      => true, 
    ];

    register_taxonomy('student_role', ['student'], $args);
}
add_action('init', 'register_student_role_taxonomy');

add_action('after_setup_theme', function() {
  add_image_size('student-small', 250, 400, true); 
  add_image_size('student-large', 500, 800, true); 
});

add_filter('image_size_names_choose', function($sizes) {
  return array_merge($sizes, [
    'student-small' => 'Student Small',
    'student-large' => 'Student Large',
  ]);
});

function sort_students_by_custom_field( $query ) {
  if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'students' ) ) {
    $query->set( 'meta_key', 'students' );
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'order', 'ASC' );
  }
}
add_action( 'pre_get_posts', 'sort_students_by_custom_field' );

add_filter('allowed_block_types_all', function($allowed_blocks, $editor_context) {
  if (!empty($editor_context->post) && $editor_context->post->post_type === 'student') {
    return [
      'core/image',
      'core/paragraph',
    ];
  }
  return $allowed_blocks;
}, 10, 2);