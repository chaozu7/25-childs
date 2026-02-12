<?php


function fz_register_faq_block() {
    register_block_type( get_template_directory() . '/build/blocks/faq-accordion' );
}