<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
$rdir = str_replace("\\", "/", __DIR__);                    //Root Dir
require $rdir.'/PHPMailer/src/Exception.php';
require $rdir.'/PHPMailer/src/PHPMailer.php';
require $rdir.'/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


    $cod_valid = mt_rand(1111,9999);
    $mail = new PHPMailer(true);
    try {
        //Server settings
       // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pereirakawan07@gmail.com';                     //SMTP username
        $mail->Password   = 'zquaiqejaeyhhxfd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('pereirakawan07@gmail.com', 'kawan');
        $mail->addAddress("{$email}", 'Joe User');     //Add a recipient

        //Content
        $mail->isHTML(true);     
        $mail->CharSet = 'UTF-8';                           //Set email format to HTML
        $mail->Subject = 'Codigo de verificação';
        $mail->Body    = "
        <!DOCTYPE html>
        <html lang=\"pt-br\">
            <head>
                <meta charset=\"UTF-8\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            </head>
            <body>
                <style>
                    *{
                        margin: 0;
                        padding: 0;
                    }
                   
                    
                    .topo{
                        justify-content: center;
                        align-items: center;
                        display: flex;
                        flex-direction: column;
                    }
                    .topo>h1{
                        font-size: 30px;
                        font-weight: bold;
                    }
                    .topo>p{
                        font-size: 20px;
                        font-weight: 400;
                    }
                    .corpo{
                        width: 50%;
                        height: 40px;
                    }
                    .tr{
                        justify-content: center;
                        align-items: center;
                        display: flex;
                        flex-direction:row;
                    }
                    .codigo{
                        font-size: 40px;
                        font-style: bold;
                    }
                </style>
                <div class=\"main\">
                    <div class=\"centro\">
                        <div class=\"topo\">
                            <h1 style=\"font-size: 30px\">Bem vindo a PyBank</h1>
                            <p>Para ativar a sua conta, use o codigo de verificação</p>
                        </div>
                        <div class=\"corpo\">
                            <p class=\"codigo\" style=\" font-size:40px\"><strong>{$cod_valid}</strong></p>
                        </div> 
                        <div class=\"footer\">
                            <p>Obrigado por testar o nosso projeto</p><p>obs:Pybank é apenas um projeto para estudo,tudo uma simulação</p>
                        </div> 
                    </div>
                </div>
            </body>
            </html>
        
        ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        $msg = 'Codigo de verificaçao enviado com sucesso';
    } catch (Exception $e) {
        echo "nao foi possivel enviar o codigo de verificaçao: {$mail->ErrorInfo}";
    };
?>
