<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();

    if($_POST) {

        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $response = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.gmx.net';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'ines.heilmann1@gmx.de';                     //SMTP username
            $mail->Password   = 'Nachricht';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('ines.heilmann1@gmx.de', 'Ines Heilmann');
            $mail->addAddress('ines.heilmann1@gmx.de', 'Ines Heilmann');     //Add a recipient
            $mail->addReplyTo($_POST['email'], $_POST['fname'].' '.$_POST['lname']);

            //Content
            $mail->isHTML(true);
            $mail->CharSet    = 'UTF-8';
            $mail->Subject = 'Kontaktformular';
            $mail->Body    = nl2br('<p>'.$_POST['salutation'].' '.$_POST['fname'].' '.$_POST['lname'].' &lt;'.$_POST['email'].'&gt; schrieb: </p><p>'.$_POST['message'].'</p>');
            $mail->AltBody = $_POST['salutation'].' '.$_POST['fname'].' '.$_POST['lname'].' mit der E-Mail '.$_POST['email'].' schrieb: '.$_POST['message'];

            $mail->send();

            //Server settings
            $response->isSMTP();                                            //Send using SMTP
            $response->Host       = 'mail.gmx.net';                     //Set the SMTP server to send through
            $response->SMTPAuth   = true;                                   //Enable SMTP authentication
            $response->Username   = 'ines.heilmann1@gmx.de';                     //SMTP username
            $response->Password   = 'Nachricht';                               //SMTP password
            $response->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $response->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $response->setFrom('ines.heilmann1@gmx.de', 'Ines Heilmann');
            $response->addAddress($_POST['email'], $_POST['fname'].' '.$_POST['lname']);     //Add a recipient

            //Content
            $response->isHTML(true);
            $response->CharSet    = 'UTF-8';
            $response->Subject = 'Empfangsbestätigung';
            $response->Body    = '<p>Guten Tag, '.$_POST['salutation'].' '.$_POST['lname'].'. </p><p>Ich habe Ihre E-Mail erhalten und werde mich in Kürze mit Ihnen in Verbindung setzen.</p><p>Mit freundlichen Grüßen<br>Ines Heilmann';
            $response->AltBody = 'Guten Tag, '.$_POST['salutation'].' '.$_POST['lname'].'. Ich habe Ihre E-Mail erhalten und werde mich in Kürze mit Ihnen in Verbindung setzen. Mit freundlichen Grüßen Ines Heilmann';

            $response->send();
            $_SESSION['confirm'] = '<p class="confirm success">Ihre Nachricht wurde gesendet. Sie erhalten eine Empfangsbestätigung an die angegebene E-Mail-Adresse.</p>';

            //Redirect
            header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
            
        } catch (Exception $e) {
            $_SESSION['confirm'] = "<p class='confirm fail'>Ihre Nachricht konnte nicht gesendet werden. Mailer Error: {$mail->ErrorInfo}</p>";
            
            //Redirect
            header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
        }
        exit();
    }
?>