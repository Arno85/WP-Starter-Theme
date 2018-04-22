<?php function register_My_CPT() {
   /**
    * Register a custom post type
    *
    * Supplied is a "reasonable" list of defaults
    * @see register_post_type for full list of options for register_post_type
    * @see add_post_type_support for full descriptions of 'supports' options
    * @see get_post_type_capabilities for full list of available fine grained capabilities that are supported
    */
    register_post_type( 'My_CPT', array(
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => '' ),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'menu_icon' => "dashicons-tag",
        'supports' => array( 'title', 'editor',  'thumbnail', 'page-attributes' ),
        'taxonomies' => array(''),
        'capability_type' => 'post',
        'capabilities' => array(),
        'labels' => array(
            'name' => __( 'My_CPTS (plural)', 'example' ),
            'singular_name' => __( 'My_CPT (singular)', 'example' ),
            'add_new' => __( 'Add new', 'example' ),
            'add_new_item' => __( 'Add a new My_CPT (singular)', 'example' ),
            'edit_item' => __( 'Edit My_CPT (singular)', 'example' ),
            'new_item' => __( 'New My_CPT (singular)', 'example' ),
            'all_items' => __( 'All My_CPTS (plural)', 'example' ),
            'view_item' => __( 'View My_CPT (singular)', 'example' ),
            'search_items' => __( 'Search My_CPTS (plural)', 'example' ),
            'not_found' =>  __( 'No My_CPT (singular) found', 'example' ),
            'not_found_in_trash' => __( 'No My_CPT (singular) found in the trash', 'example' ),
            'parent_item_colon' => '',
            'menu_name' => 'My_CPT (plural)'
        )
    ) );
}
//Uncomment the following action to set your custom post type in WP
//add_action( 'init', 'register_My_CPT' );
?>