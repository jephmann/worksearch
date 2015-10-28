<form id="form_login" method="post" action="">
    <fieldset>
        <legend>LOGIN</legend>
        <p>
            <?php echo $asterisk; ?> = Required fields.
        </p>
        <ul id="status" class="<?php echo $objStatus->class; ?>">
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
            <p>
                2015.09.07 test line
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
<script language="javascript" type="text/javascript" src="_login.js"></script>