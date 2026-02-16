<?php
    
function fz_register_books_and_taxonomy() {


    // add books
    $post_type_labels = array(
        'name'                  => _x( 'Books', 'Paper literature', 'twentyfifthchild' ),
        'singular_name'         => _x( 'Book', 'Paper literature', 'twentyfifthchild' ),
        'menu_name'             => _x( 'Books', 'Admin Menu text', 'twentyfifthchild' ),
        'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'twentyfifthchild' ),
        'add_new'               => __( 'Add New', 'twentyfifthchild' ),
        'add_new_item'          => __( 'Add New Book', 'twentyfifthchild' ),
        'new_item'              => __( 'New Book', 'twentyfifthchild' ),
        'edit_item'             => __( 'Edit Book', 'twentyfifthchild' ),
        'view_item'             => __( 'View Book', 'twentyfifthchild' ),
        'all_items'             => __( 'All Books', 'twentyfifthchild' ),
        'search_items'          => __( 'Search Books', 'twentyfifthchild' ),
        'not_found'             => __( 'No books found.', 'twentyfifthchild' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'twentyfifthchild' ),
        'featured_image'        => _x( 'Book Cover', 'Overrides the "Featured Image" phrase', 'twentyfifthchild' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the "Set featured image" phrase', 'twentyfifthchild' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the "Remove featured image" phrase', 'twentyfifthchild' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the "Use as featured image" phrase', 'twentyfifthchild' ),
    );

    $post_type_args = array(
        'labels'             => $post_type_labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'library' ),
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
        'taxonomies'         => array( 'book-genre' ), 
        'menu_icon'          => 'dashicons-book',
        'menu_position'      => 5,
        "description"        => __('A custom post type for books','twentyfifthchild' ),
    );

    register_post_type( 'books', $post_type_args );

    //add taxonomy
    $taxonomy_labels = array(
        'name'                       => _x( 'Genres', 'Literature genres', 'twentyfifthchild' ),
        'singular_name'              => _x( 'Genre', 'Literature genre', 'twentyfifthchild' ),
        'search_items'               => __( 'Search Genres', 'twentyfifthchild' ),
        'popular_items'              => __( 'Popular Genres', 'twentyfifthchild' ),
        'all_items'                  => __( 'All Genres', 'twentyfifthchild' ),
        'parent_item'                => __( 'Parent Genre', 'twentyfifthchild' ),
        'parent_item_colon'          => __( 'Parent Genre:', 'twentyfifthchild' ),
        'edit_item'                  => __( 'Edit Genre', 'twentyfifthchild' ),
        'view_item'                  => __( 'View Genre', 'twentyfifthchild' ),
        'update_item'                => __( 'Update Genre', 'twentyfifthchild' ),
        'add_new_item'               => __( 'Add New Genre', 'twentyfifthchild' ),
        'new_item_name'              => __( 'New Genre Name', 'twentyfifthchild' ),
        'separate_items_with_commas' => __( 'Separate genres with commas', 'twentyfifthchild' ),
        'add_or_remove_items'        => __( 'Add or remove genres', 'twentyfifthchild' ),
        'choose_from_most_used'      => __( 'Choose from the most used genres', 'twentyfifthchild' ),
        'not_found'                  => __( 'No genres found', 'twentyfifthchild' ),
        'no_terms'                   => __( 'No genres', 'twentyfifthchild' ),
        'items_list_navigation'      => __( 'Genres list navigation', 'twentyfifthchild' ),
        'items_list'                 => __( 'Genres list', 'twentyfifthchild' ),
        'menu_name'                  => __( 'Genres', 'twentyfifthchild' ),
        'back_to_items'              => __( '&larr; Back to Genres', 'twentyfifthchild' ),
    );

    $taxonomy_args = array(
        'labels'            => $taxonomy_labels,
        'hierarchical'      => true, // true = like categories, false = like tags
        'show_ui'           => true,
        'show_admin_column' => true, 
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'book-genre' ),
        'show_in_rest'      => true, 
    );

    register_taxonomy( 'book-genre', array( 'books' ), $taxonomy_args );
}