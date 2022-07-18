<?php

function validate_inputs($input_array) {
    foreach ($input_array as $input) {
        if (empty($input)) {
            return false;
        }
    }

    return true;
}

function check_email($email) {
    $posts = get_posts(array(
        'post_type' => 'interested_person',
        'meta_key' => 'email',
        'meta_value' => $email,
    ));

    return count($posts);
}

function find_interested_person($email) {
    $interested_person = get_posts(array(
        'fields' => 'ids',
        'numberposts' => 1,
        'post_type' => 'interested_person',
        'meta_query' => array(
            array(
                'key' => 'email',
                'value' => $email,
            ),
        ),
    ));

    return $interested_person;
}