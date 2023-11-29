<div class="ad-container">
    <div class="init-introtext">
        <h3>Contact</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
    </div>

    <?php
        if (isset($_POST['contact_submit'])) {
            include '../resources/contact_sec.php';
    ?>
        <h4>Thanks for contacting Café PHP</h4>
        <p>Please allow 24 hours for a response.</p>
        <p><a class="init-button" href="index.php">Now its time for some Coffee!</a></p>

    <?php } else { ?>
        <div class="init-container">
            <form method="post" action="" method="contact" target="_self">
                <p><input class="init-input" type="text" id="firstname" name="user_fname" placeholder="Firstname *" required>
                <input class="init-input" type="text" id="lastname" name="user_lname" placeholder="Lastname *" required></p>
                <p><input class="init-input" type="password" id="password" name="user_password" placeholder="A safe password ...  *" required>
                <input class="init-input" type="email" id="email" placeholder="Your email *" required name="user_email"></p>
                <p><textarea class="init-textarea" name="user_message" placeholder="Your message" required style="height:200px"></textarea></p>
                <input type="checkbox" id="subscribe" name="user_subscribe" value="Subscribe">
                <label for="subscribe">Subscribe to our newletter</label>

                <p><button class="init-button" type="submit" name="contact_submit">SEND MESSAGE</button>
                    <input class="init-button" type="reset" value="RESET"></input>
                </p>
            </form>
        </div>
    <?php } ?>
</div>