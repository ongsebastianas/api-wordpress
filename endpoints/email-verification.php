<?php

function verify_email($request) {
    $email = sanitize_email($request['email']);
    $token = sanitize_text_field($request['token']);

    if(validate_inputs(array($email, $token))) {
        $interested_person = find_interested_person($email);

        if($interested_person) {
            $id = $interested_person[0];

            if(empty(get_post_custom_values('verified_at', $id)[0])) {
                if(get_post_custom_values('verification_token', $id)[0] == $token) {
                    date_default_timezone_set('America/Sao_Paulo');
    
                    wp_update_post(array(
                        'ID' => $id,
                        'meta_input'=> array(
                            'verified_at' => date('H:i:s d-m-Y'),
                            'verification_token' => null, 
                        ),
                    ));
    
                    $response = array(
                        'code' => 'success', 
                        'message' => 'E-mail verificado com sucesso.',
                        'data' => array('status' => 200),
                    );
                } else {
                    $response = new WP_Error('error', 'Token inválido.', array('status' => 403));
                }
            } else {
                $response = new WP_Error('error', 'E-mail já verificado anteriormente.', array('status' => 403));
            }
        } else {
            $response = new WP_Error('error', 'E-mail não encontrado.', array('status' => 403));
        }
    } else {
        $response = new WP_Error('error', 'Campos inválidos.', array('status' => 403));
    }

    return rest_ensure_response($response);
}

function register_email_verification() {
    register_rest_route('/wp/v2', '/email-verification', array(
        array(
            'methods' => WP_REST_Server::EDITABLE,
            'callback' => 'verify_email',
        ),
    ));
}

add_action('rest_api_init', 'register_email_verification');