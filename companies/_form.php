<ul style="background-color: #<?php echo $objStatus->background_color; ?>; color: #<?php echo $objStatus->color; ?>;">
    <?php echo $objStatus->message; ?>
</ul>
<form method="post" action="">
    <fieldset>
        <legend>Company</legend>
        <fieldset>
            <legend>About the Company</legend>                
            <div class="form_row">
                <label id="lblName">Name:</label>
                <input type="text" name="name" value="<?php echo $objCompany->name; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblIndustry">Industry:</label>
                <input type="text" name="industry" value="<?php echo $objCompany->industry; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblRecruiter">Recruiter:</label>
                <?php echo $rblRecruiter; ?>
            </div>
            <div class="form_row">
                <label id="lblDescription">Description:</label>
                <textarea name="description" rows="7" cols="33" /><?php echo $objCompany->description; ?></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend>Address</legend>
            <div class="form_row">
                <label id="lblBuilding">Building:</label>
                <input type="text" name="address_building" value="<?php echo $objCompany->address_building; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblStreet">Street:</label>
                <input type="text" name="address_street" value="<?php echo $objCompany->address_street; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblUnit">Unit:</label>
                <input type="text" name="address_unit" value="<?php echo $objCompany->address_unit; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblCity">City:</label>
                <input type="text" name="address_city" value="<?php echo $objCompany->address_city; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblState">State:</label>
                <select name="address_state"><?php echo $optStates; ?></select>
            </div>
            <div class="form_row">
                <label id="lblPostal">ZIP:</label>
                <input type="text" name="address_zip5" value="<?php echo $objCompany->address_zip5; ?>" size="5" maxlength="5" />
                -
                <input type="text" name="address_zip4" value="<?php echo $objCompany->address_zip4; ?>" size="4" maxlength="4" />
            </div>
        </fieldset>
        <fieldset>
            <legend>Communication</legend>
            <div class="form_row">
                <label id="lblPhone">Phone:</label>
                <input type="text" name="phone" value="<?php echo $objCompany->phone; ?>" size="10" maxlength="10" />
                x
                <input type="text" name="phone_extension" value="<?php echo $objCompany->phone_extension; ?>" size="4" maxlength="4" />
            </div>
            <div class="form_row">
                <label id="lblFax">Fax:</label>
                <input type="text" name="fax" value="<?php echo $objCompany->fax; ?>" size="10" maxlength="10" />
            </div>
            <div class="form_row">
                <label id="lblEmail">E-Mail:</label>
                <input type="text" name="email" value="<?php echo $objCompany->email; ?>" maxlength="255" size="40" />
            </div>
        </fieldset>
        <fieldset>
            <legend>Links</legend>
            <div class="form_row">
                <label id="lblWebsite">Website:</label>
                <input type="text" name="website" value="<?php echo $objCompany->website; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblLinkedIn">LinkedIn:</label>
                <input type="text" name="linkedin" value="<?php echo $objCompany->linkedin; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblTwitter">Twitter:</label>
                <input type="text" name="twitter" value="<?php echo $objCompany->twitter; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblFacebook">Facebook:</label>
                <input type="text" name="facebook" value="<?php echo $objCompany->facebook; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblGooglePlus">GooglePlus:</label>
                <input type="text" name="googleplus" value="<?php echo $objCompany->googleplus; ?>" maxlength="255" size="40" />
            </div>
        </fieldset>
        <div class="form_row">
            <label id="lblContact">Add Contact to This Company NOW:</label>
            <?php echo $rblContact; ?>
        </div>
    </fieldset>
    <div class="button_row">
        <input type="submit" value="<?php echo $page['mode']; ?>" />
    </div>
</form>