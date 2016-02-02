<?php
    /*
     * INPUTS
     */
    // Who Are You
    $rblGender      = Input::make_rbl('lblGender', 'Gender', $optGender);
    $ddlSalutation  = Input::make_ddl('lblSalutation', 'Salutation', 'salutation', $optSalutations['options']);
    $txtNameFirst   = Input::make_txt('lblNameFirst', 'First Name', 'name_first', $objProfile->name_first);
    $txtNameMiddle  = Input::make_txt('lblNameMiddle', 'Middle Name', 'name_middle', $objProfile->name_middle);
    $txtNameLast    = Input::make_txt('lblNameLast', 'Last Name', 'name_last', $objProfile->name_last);
    $ddlNameSuffix  = Input::make_ddl('lblNameSuffix', 'Name Suffix', 'name_suffix', $optNameSuffixes['options']);
    /* date birth */
    $txtRemarks     = Input::make_txtarea('lblRemarks', 'Personal Remarks/Notes', 'remarks', $objProfile->remarks);
    // Your Address
    $txtBuilding    = Input::make_txt('lblBuilding', 'Building', 'address_building', $objProfile->address_building);
    $txtStreet      = Input::make_txt('lblStreet', 'Street', 'address_street', $objProfile->address_street);
    $txtUnit        = Input::make_txt('lblUnit', 'Unit', 'address_unit', $objProfile->address_unit);
    $txtCity        = Input::make_txt('lblCity', 'City', 'address_city', $objProfile->address_city);
    $ddlState       = Input::make_ddl('lblState', 'State', 'address_state', $optStates['options']);
    $txtZip5        = Input::make_txt('lblZip5', 'ZIP Code', 'address_zip5', $objProfile->address_zip5, 5);
    $txtZip4        = Input::make_txt('lblZip4', 'ZIP Extension', 'address_zip4', $objProfile->address_zip4, 4);
    // Your Communication
    $txtPhone       = Input::make_txt('lblPhone', 'Phone', 'phone', $objProfile->phone, 10);
    $txtPhoneExt    = Input::make_txt('lblPhoneExt', 'Phone Extension', 'phone_extension', $objProfile->phone_extension, 5);
    $txtPhoneMobile = Input::make_txt('lblPhoneMobile', 'Mobile Phone', 'phone_mobile', $objProfile->phone_mobile, 10);
    $txtFax         = Input::make_txt('lblFax', 'Fax', 'fax', $objProfile->fax, 10);
    $emlEmail       = Input::make_eml('lblEmail', 'E-Mail', 'profile_email', $objProfile->email);
    $txtSkype       = Input::make_txt('lblSkype', 'Skype', 'skype', $objProfile->skype, 255);
    // Your Identification
    $txtSocialSecurityNumber    = Input::make_txt('lblSocialSecurityNumber', 'Social Security Number', 'social_security_number', $objProfile->social_security_number, 9);
    $txtDriversLicense          = Input::make_txt('lblDriversLicense', 'Drivers License', 'drivers_license', $objProfile->drivers_license, 12);
    $ddlDriversState            = Input::make_ddl('lblDriversState', 'Drivers State', 'drivers_state', $optDriversStates['options']);
    // Buttons
    $btnSubmit                  = Input::make_btn('submit', $page['mode'], "{$page['mode']} Profile");
?>
<form class="form-labels-on-top" method="post" id="form_profile" action="">

    <div class="form-title-row">
        <h1><?php echo $page['mode']; ?>&nbsp;Profile</h1>
        <p>* = Required fields</p>        
        <ul>
            <li><a title="Create New <?php echo $page['title']; ?>" href="create.php">Create</a></li>
            <li><a title="Update This <?php echo $page['title']; ?>" href="update.php">Update</a></li>
            <li><a title="Delete This <?php echo $page['title']; ?>" href="delete.php">Delete</a></li>
        </ul>
        
        <ul id="status" class="status_quo">
            <?php echo $objStatus->message; ?>
        </ul>
        
    </div>
    
    <div class="form-row">
        <h3>Who Are You?</h3>
    </div>
    
    <div class="form-row">
        <?php echo $rblGender; ?>
    </div>

    <div class="form-row">
        <?php echo $ddlSalutation; ?>
    </div>

    <div class="form-row">
        <?php echo $txtNameFirst; ?>
    </div>

    <div class="form-row">
        <?php echo $txtNameMiddle; ?>
    </div>

    <div class="form-row">
        <?php echo $txtNameLast; ?>
    </div>

    <div class="form-row">
        <?php echo $ddlNameSuffix; ?>
    </div>

    <div class="form-row">
        <label id="lblDateBirth">
            <span>Born</span>
            <select name="birth_date_mm">
                <?php echo $optBirthDateMM; ?>
            </select>
            <select name="birth_date_dd">
                <?php echo $optBirthDateDD; ?>
            </select>
            <select name="birth_date_yyyy">
                <?php echo $optBirthDateYYYY; ?>
            </select>
        </label>
    </div>
    
    <div class="form-row">
        <?php echo $txtRemarks; ?>
    </div>
    
    <div class="form-row">
        <h3>Your Address</h3>
    </div>
    
    <div class="form-row">
        <?php echo $txtBuilding; ?>
    </div>

    <div class="form-row">
        <?php echo $txtStreet; ?>
    </div>

    <div class="form-row">
        <?php echo $txtUnit; ?>
    </div>

    <div class="form-row">
        <?php echo $txtCity; ?>
    </div>

    <div class="form-row">
        <?php echo $ddlState; ?>
    </div>
    
    <div class="form-row">
        <?php echo $txtZip5; ?>
    </div>

    <div class="form-row">
        <?php echo $txtZip4; ?>
    </div>
    
    <div class="form-row">
        <h3>Your Communication</h3>
    </div>
    
    <div class="form-row">
        <?php echo $txtPhone; ?>
    </div>

    <div class="form-row">
        <?php echo $txtPhoneExt; ?>
    </div>

    <div class="form-row">
        <?php echo $txtPhoneMobile; ?>
    </div>

    <div class="form-row">
        <?php echo $txtFax; ?>
    </div>

    <div class="form-row">
        <?php echo $emlEmail; ?>
    </div>

    <div class="form-row">
        <?php echo $txtSkype; ?>
    </div>
    
    <div class="form-row">
        <h3>Your Identification</h3>
    </div>
    
    <div class="form-row">
        <?php echo $txtSocialSecurityNumber; ?>
    </div>

    <div class="form-row">
        <?php echo $txtDriversLicense; ?>
    </div>
        
    <div class="form-row">
        <?php echo $ddlDriversState; ?>
    </div>    
    
    <div class="form_row">
        <?php echo $btnSubmit; ?>
    </div>
    
</form>