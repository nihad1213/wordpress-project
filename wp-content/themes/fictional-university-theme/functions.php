<?php

function university_files() {
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), 
        array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');



// Add Meta Box to Event Post Type
function add_event_program_metabox() {
    add_meta_box(
        'event_related_program',
        'Related Program',
        'render_event_program_metabox',
        'event',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_event_program_metabox');

function render_event_program_metabox($post) {
    wp_nonce_field('save_event_program', 'event_program_nonce');
    $selected_program = get_post_meta($post->ID, '_related_program_id', true);
    
    $programs = get_posts([
        'post_type' => 'program',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    ]);

    echo '<select name="related_program_id" style="width:100%;">';
    echo '<option value="">-- Select Program --</option>';
    foreach ($programs as $program) {
        $selected = ($selected_program == $program->ID) ? 'selected' : '';
        echo '<option value="' . esc_attr($program->ID) . '" ' . $selected . '>' . esc_html($program->post_title) . '</option>';
    }
    echo '</select>';
}

function save_event_program_metabox($post_id) {
    if (!isset($_POST['event_program_nonce']) || !wp_verify_nonce($_POST['event_program_nonce'], 'save_event_program')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['related_program_id'])) {
        update_post_meta($post_id, '_related_program_id', sanitize_text_field($_POST['related_program_id']));
    }
}
add_action('save_post', 'save_event_program_metabox');
