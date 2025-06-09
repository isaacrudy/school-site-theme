<?php

// CUSTOM POST TYPES

function school_theme_register_CPTs() {
    // Staff CPT
    $labels = array(
        'name'                     => _x( 'Staff', 'post type general name', 'school-site-theme' ),
        'singular_name'            => _x( 'Staff', 'post type singular name', 'school-site-theme' ),
        'add_new'                  => _x( 'Add New', 'staff', 'school-site-theme' ),
        'add_new_item'             => __( 'Add New Staff', 'school-site-theme' ),
        'edit_item'                => __( 'Edit Staff', 'school-site-theme' ),
        'new_item'                 => __( 'New Staff', 'school-site-theme' ),
        'view_item'                => __( 'View Staff', 'school-site-theme' ),
        'view_items'               => __( 'View Staff', 'school-site-theme' ),
        'search_items'             => __( 'Search Staff', 'school-site-theme' ),
        'not_found'                => __( 'No staff found.', 'school-site-theme' ),
        'not_found_in_trash'       => __( 'No staff found in Trash.', 'school-site-theme' ),
        'parent_item_colon'        => __( 'Parent Staff:', 'school-site-theme' ),
        'all_items'                => __( 'All Staff', 'school-site-theme' ),
        'archives'                 => __( 'Staff Archives', 'school-site-theme' ),
        'attributes'               => __( 'Staff Attributes', 'school-site-theme' ),
        'insert_into_item'         => __( 'Insert into staff', 'school-site-theme' ),
        'uploaded_to_this_item'    => __( 'Uploaded to this staff', 'school-site-theme' ),
        'featured_image'           => __( 'Staff featured image', 'school-site-theme' ),
        'set_featured_image'       => __( 'Set staff featured image', 'school-site-theme' ),
        'remove_featured_image'    => __( 'Remove staff featured image', 'school-site-theme' ),
        'use_featured_image'       => __( 'Use as featured image', 'school-site-theme' ),
        'menu_name'                => _x( 'Staff', 'admin menu', 'school-site-theme' ),
        'filter_items_list'        => __( 'Filter staff list', 'school-site-theme' ),
        'items_list_navigation'    => __( 'Staff list navigation', 'school-site-theme' ),
        'items_list'               => __( 'Staff list', 'school-site-theme' ),
        'item_published'           => __( 'Staff published.', 'school-site-theme' ),
        'item_published_privately' => __( 'Staff published privately.', 'school-site-theme' ),
        'item_revereted_to_draft'  => __( 'Staff reverted to draft.', 'school-site-theme' ),
        'item_trashed'             => __( 'Staff trashed.', 'school-site-theme' ),
        'item_scheduled'           => __( 'Staff scheduled.', 'school-site-theme' ),
        'item_updated'             => __( 'Staff updated.', 'school-site-theme' ),
        'item_link'                => __( 'Staff link.', 'school-site-theme' ),
        'item_link_description'    => __( 'A link to a staff.', 'school-site-theme' ),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-businesswoman',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
    register_post_type( 'fwd-staff', $args );
}
add_action( 'init', 'school_theme_register_CPTs' );

if( is_admin() ) {
	add_filter( 'enter_title_here', function( $input ) {
		if( 'fwd-staff' === get_post_type() ) {
			return __( 'Add staff name', 'textdomain' );
		} else {
			return $input;
		}
	} );
}



// TAXONOMIES

function school_theme_register_taxonomies() {
    // Add staff taxonomy
    $labels = array(
        'name'                  => _x( 'Staff Categories', 'taxonomy general name', 'school-site-theme' ),
        'singular_name'         => _x( 'Staff Category', 'taxonomy singular name', 'school-site-theme' ),
        'search_items'          => __( 'Search Staff Categories', 'school-site-theme' ),
        'all_items'             => __( 'All Staff Category', 'school-site-theme' ),
        'parent_item'           => __( 'Parent Staff Category', 'school-site-theme' ),
        'parent_item_colon'     => __( 'Parent Staff Category:', 'school-site-theme' ),
        'edit_item'             => __( 'Edit Staff Category', 'school-site-theme' ),
        'view_item'             => __( 'View Staff Category', 'school-site-theme' ),
        'update_item'           => __( 'Update Staff Category', 'school-site-theme' ),
        'add_new_item'          => __( 'Add New Staff Category', 'school-site-theme' ),
        'new_item_name'         => __( 'New Staff Category Name', 'school-site-theme' ),
        'template_name'         => __( 'Staff Category Archives', 'school-site-theme' ),
        'menu_name'             => __( 'Staff Category', 'school-site-theme' ),
        'not_found'             => __( 'No staff categories found.', 'school-site-theme' ),
        'no_terms'              => __( 'No staff categories', 'school-site-theme' ),
        'items_list_navigation' => __( 'Staff Categories list navigation', 'school-site-theme' ),
        'items_list'            => __( 'Staff Categories list', 'school-site-theme' ),
        'item_link'             => __( 'Staff Category Link', 'school-site-theme' ),
        'item_link_description' => __( 'A link to a staff category.', 'school-site-theme' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-categories' ),

        // https://wordpress.stackexchange.com/questions/155629/custom-taxonomies-capabilities
        'capabilities'      => array(
            'manage_terms'  => '',
            'edit_terms'    => '',
            'delete_terms'  => '',
        )
    );
    register_taxonomy( 'fwd-staff-category', array( 'fwd-staff' ), $args );
}
add_action( 'init', 'school_theme_register_taxonomies' );