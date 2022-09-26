<?php

function get_verification_email_template($token) {
    $email_template = "
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset=\"UTF-8\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
                <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
                <link href=\"https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap\" rel=\"stylesheet\">
                <style>
                    * {
                        padding: 0;
                        margin: 0;
                        text-decoration: none;
                        box-sizing: border-box;
                    }
                </style>
            </head>
            <body>
                <div style=\"background:rgb(98,143,111); padding: 60px 0;\">
                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                        <tr>
                            <td align=\"center\">
                                <div style=\"text-align: center; width: 32rem; border-radius: 0.4rem; background: #fff;\">
                                    <div style=\"border-top: 13px solid #BF3604; border-radius: 1rem;\"></div>

                                    <div style=\"display: flex;\">
                                        <div>
                                            <p style=\" color: #628F6F; padding: 2rem 2rem 0 2rem; text-align: left; font-size: 1.5rem; margin: 0;\">Olá!</p>

                                            <p style=\" color: #628F6F; padding: 0 2rem 2rem 2rem; text-align: left; font-size: 1.2rem; margin: 0;\">
                                                Ficamos muito felizes com o seu cadastro. Agora só falta clicar
                                                no botão abaixo para verificarmos o seu e-mail.
                                            </p><br />

                                            <a href=\"https://sebastianas.netlify.app/validationemail\" target=\"_Blank\" style=\"background: #BF3604; padding: 0.4rem 5rem 0.4rem 5rem; border-radius: 3.69rem; color: #fff; text-decoration: none; font-Weight: bold;\">Verificar</a><br /><br />

                                            <p style=\" color: #628F6F; padding: 2rem; text-align: left; font-size: 1.2rem; margin: 0;\">
                                                Ah! E lembre-se de anotar o token que geramos especialmente pra você!
                                                Você precisará dele para preencher o próximo formulário.
                                            </p>

                                            <div style=\"background: #FFCFB4; margin: 0 0 1.5rem 2.4rem; padding: 0.4rem 1rem 0.4rem 1rem; border-radius: 3rem; color:#BE3602; width: 10rem; border: 1px dashed #BE3602; font-Weight: bold;\">TOKEN: $token</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </body>
        </html>
    ";

    return $email_template;
}
