<p>
    <?php echo $asterisk; ?> = Required fields.
</p>
<form method="post" action="">
    <fieldset>
        <legend>LOGIN</legend>
        <ul style="background-color: #<?php echo $objStatus->background_color; ?>; color: #<?php echo $objStatus->color; ?>;">
            <?php echo $objStatus->message; ?>
        </ul>
        <div class="notes">
            <h3>Login Notes</h3>
            <p>
                A successful Login redirects you to Welcome; all navigation is
                displayed.
            </p>
            <p>
                An unsuccessful Login may trigger "forget Login" logic. Maybe "delete
                Profile" as well?
            </p>
        </div>
        <div class="form_row">
            <label id="lblUsername">Username:<?php echo $asterisk; ?></label>
            <input type="text" name="login_username" value="<?php echo $submitted_username; ?>" maxlength="255" />
        </div>
        <div class="form_row">
            <label id="lblPassword">Password:<?php echo $asterisk; ?></label>
            <input type="password" name="login_password" value="" maxlength="255" />
        </div>
    </fieldset>
    <div class="button_row">
        <input type="submit" value="<?php echo $page['mode']; ?>" />
    </div>
</form>