<?php
// Menambahkan halaman pengaturan
function custom_head_script_menu() {
    add_menu_page(
        'Head & Footer Script', 
        'Head & Footer Script', 
        'manage_options', 
        'custom-head-script',
        'custom_head_script_page'
    );
}

add_action('admin_menu', 'custom_head_script_menu');

function custom_head_script_page() {
    ?>
    <div class="wrap">
        <h1>Custom Head & Footer Script</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom-head-script-options');
            do_settings_sections('custom-head-script');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function custom_head_script_settings() {
    register_setting('custom-head-script-options', 'custom_head_script_code');
    add_settings_section(
        'custom-head-script-section',
        'Script Settings',
        'custom_head_script_section_callback',
        'custom-head-script'
    );
    add_settings_field(
        'custom-head-script-field',
        'Head Script',
        'custom_head_script_field_callback',
        'custom-head-script',
        'custom-head-script-section'
    );

    register_setting('custom-head-script-options', 'custom_footer_script_code');
    add_settings_field(
        'custom-footer-script-field',
        'Footer Script',
        'custom_footer_script_field_callback',
        'custom-head-script',
        'custom-head-script-section'
    );
}

function custom_head_script_section_callback() {
    echo 'Masukkan script JavaScript yang ingin ditambahkan ke <head>.';
}

function custom_head_script_field_callback() {
    $script = get_option('custom_head_script_code');
    echo '<textarea name="custom_head_script_code" rows="10" cols="50">' . esc_textarea($script) . '</textarea>';
}

function custom_footer_script_field_callback() {
    $script = get_option('custom_footer_script_code');
    echo '<textarea name="custom_footer_script_code" rows="10" cols="50">' . esc_textarea($script) . '</textarea>';
}

add_action('admin_init', 'custom_head_script_settings');
