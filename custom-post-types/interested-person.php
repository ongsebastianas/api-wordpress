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
        'publicly_queryable' => true,
        'menu_icon' => 'dashicons-groups'
    ));
}

add_action('init', 'register_interested_person');