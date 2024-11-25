<article id="contact" style="display: none;">
    <h2>Kontakt</h2>
    <form action="" method="POST" novalidate>
        <div class="radio-buttons">
            <label for="male">Herr
                <input type="radio" id="male" name="salutation" value="Herr">
                <span class="my-radio"></span>
            </label>
            <label for="female">Frau
                <input type="radio" id="female" name="salutation" value="Frau">
                <span class="my-radio"></span>
            </label>
        </div>

        <p class="error">Errormessage wird hier ausgegeben.</p>
        <label for="fname">Vorname*:</label><!-- 
        --><input type="text" id= "fname" name="fname" required pattern='^[^0-9!"§$%&/()=?²³{}\[\]\\@€~#<>|,;.:_*-+]{1,30}$'>
        
        <p class="error">Errormessage wird hier ausgegeben.</p>
        <label for="lname">Nachname*:</label><!-- 
        --><input type="text" id= "lname" name="lname" required pattern='^[^0-9!"§$%&/()=?²³{}\[\]\\@€~#<>|,;.:_*-+]{1,30}$'>
        
        <p class="error">Errormessage wird hier ausgegeben.</p>
        <label for="email">E-Mail*:</label><!-- 
        --><input type="email" id="email" name="email" required>                    

        <p class="error">Errormessage wird hier ausgegeben.</p>
        <label for="message">Nachricht*:</label><!-- 
        --><textarea id="message" name="message" rows="5" required></textarea>
        
        <button class="btn g-recaptcha" type="submit" name="submitBtn" 
            data-sitekey="<?php echo MAIN_KEY; ?>" data-callback='onSubmit' data-action='homepage'>Senden</button>
        <?php
            if (isset($_SESSION['confirm'])) {
                echo $_SESSION['confirm'];
                unset($_SESSION['confirm']);
            }
        ?>
    </form>
</article>