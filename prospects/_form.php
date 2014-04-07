<form id="form_prospect" method="post" action="">
    <fieldset>
        <legend>Prospect</legend>
        <p>
            <?php echo $asterisk; ?> = Required fields.
        </p>
        <ul id="status" name="status" class="<?php echo $objStatus->class; ?>">
            <?php echo $objStatus->message; ?>
        </ul>
        <fieldset>
            <legend>About the Prospect</legend>                
            <div class="form_row">
                <label id="lblName">Name:<?php echo $asterisk; ?></label>
                <input type="text" name="prospect_name" value="<?php echo $objProspect->name; ?>" maxlength="255" size="40" />
            </div>                
            <div class="form_row">
                <label id="lblBranch">Branch:</label>
                <input type="text" name="prospect_branch" value="<?php echo $objProspect->branch; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblIndustry">Industry:</label>
                <input type="text" name="prospect_industry" value="<?php echo $objProspect->industry; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblRecruiter">Recruiter:<?php echo $asterisk; ?></label>
                <?php echo $rblRecruiter; ?>
            </div>
            <div class="form_row">
                <label id="lblDescription">Description:</label>
                <textarea name="prospect_description" rows="7" cols="33" /><?php echo $objProspect->description; ?></textarea>
            </div>
            <div class="form_row">
                <label id="lblRemarks">Personal Remarks/Notes:</label>
                <textarea name="remarks" rows="7" cols="33"><?php echo $objProspect->remarks; ?></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend>Address</legend>
            <div class="form_row">
                <label id="lblBuilding">Building:</label>
                <input type="text" name="address_building" value="<?php echo $objProspect->address_building; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblStreet">Street:<?php echo $asterisk; ?></label>
                <input type="text" name="address_street" value="<?php echo $objProspect->address_street; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblUnit">Unit:</label>
                <input type="text" name="address_unit" value="<?php echo $objProspect->address_unit; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblCity">City:<?php echo $asterisk; ?></label>
                <input type="text" name="address_city" value="<?php echo $objProspect->address_city; ?>" maxlength="100" size="40" />
            </div>
            <div class="form_row">
                <label id="lblState">State:<?php echo $asterisk; ?></label>
                <select name="address_state"><?php echo $optStates['options']; ?></select>
            </div>
            <div class="form_row">
                <label id="lblAddressZip5">ZIP:</label>
                <input type="text" name="address_zip5" value="<?php echo $objProspect->address_zip5; ?>" size="5" maxlength="5" />
            </div>
            <div class="form_row">
                <label id="lblAddressZip4">ZIP Extension:</label>
                -<input type="text" name="address_zip4" value="<?php echo $objProspect->address_zip4; ?>" size="4" maxlength="4" />
            </div>
        </fieldset>
        <fieldset>
            <legend>Communication</legend>
            <div class="form_row">
                <label id="lblPhone">Phone:</label>
                <input type="text" name="phone" value="<?php echo $objProspect->phone; ?>" size="10" maxlength="10" />
            </div>
            <div class="form_row">
                <label id="lblPhoneExtension">Phone Extension:</label>
                x<input type="text" name="phone_extension" value="<?php echo $objProspect->phone_extension; ?>" size="4" maxlength="4" />
            </div>
            <div class="form_row">
                <label id="lblFax">Fax:</label>
                <input type="text" name="fax" value="<?php echo $objProspect->fax; ?>" size="10" maxlength="10" />
            </div>
            <div class="form_row">
                <label id="lblEmail">E-Mail:</label>
                <input type="text" name="prospect_email" value="<?php echo $objProspect->email; ?>" maxlength="255" size="40" />
            </div>
        </fieldset>
        <fieldset>
            <legend>Links</legend>
            <div class="form_row">
                <label id="lblWebsite">Website:</label>
                <input type="text" name="website" value="<?php echo $objProspect->website; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblLinkedIn">LinkedIn:</label>
                <input type="text" name="linkedin" value="<?php echo $objProspect->linkedin; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblTwitter">Twitter:</label>
                <input type="text" name="twitter" value="<?php echo $objProspect->twitter; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblFacebook">Facebook:</label>
                <input type="text" name="facebook" value="<?php echo $objProspect->facebook; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblGooglePlus">GooglePlus:</label>
                <input type="text" name="googleplus" value="<?php echo $objProspect->googleplus; ?>" maxlength="255" size="40" />
            </div>
        </fieldset>
        <div class="form_row">
            <label id="lblContact">Add Contact to This Prospect NOW:<?php echo $asterisk; ?></label>
            <?php echo $rblContact; ?>
        </div>
    </fieldset>
    <div class="button_row">
        <input type="submit" value="<?php echo $page['mode']; ?>" />
    </div>
</form>
<script language="javascript" type="text/javascript" src="_form.js"></script>