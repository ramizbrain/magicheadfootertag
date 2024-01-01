<?php
// Menambahkan Metabox
function custom_head_script_add_metabox() {
    add_meta_box(
        'custom_head_script_metabox',
        'Custom Head Script for This Page',
        'custom_head_script_metabox_content',
        'page',
        'normal',
        'high'
    );

    add_meta_box(
        'custom_footer_script_metabox',
        'Custom Footer Script for This Page',
        'custom_footer_script_metabox_content',
        'page',
        'normal',
        'low'
    );
}

add_action('add_meta_boxes', 'custom_head_script_add_metabox');

function custom_head_script_metabox_content($post) {
    wp_nonce_field(plugin_basename(__FILE__), 'custom_head_script_nonce');
    $script = get_post_meta($post->ID, '_custom_head_script', true);
    echo '<textarea name="custom_head_script" rows="10" style="width:100%">' . esc_textarea($script) . '</textarea>';
}

function custom_footer_script_metabox_content($post) {
    wp_nonce_field(plugin_basename(__FILE__), 'custom_footer_script_nonce');
    $script = get_post_meta($post->ID, '_custom_footer_script', true);
    echo '<textarea name="custom_footer_script" rows="10" style="width:100%">' . esc_textarea($script) . '</textarea>';
}

function custom_head_script_save_postdata($post_id) {
    if (!isset($_POST['custom_head_script_nonce']) || !wp_verify_nonce($_POST['custom_head_script_nonce'], plugin_basename(__FILE__))) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if ('page' == $_POST['post_type'] && !current_user_can('edit_page', $post_id)) {
        return;
    }
    if (isset($_POST['custom_head_script'])) {
        update_post_meta($post_id, '_custom_head_script', $_POST['custom_head_script']);
    }
    if (isset($_POST['custom_footer_script'])) {
        update_post_meta($post_id, '_custom_footer_script', $_POST['custom_footer_script']);
    }
}

add_action('save_post', 'custom_head_script_save_postdata');
