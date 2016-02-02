<?php
    /*
     * INPUTS
     */
    // About the Contact
    $rblGender      = Input::make_rbl('lblGender', 'Gender', $optGender);
    $ddlSalutation  = Input::make_ddl('lblSalutation', 'Salutation', 'salutation', $optSalutations['options']);
    $txtNameFirst   = Input::make_txt('lblNameFirst', 'First Name', 'name_first', $objContact->name_first);
    $txtNameMiddle  = Input::make_txt('lblNameMiddle', 'Middle Name', 'name_middle', $objContact->name_middle);
    $txtNameLast    = Input::make_txt('lblNameLast', 'Last Name', 'name_last', $objContact->name_last);
    $ddlNameSuffix  = Input::make_ddl('lblNameSuffix', 'Name Suffix', 'name_suffix', $optNameSuffixes['options']);
    $txtRemarks     = Input::make_txtarea('lblRemarks', 'Personal Remarks/Notes', 'remarks', $objContact->remarks);
    // Contact Prospect
    $ddlProspect    = Input::make_ddl('lblProspect', 'Prospect', 'prospect', $optProspects['options']);
    $txtDepartment  = Input::make_txt('lblDepartment', 'Department', 'department', $objContact->department, 255);
    $txtTitle       = Input::make_txt('lblTitle', 'Title', 'title', $objContact->title, 255);
    // Contact Communication
    $txtPhone       = Input::make_txt('lblPhone', 'Office Phone', 'phone', $objContact->phone, 10);
    $txtPhoneExt    = Input::make_txt('lblPhoneExt', 'Office Phone Extension', 'phone_extension', $objContact->phone_extension, 5);
    $txtPhoneMobile = Input::make_txt('lblPhoneMobile', 'Mobile Phone', 'phone_mobile', $objContact->phone_mobile, 10);
    $txtFax         = Input::make_txt('lblFax', 'Office Fax', 'fax', $objContact->fax, 10);
    $emlEmail       = Input::make_eml('lblEmail', 'Office E-Mail', 'profile_email', $objContact->email);
    $txtSkype       = Input::make_txt('lblSkype', 'Office Skype', 'skype', $objContact->skype, 255);
    // Contact Links
    $urlWebsite     = Input::make_url('lblWebsite', 'Website', 'website', $objContact->website);
    $urlLinkedIn    = Input::make_url('lblLinkedIn', 'LinkedIn', 'linkedin', $objContact->linkedin);
    $urlTwitter     = Input::make_url('lblTwitter', 'Twitter', 'twitter', $objContact->twitter);
    $urlFacebook    = Input::make_url('lblFacebook', 'Facebook', 'facebook', $objContact->facebook);
    $urlGooglePlus  = Input::make_url('lblGooglePlus', 'GooglePlus', 'googleplus', $objContact->googleplus);
    // Buttons
    $btnSubmit      = Input::make_btn('submit', $page['mode'], "{$page['mode']} Contact");
?>
<form class="form-labels-on-top" method="post" id="form_contact" action="">

    <div class="form-title-row">
        <h1><?php echo $page['mode']; ?>&nbsp;Contact</h1>
        <ul id="status" class="status_quo">
            <?php echo $objStatus->message; ?>
        </ul>        
    </div>
    
    <div class="form-row">
        <h3>About the Contact</h3>
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
        <?php echo $txtRemarks; ?>
    </div>
    
    <div class="form-row">
        <h3>Contact Prospect</h3>
    </div>

    <div class="form-row">
        <?php echo $ddlProspect; ?>
    </div>
    
    <div class="form-row">
        <?php echo $txtDepartment; ?>
    </div>
    
    <div class="form-row">
        <?php echo $txtTitle; ?>
    </div>
    
    <div class="form-row">
        <h3>Contact Communication</h3>
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
        <h3>Contact Links</h3>
    </div>
    
    <div class="form-row">
        <?php echo $urlWebsite; ?>
    </div>

    <div class="form-row">
        <?php echo $urlLinkedIn; ?>
    </div>

    <div class="form-row">
        <?php echo $urlTwitter; ?>
    </div>

    <div class="form-row">
        <?php echo $urlFacebook; ?>
    </div>

    <div class="form-row">
        <?php echo $urlGooglePlus; ?>
    </div>    
    
    <div class="form_row">
        <?php echo $btnSubmit; ?>
    </div>
    
</form>