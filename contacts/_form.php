<form id="form_contact" method="post" action="">
    <fieldset>
        <legend>Contact</legend>
        <p>
            <?php echo $asterisk; ?> = Required fields.
        </p>
        <ul id="status" class="<?php echo $objStatus->class; ?>">
            <?php echo $objStatus->message; ?>
        </ul>
        <fieldset>
            <legend>Who</legend>
            <div class="form_row">
                <label id="lblGender">Gender:</label>
                <?php echo $rblGender; ?>
            </div>
            <div class="form_row">
                <label id="lblSalutation">Salutation:</label>
                <select name="salutation"><?php echo $optSalutations['options']; ?></select>
            </div>
            <div class="form_row">
                <label id="lblNameFirst">First Name:</label>
                <input type="text" name="name_first" value="<?php echo $objContact->name_first; ?>" maxlength="100" />
            </div>
            <div class="form_row">
                <label id="lblNameMiddle">Middle Name:</label>
                <input type="text" name="name_middle" value="<?php echo $objContact->name_middle; ?>" maxlength="100" />
            </div>
            <div class="form_row">
                <label id="lblNameLast">Last Name:<?php echo $asterisk; ?></label>
                <input type="text" name="name_last" value="<?php echo $objContact->name_last; ?>" maxlength="100" />
            </div>
            <div class="form_row">
                <label id="lblNameSuffix">Name Suffix:</label>
                <select name="name_suffix"><?php echo $optNameSuffixes['options']; ?></select>
            </div>
            <div class="form_row">
                <label id="lblRemarks">Personal Remarks/Notes:</label>
                <textarea name="remarks" rows="7" cols="33"><?php echo $objContact->remarks; ?></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend>Prospect</legend>
            <div class="form_row">
                <label id="lblProspect">Prospect:<?php echo $asterisk; ?></label>
                <select name="prospect"><?php echo $optProspects['options']; ?></select>
            </div>
            <div class="form_row">
                <label id="lblDepartment">Department:</label>
                <input type="text" name="department" value="<?php echo $objContact->department; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblTitle">Title:</label>
                <input type="text" name="title" value="<?php echo $objContact->title; ?>" maxlength="255" size="40" />
            </div>
        </fieldset>
        <fieldset>
            <legend>Communication</legend>
            <div class="form_row">
                <label id="lblPhone">Office Phone:</label>
                <input type="text" name="phone" value="<?php echo $objContact->phone; ?>" size="10" maxlength="10" />
            </div>
            <div class="form_row">
                <label id="lblPhoneExtension">Office Phone Extension:</label>
                x<input type="text" name="phone_extension" value="<?php echo $objContact->phone_extension; ?>" size="4" maxlength="4" />
            </div>
            <div class="form_row">
                <label id="lblFax">Office Fax:</label>
                <input type="text" name="fax" value="<?php echo $objContact->fax; ?>" size="10" maxlength="10" />
            </div>
            <div class="form_row">
                <label id="lblPhoneMobile">Mobile Phone:</label>
                <input type="text" name="phone_mobile" value="<?php echo $objContact->phone_mobile; ?>" size="10" maxlength="10" />
            </div>
            <div class="form_row">
                <label id="lblEmail">E-Mail:</label>
                <input type="text" name="contact_email" value="<?php echo $objContact->email; ?>" maxlength="255" />
            </div>
            <div class="form_row">
                <label id="lblSkype">Skype:</label>
                <input type="text" name="skype" value="<?php echo $objContact->skype; ?>" maxlength="255" size="40" />
            </div>
        </fieldset>
        <fieldset>
            <legend>Links</legend>
            <div class="form_row">
                <label id="lblWebsite">Website:</label>
                <input type="text" name="website" value="<?php echo $objContact->website; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblLinkedIn">LinkedIn:</label>
                <input type="text" name="linkedin" value="<?php echo $objContact->linkedin; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblTwitter">Twitter:</label>
                <input type="text" name="twitter" value="<?php echo $objContact->twitter; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblFacebook">Facebook:</label>
                <input type="text" name="facebook" value="<?php echo $objContact->facebook; ?>" maxlength="255" size="40" />
            </div>
            <div class="form_row">
                <label id="lblGooglePlus">GooglePlus:</label>
                <input type="text" name="googleplus" value="<?php echo $objContact->googleplus; ?>" maxlength="255" size="40" />
            </div>
        </fieldset>
    </fieldset>
    <div class="button_row">
        <input type="submit" value="<?php echo $page['mode']; ?>" />
    </div>
</form>
<script language="javascript" type="text/javascript" src="_form.js"></script>