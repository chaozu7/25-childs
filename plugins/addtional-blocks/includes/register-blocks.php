<?php


function bs_register_blocks(){
    $blocks = [
        ['name' => 'faq-accordion']
    ];

    foreach($blocks as $block){
         register_block_type(
            UP_PLUGIN_DIR . 'build/blocks/'. $block['name']);
        
    }
   
}