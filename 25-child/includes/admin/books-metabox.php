<?php
add_action( 'add_meta_boxes', 'fz_books_add_meta_box' );
function fz_books_add_meta_box() {
    add_meta_box(
        'fz_book_details',           
        'Book Details',              
        'fz_book_meta_box_callback', 
        'books',                     
        'side',                      
        'default'                   
    );
}


function fz_book_meta_box_callback( $post ) {
    $pub_date = get_post_meta( $post->ID, '_fz_publication_date', true );
    wp_nonce_field( 'fz_book_save_meta', 'fz_book_nonce' );
    ?>
<p>
    <label for="fz_publication_date"><?php _e( 'Publication Date', 'twentyfifthchild' ); ?>:</label>
    <input type="date" id="fz_publication_date" name="fz_publication_date" value="<?php echo esc_attr( $pub_date ); ?>"
        style="width:100%;">
</p>
<?php
}


add_action( 'save_post', 'fz_books_save_meta' );
function fz_books_save_meta( $post_id ) {

    if ( ! isset( $_POST['fz_book_nonce'] ) || ! wp_verify_nonce( $_POST['fz_book_nonce'], 'fz_book_save_meta' ) ) {
        return;
    }
   
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
   
    if ( isset( $_POST['fz_publication_date'] ) ) {
        update_post_meta( $post_id, '_fz_publication_date', sanitize_text_field( $_POST['fz_publication_date'] ) );
    }
}