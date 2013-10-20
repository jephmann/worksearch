<form id="form_register" action="register.php" method="post">
    <fieldset>
        <legend>Register (Create a User)</legend>
        <p>
            <?php echo $asterisk; ?> = Required fields.
        </p>
        <ul style="background-color: #<?php echo $objStatus->background_color; ?>; color: #<?php echo $objStatus->color; ?>;">
            <?php echo $objStatus->message; ?>
        </ul>
        <div class="form_row">
            <label id="lblUsername">Username:<?php echo $asterisk; ?></label>
            <input type="text" name="user_username" value="<?php echo $objUser->username; ?>" />
        </div>
        <div class="form_row">
            <label id="lblEmail">E-Mail:<?php echo $asterisk; ?></label>
            <input type="text" name="user_email" value="<?php echo $objUser->email; ?>" />
        </div>
        <div class="form_row">
            <label id="lblPassword">Password:<?php echo $asterisk; ?></label>
            <input type="password" name="user_password" value="" />
        </div>
    </fieldset>
    <div class="button_row">
        <input type="submit" value="Register" />
    </div>
</form>
<script language="javascript" type="text/javascript" src="_register.js"></script>