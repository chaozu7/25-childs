<?php

//Includes

include(get_theme_file_path( 'includes/front/enqueue.php' ));
include(get_theme_file_path( 'includes/posts/books-post-type.php' ));
include(get_theme_file_path( 'includes/admin/genre-fields.php' ));
include(get_theme_file_path( 'includes/admin/genre-edit.php' ));
include(get_theme_file_path( 'includes/admin/genre-save.php' ));
include(get_theme_file_path( 'includes/admin/books-metabox.php' ));
include(get_theme_file_path( 'includes/back/latest-books.php'));
include(get_theme_file_path( 'includes/back/pagination-limits.php' ));


//Hooks

add_action( 'wp_enqueue_scripts', 'fz_enqueue', 20);
add_action( 'init', 'fz_register_books_and_taxonomy' );
add_action( 'book-genre_add_form_fields', 'fz_genre_add_form_fields');
add_action( 'create_book-genre', 'fz_genre_save_data' );
add_action( 'book-genre_edit_form_fields', 'fz_genre_edit_form_fields');
add_action( 'edited_book-genre', 'fz_genre_save_data' );
add_action( 'pre_get_posts', 'fz_modify_genre_pagination' );