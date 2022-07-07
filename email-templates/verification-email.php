<?php

function get_verification_email_template($token) {
    $email_template = "
        <body>
            <h2>Projeto Sebastianas</h2>
            <br/>Token: " . $token . "
        </body>
    ";

    return $email_template;
}
