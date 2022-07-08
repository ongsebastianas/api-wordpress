<?php

function register_interested_person() {
    register_post_type('interested_person', array(
        'label' => 'Interessadas',
        'description' => 'Interessadas',
        'show_ui' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'interested_person', 'with_front' => true),
        'query_var' => true,
        'supports' => array('custom-fields'),
        'publicly_queryable' => false,
        'menu_icon' => 'dashicons-groups'
    ));
}

add_action('init', 'register_interested_person');

// Set columns for custom fields
function set_custom_interested_person_columns($columns) {
    unset($columns['date']);
    $columns['email'] = __('E-mail');
    $columns['gender'] = __('Gênero');
    $columns['verified_at'] = __('Data de verificação');

    return $columns;
}

add_filter('manage_interested_person_posts_columns', 'set_custom_interested_person_columns');

// Add the data to the custom columns
function custom_interested_person_column($column, $post_id) {
    switch ($column) {
        case 'email':
            echo get_post_meta($post_id, 'email', true);
            break;

        case 'gender':
            echo ucfirst(get_post_meta($post_id, 'gender', true));
            break;

        case 'verified_at':
            $verified_at = get_post_meta($post_id, 'verified_at', true);
            echo $verified_at ? $verified_at : 'E-mail não verificado';
            break;
    }
}

add_action('manage_interested_person_posts_custom_column', 'custom_interested_person_column', 10, 2);
