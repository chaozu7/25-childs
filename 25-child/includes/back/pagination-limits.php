<?php

function fz_modify_genre_pagination( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_tax( 'book-genre' ) ) {
        $query->set( 'posts_per_page', 5 );
    }
}