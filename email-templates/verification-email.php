<?php

function get_verification_email_template($email, $token) {
    $email_template = "
        <body style=\"font-family: 'Segoe UI Symbol'; background-color: #f5f5ff;\">
            <div id=\"content\" style=\"position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);\">
                <header style=\"display: flex; justify-content: center;\">
                    <img src=\"https://sebastianas.netlify.app/assets/logos/logo.svg\" alt=\"\">
                </header>
                <section style=\"background-color: white; height: 240px; width: 500px; margin: 25px auto 25px auto; border-radius: 4px; box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2); padding: 10px 30px 10px 30px;\">
                    <h1>Olá!</h1>
                    <span>Clique no botão abaixo para verificar o seu endereço de e-mail:</span>
                    <div id=\"verification-button\" style=\"display: flex; justify-content: center; margin: 25px 0px 25px 0px;\">
                        <a href=\"?email=$email&token=$token\" style=\"background-color: #bf3604; color: white; text-decoration: none; border-radius: 4px; padding: 7px 18px 9px 18px;\">Verificar</a>
                    </div>
                    <span>Atenciosamente,<br/>Sebastianas</span>
                </section>
                <footer style=\"display: flex; justify-content: center; font-size: 12px; color: rgba(0, 0, 0, 0.8);\">© 2022 Sebastianas. Todos os direitos reservados.</footer>
            </div>
        </body>
    ";

    return $email_template;
}
