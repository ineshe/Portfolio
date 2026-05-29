<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $redirectBack = static function (): void {
            header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
            exit();
        };

        $fail = static function (string $message, callable $redirectBack): void {
            $_SESSION['confirm'] = 'fail';
            unset($_SESSION['contact_csrf_token'], $_SESSION['contact_form_loaded_at']);
            $redirectBack();
        };

        $success = static function (callable $redirectBack): void {
            $_SESSION['confirm'] = 'success';
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

        $safeName    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $safeEmail   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

        require dirname(__DIR__, 4) . '/vendor/autoload.php';

        define('OWNER_EMAIL', 'dist@ines-heilmann.de');

        $smtpPassword = getenv('SMTP_PASSWORD');
        if ($smtpPassword === false || $smtpPassword === '') {
            error_log('Contact form: SMTP_PASSWORD environment variable is not set.');
            $fail('', $redirectBack);
        }

        $createMailer = static function () use ($smtpPassword): PHPMailer {
            $mailer = new PHPMailer(true);
            $mailer->isSMTP();
            $mailer->SMTPDebug  = SMTP::DEBUG_OFF;
            $mailer->Host       = 'mail.gmx.net';
            $mailer->SMTPAuth   = true;
            $mailer->Username   = OWNER_EMAIL;
            $mailer->Password   = $smtpPassword;
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mailer->Port       = 587;
            $mailer->CharSet    = 'UTF-8';
            return $mailer;
        };

        try {
            $mail = $createMailer();
            $mail->setFrom(OWNER_EMAIL, 'Ines Heilmann');
            $mail->addAddress(OWNER_EMAIL, 'Ines Heilmann');
            $mail->addReplyTo($email, $name);
            $mail->isHTML(true);
            $mail->Subject = 'Kontaktformular';
            $mail->Body    = '<p>' . $safeName . ' &lt;' . $safeEmail . '&gt; schrieb:</p><p>' . $safeMessage . '</p>';
            $mail->AltBody = $name . ' mit der E-Mail ' . $email . ' schrieb: ' . $message;
            $mail->send();

            $response = $createMailer();
            $response->setFrom(OWNER_EMAIL, 'Ines Heilmann');
            $response->addAddress($email, $name);
            $response->isHTML(true);
            $response->Subject = 'Danke für Ihre Nachricht';
            $response->Body    = '<p>Guten Tag ' . $safeName . ',</p><p>Vielen Dank für Ihre Nachricht! Ich habe sie erhalten und werde mich in Kürze bei Ihnen melden.</p><p>Mit freundlichen Grüßen<br>Ines Heilmann</p>';
            $response->AltBody = 'Guten Tag ' . $name . ', Vielen Dank für Ihre Nachricht! Ich habe sie erhalten und werde mich in Kürze bei Ihnen melden. Mit freundlichen Grüßen Ines Heilmann';
            $response->send();

            $_SESSION['contact_send_attempts'][] = $now;
            $success($redirectBack);

        } catch (Exception $e) {
            error_log('Contact form send failed: ' . $e->getMessage());
            $fail('', $redirectBack);
        }
    }
?>
