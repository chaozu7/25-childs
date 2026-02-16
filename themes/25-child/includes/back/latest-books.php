<?php

/**
 * Pobieranie 20 najnowszych książek via AJAX (JSON)
 */
function fz_get_latest_books_json() {
    // Pobieramy ID bieżącej książki z parametru GET, aby ją wykluczyć
    $exclude_id = isset($_GET['exclude']) ? intval($_GET['exclude']) : 0;

    $query = new WP_Query(array(
        'post_type'      => 'books',
        'posts_per_page' => 20,
        'post__not_in'   => array($exclude_id),
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish'
    ));

    $books_data = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // 1. Pobieramy Gatunki (book-genre)
            $genres = wp_get_post_terms(get_the_ID(), 'book-genre', array('fields' => 'names'));
            
            // 2. Pobieramy Datę z Meta Boxa (_fz_publication_date)
            $pub_date = get_post_meta(get_the_ID(), '_fz_publication_date', true);
            // Formatujemy datę na czytelną (np. 12 lutego 2026)
            $formatted_date = $pub_date ? date_i18n(get_option('date_format'), strtotime($pub_date)) : get_the_date();

            $books_data[] = array(
                'title'   => get_the_title(),
                'date'    => $formatted_date,
                'genre'   => !empty($genres) ? implode(', ', $genres) : __('N/A', 'twentyfifthchild'),
                'excerpt' => get_the_excerpt(),
                'url'     => get_permalink(),
                'thumbnail_url' => get_the_post_thumbnail_url(get_the_ID(), 'medium')
            );
        }
        wp_reset_postdata();
    }

    // Zwracamy dane jako JSON (success: true, data: [...])
    wp_send_json_success($books_data);
}

// Rejestracja endpointów AJAX
add_action('wp_ajax_get_latest_books', 'fz_get_latest_books_json');
add_action('wp_ajax_nopriv_get_latest_books', 'fz_get_latest_books_json');