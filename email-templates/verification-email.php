<?php

function get_verification_email_template($email, $token) {
    $email_template = "
        <body>
            <div id=\"content\">
                <header>
                    <img src=\"https://sebastianas.netlify.app/assets/logos/logo.svg\" alt=\"\">
                </header>
                <section>
                    <h1>Olá!</h1>
                    <span>Clique no botão abaixo para verificar o seu endereço de e-mail:</span>
                    <div id=\"verification-button\">
                        <a href=\"?email=$email&token=$token\">Verificar</a>
                    </div>
                    <span>Atenciosamente,<br/>Sebastianas</span>
                </section>
                <footer>© 2022 Sebastianas. Todos os direitos reservados.</footer>
            </div>
        </body>
    ";

    return $email_template;
}
