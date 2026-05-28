<?php
    if (empty($_SESSION['contact_csrf_token'])) {
        $_SESSION['contact_csrf_token'] = bin2hex(random_bytes(32));
    }

    if (empty($_SESSION['contact_form_loaded_at'])) {
        $_SESSION['contact_form_loaded_at'] = time();
    }
?>

<section id="contact">
    <div class="section-sep"></div>
    <div class="contact-inner reveal">
        <div class="contact-header">
            <p class="section-eyebrow">Zusammenarbeiten?</p>
            <h2 class="section-heading" style="margin-bottom: 16px;">Kontakt</h2>
            <p class="contact-sub">Schreib mir gerne – ich freue mich auf deine Nachricht.</p>
        </div>

        <?php if (isset($_SESSION['confirm'])): ?>
        <?php $isSuccess = $_SESSION['confirm'] === 'success'; ?>
        <div class="contact-confirm <?= $isSuccess ? 'contact-confirm--success' : 'contact-confirm--fail' ?>">
            <div class="contact-confirm-icon">✓</div>
            <p class="contact-confirm-title">
                <?= $isSuccess ? 'Nachricht gesendet!' : 'Fehler beim Senden.' ?>
            </p>
            <p class="contact-confirm-sub">
                <?= $isSuccess ? 'Ich melde mich so schnell wie möglich.' : 'Bitte versuche es später erneut.' ?>
            </p>
        </div>
        <?php unset($_SESSION['confirm']); ?>
        <?php else: ?>
        <form class="contact-form" action="" method="POST" novalidate>
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['contact_csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
            <input type="hidden" name="form_started_at" value="<?= (int) $_SESSION['contact_form_loaded_at'] ?>">
            <input type="text" name="website" value="" autocomplete="off" tabindex="-1" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;pointer-events:none;height:0;width:0;">
            <div class="contact-row">
                <div class="contact-field">
                    <input type="text" id="fname" name="fname" placeholder="Name" required
                           pattern="^[^\d&quot;§$%&amp;/()=?²³{}\[\]\\@€~#&lt;&gt;|,;.:_*\-+]{1,60}$">
                </div>
                <div class="contact-field">
                    <input type="email" id="email" name="email" placeholder="E-Mail" required>
                </div>
            </div>
            <div class="contact-field">
                <textarea id="message" name="message" placeholder="Deine Nachricht…" rows="6" required></textarea>
            </div>
            <input type="hidden" name="lname" value="">
            <input type="hidden" name="salutation" value="">
            <button type="submit" name="submitBtn" class="btn-primary contact-submit">
                Senden →
            </button>
        </form>
        <?php endif; ?>
    </div>
</section>
