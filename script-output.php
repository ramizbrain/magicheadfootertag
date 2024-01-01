<?php
// Fungsi untuk menambahkan script global
function tambahkan_custom_script_global() {
    $script = get_option('custom_head_script_code');
    if (!empty($script)) {
        echo $script; // Output script global
    }
}

add_action('wp_head', 'tambahkan_custom_script_global');

// Fungsi untuk menambahkan script per halaman
function tambahkan_custom_script_per_halaman() {
    if (is_page()) {
        global $post;
        $script = get_post_meta($post->ID, '_custom_head_script', true);
        if (!empty($script)) {
            echo $script; // Output script per halaman
        }
    }
}

add_action('wp_head', 'tambahkan_custom_script_per_halaman');

// Menambahkan footer script secara global
function tambahkan_custom_footer_script_global() {
    $script = get_option('custom_footer_script_code');
    if (!empty($script)) {
        echo $script; // Output footer script global
    }
}

add_action('wp_footer', 'tambahkan_custom_footer_script_global');

// Menambahkan footer script per halaman
function tambahkan_custom_footer_script_per_halaman() {
    if (is_page()) {
        global $post;
        $script = get_post_meta($post->ID, '_custom_footer_script', true);
        if (!empty($script)) {
            echo $script; // Output footer script per halaman
        }
    }
}

add_action('wp_footer', 'tambahkan_custom_footer_script_per_halaman');
