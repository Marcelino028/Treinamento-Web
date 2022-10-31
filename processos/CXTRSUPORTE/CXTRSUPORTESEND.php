
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../../Connections/connpdo.php';
require '../../vendor_Mailer/autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Contatos</title>
       
    </head>
    <body>
        <?php
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($data['SendAddMsg'])) {
            //var_dump($data);
            $query_msg = "INSERT INTO suporte_emails(name, email, subject, content, created) VALUES (:name, :email, :subject, :content, NOW())";
            $add_msg = $conn->prepare($query_msg);

            $add_msg->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $add_msg->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $add_msg->bindParam(':subject', $data['subject'], PDO::PARAM_STR);
            $add_msg->bindParam(':content', $data['content'], PDO::PARAM_STR);

            $add_msg->execute();

            if ($add_msg->rowCount()) {
                $mail = new PHPMailer(true);

                //Configurações do Servidor 

                try {
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host = 'smtp.mailtrap.io';
                    $mail->SMTPAuth = true;
                    $mail->Username = '5a0ff1d5ca70c2';
                    $mail->Password = '9b504619f7485a';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 2525;

                    //Enviar e-mail
                    $mail->setFrom('joao.jvm.marcelino@gmail.com', 'João Vítor');
                    $mail->addAddress($data['email'], $data['name']);
                   
                    $mail->isHTML(true);
                    $mail->Subject = 'Recebi a mensagem de contato';
                    $mail->Body = "Prezado(a) " . $data['name'] . "<br><br>Olá, Recebi o seu e-mail.<br>Será lido em Breve.<br>Em breve será respondido.<br><br>Assunto: " . $data['subject'] . "<br>Conteúdo: " . $data['content'];
                    $mail->AltBody = "Prezado(a) " . $data['name'] . "\n\nRecebi o seu e-mail.\nSerá lido o mais rápido possível.\nEm breve será respondido.\n\nAssunto: " . $data['subject'] . "\nConteúdo: " . $data['content'];

                    $mail->send();
                    
                    $mail->clearAddresses();

                    //Enviar e-mail para o colaborador 
                    $mail->setFrom('joao.jvm.marcelino@gmail.com', 'João Vítor');
                    $mail->addAddress('joao_marcelino@estudante.sc.senai.br', 'João');

                    $mail->isHTML(true);
                    $mail->Subject = $data['subject'];
                    $mail->Body = "Nome: " . $data['name'] . "<br>E-mail: " . $data['email'] . "<br>Assunto: " . $data['subject'] . "<br>Conteúdo: " . $data['content'];
                    $mail->AltBody = "Nome: " . $data['name'] . "\nE-mail: " . $data['email'] . "\nAssunto: " . $data['subject'] . "\nConteúdo: " . $data['content'];

                    $mail->send();
                    unset($data);
                    echo '<div class="alert alert-primary" role="alert">Mensagem de contato enviada com sucesso!</div>';                    
                } catch (Exception $e) {
                    echo "Erro: Mensagem de contato não enviada com sucesso!<br>";
                }
            } else {
                echo "Erro: Mensagem de contato não enviada com sucesso!<br>";
            }
        }
        ?>




    </body>
</html>
