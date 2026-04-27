<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $redirectBack = static function (): void {
            header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
            exit();
        };

        $fail = static function (string $message, callable $redirectBack): void {
            $_SESSION['confirm'] = "<p class='confirm fail'>{$message}</p>";
            unset($_SESSION['contact_csrf_token'], $_SESSION['contact_form_loaded_at']);
            $redirectBack();
        };

        $success = static function (string $message, callable $redirectBack): void {
            $_SESSION['confirm'] = "<p class='confirm success'>{$message}</p>";
            unset($_SESSION['contact_csrf_token'], $_SESSION['contact_form_loaded_at']);
            $redirectBack();
        };

        $csrfToken = isset($_POST['csrf_token']) ? (string) $_POST['csrf_token'] : '';
        $sessionCsrfToken = isset($_SESSION['contact_csrf_token']) ? (string) $_SESSION['contact_csrf_token'] : '';

        if ($csrfToken === '' || $sessionCsrfToken === '' || !hash_equals($sessionCsrfToken, $csrfToken)) {
            $fail('Sicherheitsprüfung fehlgeschlagen. Bitte versuche es erneut.', $redirectBack);
        }

        // Honeypots should stay empty; filled values strongly indicate bot traffic.
        $honeypotWebsite = isset($_POST['website']) ? trim((string) $_POST['website']) : '';
        $honeypotLastname = isset($_POST['lname']) ? trim((string) $_POST['lname']) : '';
        $honeypotSalutation = isset($_POST['salutation']) ? trim((string) $_POST['salutation']) : '';

        if ($honeypotWebsite !== '' || $honeypotLastname !== '' || $honeypotSalutation !== '') {
            $fail('Sicherheitsprüfung fehlgeschlagen. Bitte versuche es erneut.', $redirectBack);
        }

        $postedStartedAt = isset($_POST['form_started_at']) ? (int) $_POST['form_started_at'] : 0;
        $sessionStartedAt = isset($_SESSION['contact_form_loaded_at']) ? (int) $_SESSION['contact_form_loaded_at'] : 0;

        if ($postedStartedAt <= 0 || $sessionStartedAt <= 0 || $postedStartedAt !== $sessionStartedAt) {
            $fail('Sicherheitsprüfung fehlgeschlagen. Bitte versuche es erneut.', $redirectBack);
        }

        $now = time();
        $secondsSinceLoad = $now - $sessionStartedAt;
        if ($secondsSinceLoad < 2 || $secondsSinceLoad > 3600) {
            $fail('Bitte sende das Formular erneut ab.', $redirectBack);
        }

        if (!isset($_SESSION['contact_send_attempts']) || !is_array($_SESSION['contact_send_attempts'])) {
            $_SESSION['contact_send_attempts'] = [];
        }

        $_SESSION['contact_send_attempts'] = array_values(
            array_filter(
                $_SESSION['contact_send_attempts'],
                static fn ($timestamp): bool => is_int($timestamp) && ($now - $timestamp) <= 3600
            )
        );

        if (count($_SESSION['contact_send_attempts']) >= 3) {
            $fail('Zu viele Anfragen in kurzer Zeit. Bitte versuche es spaeter erneut.', $redirectBack);
        }

        $name = trim((string) ($_POST['fname'] ?? ''));
        $email = trim((string) ($_POST['email'] ?? ''));
        $message = trim((string) ($_POST['message'] ?? ''));

        if ($name === '' || mb_strlen($name) < 2 || mb_strlen($name) > 60 || preg_match('/[\r\n]/', $name)) {
            $fail('Bitte gib einen gueltigen Namen ein.', $redirectBack);
        }

        if ($email === '' || mb_strlen($email) > 254 || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $fail('Bitte gib eine gueltige E-Mail-Adresse ein.', $redirectBack);
        }

        if ($message === '' || mb_strlen($message) < 10 || mb_strlen($message) > 3000) {
            $fail('Bitte gib eine Nachricht mit mindestens 10 Zeichen ein.', $redirectBack);
        }

        $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

        //Load Composer's autoloader
        require dirname(__DIR__, 5) . '/vendor/autoload.php';

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $response = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->isSMTP();                                        //Send using SMTP
            $mail->SMTPDebug  = SMTP::DEBUG_OFF;
            $mail->Host       = 'mail.gmx.net';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                //Enable SMTP authentication
            $mail->Username   = 'ines.heilmann1@gmx.de';                     //SMTP username
            $mail->Password   = getenv('SMTP_PASSWORD') ?: 'Nachricht';      //Prefer environment variable
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                 //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('ines.heilmann1@gmx.de', 'Ines Heilmann');
            $mail->addAddress('ines.heilmann1@gmx.de', 'Ines Heilmann');     //Add a recipient
            $mail->addReplyTo($email, $name);

            //Content
            $mail->isHTML(true);
            $mail->CharSet    = 'UTF-8';
            $mail->Subject = 'Kontaktformular';
            $mail->Body    = '<p>' . $safeName . ' &lt;' . $safeEmail . '&gt; schrieb:</p><p>' . $safeMessage . '</p>';
            $mail->AltBody = $name . ' mit der E-Mail ' . $email . ' schrieb: ' . $message;

            $mail->send();

            //Server settings
            $response->isSMTP();
            $response->SMTPDebug  = SMTP::DEBUG_OFF;
            $response->Host       = 'mail.gmx.net';                     //Set the SMTP server to send through
            $response->SMTPAuth   = true;
            $response->Username   = 'ines.heilmann1@gmx.de';                     //SMTP username
            $response->Password   = getenv('SMTP_PASSWORD') ?: 'Nachricht';      //Prefer environment variable
            $response->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $response->Port       = 587;

            //Recipients
            $response->setFrom('ines.heilmann1@gmx.de', 'Ines Heilmann');
            $response->addAddress($email, $name);     //Add a recipient

            //Content
            $response->isHTML(true);
            $response->CharSet    = 'UTF-8';
            $response->Subject = 'Empfangsbestätigung';
            $response->Body    = '<p>Guten Tag, ' . $safeName . '.</p><p>Ich habe Ihre E-Mail erhalten und werde mich in Kuerze mit Ihnen in Verbindung setzen.</p><p>Mit freundlichen Gruessen<br>Ines Heilmann</p>';
            $response->AltBody = 'Guten Tag, ' . $name . '. Ich habe Ihre E-Mail erhalten und werde mich in Kuerze mit Ihnen in Verbindung setzen. Mit freundlichen Gruessen Ines Heilmann';

            $response->send();
            $_SESSION['contact_send_attempts'][] = $now;
            $success('Ihre Nachricht wurde gesendet. Sie erhalten eine Empfangsbestaetigung an die angegebene E-Mail-Adresse.', $redirectBack);
            
        } catch (Exception $e) {
            error_log('Contact form send failed: ' . $e->getMessage());
            $fail('Ihre Nachricht konnte nicht gesendet werden. Bitte versuche es spaeter erneut.', $redirectBack);
        }
    }
?>