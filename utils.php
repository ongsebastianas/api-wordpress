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