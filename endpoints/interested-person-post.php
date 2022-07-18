<?php

include dirname(__FILE__).'/../utils.php';
include dirname(__FILE__).'/../email-templates/verification-email.php';

function interested_person_post($request) {
    $name = sanitize_text_field($request['name']);
    $email = sanitize_email($request['email']);
    $gender = sanitize_text_field($request['gender']);

    if(validate_inputs(array($name, $email, $gender))) {
        if (check_email($email)) {
            $response = new WP_Error('error', 'Email já cadastrado.', array('status' => 403));
        } else {
            $token = rand(100000, 10000000);

            $response = array(
                'post_type' => 'interested_person',
                'post_title' => $name,
                'post_status' => 'publish',
                'meta_input' => array(
                    'name' => $name,
                    'email' => $email,
                    'gender' => $gender,
                    'verification_token' => $token,
                    'verified_at' => null,
                ),
            );
            
            $interested_person_id = wp_insert_post($response);
            $response['id'] = get_post_field('post_name', $interested_person_id);

            wp_mail("$email", "Verificação de E-mail", get_verification_email_template($email, $token));
        }
    } else {
        $response = new WP_Error('error', 'Campos inválidos.', array('status' => 403));
    }

    return rest_ensure_response($response);
}

function register_interested_person_post() {
    register_rest_route('/wp/v2', '/interested-person', array(
        array(
            'methods' => WP_REST_Server::EDITABLE,
            'callback' => 'interested_person_post',
        ),
    ));
}

add_action('rest_api_init', 'register_interested_person_post');