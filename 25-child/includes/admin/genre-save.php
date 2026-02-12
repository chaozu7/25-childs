<?php

function fz_genre_save_data($termID){
    if(!isset($_POST['fz_more_info_url'])){
        return;
    }

    update_term_meta($termID, 'more_info_url',
    esc_url_raw( $_POST['fz_more_info_url'] ) 
    );
}