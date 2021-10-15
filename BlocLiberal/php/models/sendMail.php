<?php 

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

    function generate_body($login,$password){
        $body = "<h3>Invitation à l'administration du site de BL</h3>";
        $body .= "<p>Vous avez été ajouté en tant que administrateur du site du bloc liberal.<br>Voici vos information d'accès:</p>";
        $body .= "<h4>Login : ".$login." </h4>";
        $body .= "<h5>Mot de passe : ".$password."</h5>";
        $body .= "<a href='#'>Acceder à l'administration ici.</a>";

        return $body;
    }


	function send_mail($to,$name,$password){
        $mail = new PHPMailer(true);
		
        try{
            $mail->isSMTP(true);
            
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->SMTPAuth = true;
            $mail->Mailer = "smtp";
            $mail->SMTPSecure = "tls";
            $mail->Host = 'smtp.gmail.com';
            $mail->Username = "sagno.felix.sf@gmail.com";
            $mail->Password = "0625248758";
            $mail->Port = 587;
            $mail->CharSet = "utf-8";

            $mail->setFrom('no-reply-blocliberal@gmail.com',"Administration du BlocLibéral");
            $mail->addAddress($to, $name);     
            

            $mail->isHTML(true);
            $mail->Subject = 'Ajout ajout comme administrateur';
            $mail->Body    = generate_body($to,$password);
            
            if($mail->send()){
                return true;
            }else{
                $_SESSION['sendMailerror'] = "L'administrateur ".$name." n'a pas été ajouté, verifiez que l'e-mail est fonctionnel ou l'état de votre connexion internet.";
                return false;
            }
            
        }catch (Exception $e){
            $_SESSION['sendMailerror'] = "L'administrateur ".$name." n'a pas été ajouté, verifiez que l'e-mail est fonctionnel ou l'état de votre connexion internet.";
            return false;
        }
	}