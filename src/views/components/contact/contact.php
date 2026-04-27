<?php include_once __DIR__ . '/mail.php'; ?>

<section id="contact">
    <div class="section-sep"></div>
    <div class="contact-inner reveal">
        <div class="contact-header">
            <p class="section-eyebrow">Zusammenarbeiten?</p>
            <h2 class="section-heading" style="margin-bottom: 16px;">Kontakt</h2>
            <p class="contact-sub">Schreib mir gerne – ich freue mich auf deine Nachricht.</p>
        </div>

        <?php if (isset($_SESSION['confirm'])): ?>
        <div class="contact-confirm <?= strpos($_SESSION['confirm'], 'success') !== false ? 'contact-confirm--success' : 'contact-confirm--fail' ?>">
            <div class="contact-confirm-icon">✓</div>
            <p class="contact-confirm-title">
                <?= strpos($_SESSION['confirm'], 'success') !== false ? 'Nachricht gesendet!' : 'Fehler beim Senden.' ?>
            </p>
            <p class="contact-confirm-sub">
                <?= strpos($_SESSION['confirm'], 'success') !== false
                    ? 'Ich melde mich so schnell wie möglich.'
                    : 'Bitte versuche es später erneut.' ?>
            </p>
        </div>
        <?php unset($_SESSION['confirm']); ?>
        <?php else: ?>
        <form class="contact-form" action="" method="POST" novalidate>
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
