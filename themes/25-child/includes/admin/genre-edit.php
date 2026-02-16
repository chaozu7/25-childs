<?php

function fz_genre_edit_form_fields($term){
    $url = get_term_meta($term->term_id, 'more_info_url', true);
?>
<div class="form-fild">
    <th>
        <label><?php _e('More Info URL', 'twentyfifthchild'); ?></label>
    </th>
    <td>
        <input type="text" name="fz_more_info_url" value="<?php echo $url;?>" />
        <p class=" description"><?php _e('URL to more info about the genre', 'twentyfifthchild'); ?></p>
    </td>
    </tr>
</div <?php
}