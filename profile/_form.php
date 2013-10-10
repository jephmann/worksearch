<form method="post" action="">
    <fieldset>
        <legend>Profile</legend>
        <p>
            <?php echo $asterisk; ?> = Required fields.
        </p>
        <ul style="background-color: #<?php echo $objStatus->background_color; ?>; color: #<?php echo $objStatus->color; ?>;">
            <?php echo $objStatus->message; ?>
        </ul>
        <fieldset>
            <legend>Who Are You?</legend>
            <div class="form_row">
                <label id="lblGender">Gender:</label>
                <?php echo $rblGender; ?>
            </div>
            <div class="form_row">
                <label id="lblSalutation">Salutation:</label>
                <select name="salutation"><?php echo $optSalutations; ?></select>
            </div>
            <div class="form_row">
                <label id="lblNameFirst">First Name:</label>
                <input type="text" name="name_first" value="<?php echo $objProfile->name_first; ?>" maxlength="100" />
            </div>
            <div class="form_row">
                <label id="lblNameMiddle">Middle Name:</label>
                <input type="text" name="name_middle" value="<?php echo $objProfile->name_middle; ?>" maxlength="100" />
            </div>
            <div class="form_row">
                <label id="lblNameLast">Last Name:<?php echo $asterisk; ?></label>
                <input type="text" name="name_last" value="<?php echo $objProfile->name_last; ?>" maxlength="100" />
            </div>
            <div class="form_row">
                <label id="lblNameSuffix">Name Suffix:</label>
                <select name="name_suffix"><?php echo $optNameSuffixes; ?></select>
            </div>
            <div class="form_row">
                <label id="lblDateBirth">Born:</label>
                <select name="birth_date_mm"><?php echo $optBirthDateMM; ?></select>
                <select name="birth_date_dd"><?php echo $optBirthDateDD; ?></select>
                <select name="birth_date_yyyy"><?php echo $optBirthDateYYYY; ?></select>
            </div>
        </fieldset>
        <fieldset>
            <legend>Address</legend>
            <div class="form_row">
                <label id="lblAddressBuilding">Building:</label>
                <input type="text" name="address_building" value="<?php echo $objProfile->address_building; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblAddressStreet">Street:</label>
                <input type="text" name="address_street" value="<?php echo $objProfile->address_street; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblAddressUnit">Unit:</label>
                <input type="text" name="address_unit" value="<?php echo $objProfile->address_unit; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblAddressCity">City:</label>
                <input type="text" name="address_city" value="<?php echo $objProfile->address_city; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblAddressState">State:</label>
                <select name="address_state"><?php echo $optStates; ?></select>
            </div>
            <div class="form_row">
                <label id="lblAddressPostal">ZIP:</label>
                <input type="text" name="address_zip5" value="<?php echo $objProfile->address_zip5; ?>" size="5" maxlength="5" />
                -
                <input type="text" name="address_zip4" value="<?php echo $objProfile->address_zip4; ?>" size="4" maxlength="4" />
            </div>
        </fieldset>
        <fieldset>
            <legend>Communication</legend>
            <div class="form_row">
                <label id="lblPhone">Phone:</label>
                <input type="text" name="phone" value="<?php echo $objProfile->phone; ?>" size="10" maxlength="10" />
                x
                <input type="text" name="phone_extension" value="<?php echo $objProfile->phone_extension; ?>" size="4" maxlength="4" />
            </div>
            <div class="form_row">
                <label id="lblFax">Fax:</label>
                <input type="text" name="fax" value="<?php echo $objProfile->fax; ?>" size="10" maxlength="10" />
            </div>
            <div class="form_row">
                <label id="lblEmail">E-Mail:</label>
                <input type="text" name="email" value="<?php echo $objProfile->email; ?>" maxlength="255" size="40" />
            </div>
        </fieldset>
        <fieldset>
            <legend>Identification</legend>
            <div class="form_row">
                <label id="lblSocialSecurityNumber">Social Security Number:</label>
                <input type="text" name="social_security_number" value="<?php echo $objProfile->social_security_number; ?>" maxlength="9" size="9" />
            </div>
            <div class="form_row">
                <label id="lblDriversLicense">Drivers License:</label>
                <input type="text" name="drivers_license" value="<?php echo $objProfile->drivers_license; ?>" maxlength="12" size="12" />
            </div>
            <div class="form_row">
                <label id="lblDriversState">Drivers State:</label>
                <select name="drivers_state"><?php echo $optDriversStates; ?></select>
            </div>
        </fieldset>
    </fieldset>
    <div class="button_row">
        <input type="submit" value="<?php echo $page['mode']; ?>" />
    </div>
</form>