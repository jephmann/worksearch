<?php
    /*
     * INPUTS
     */
    // About the Prospect
    $txtName        = Input::make_txt('lblName', 'Name', 'prospect_name', $objProspect->name, 255);
    $txtBranch      = Input::make_txt('lblBranch', 'Branch', 'prospect_branch', $objProspect->branch, 255);
    $txtIndustry    = Input::make_txt('lblIndustry', 'Industry', 'prospect_industry', $objProspect->industry, 255);
    $rblRecruiter   = Input::make_rbl('lblRecruiter', 'Recruiter?', $optRecruiter);
    $txtDescription = Input::make_txtarea('lblDescription', 'Description', 'prospect_description', $objProspect->description);
    $txtRemarks     = Input::make_txtarea('lblRemarks', 'Personal Remarks/Notes', 'remarks', $objProspect->remarks);
    // Prospect Address
    $txtBuilding    = Input::make_txt('lblBuilding', 'Building', 'address_building', $objProspect->address_building);
    $txtStreet      = Input::make_txt('lblStreet', 'Street', 'address_street', $objProspect->address_street);
    $txtUnit        = Input::make_txt('lblUnit', 'Unit', 'address_unit', $objProspect->address_unit);
    $txtCity        = Input::make_txt('lblCity', 'City', 'address_city', $objProspect->address_city);
    $ddlState       = Input::make_ddl('lblState', 'State', 'address_state', $optStates['options']);
    $txtZip5        = Input::make_txt('lblZip5', 'ZIP Code', 'address_zip5', $objProspect->address_zip5, 5);
    $txtZip4        = Input::make_txt('lblZip4', 'ZIP Extension', 'address_zip4', $objProspect->address_zip4, 4);
    // Prospect Communication
    $txtPhone       = Input::make_txt('lblPhone', 'Phone', 'phone', $objProspect->phone, 10);
    $txtPhoneExt    = Input::make_txt('lblPhoneExt', 'Phone Extension', 'phone_extension', $objProspect->phone_extension, 5);
    $txtFax         = Input::make_txt('lblFax', 'Fax', 'fax', $objProspect->fax, 10);
    $emlEmail       = Input::make_eml('lblEmail', 'E-Mail', 'prospect_email', $objProspect->email);
    // Prospect Links
    $urlWebsite     = Input::make_url('lblWebsite', 'Website', 'website', $objProspect->website);
    $urlLinkedIn    = Input::make_url('lblLinkedIn', 'LinkedIn', 'linkedin', $objProspect->linkedin);
    $urlTwitter     = Input::make_url('lblTwitter', 'Twitter', 'twitter', $objProspect->twitter);
    $urlFacebook    = Input::make_url('lblFacebook', 'Facebook', 'facebook', $objProspect->facebook);
    $urlGooglePlus  = Input::make_url('lblGooglePlus', 'GooglePlus', 'googleplus', $objProspect->googleplus);
    // Prospect Next Steps
    $rblContactNow  = Input::make_rbl('lblContact', 'Add Contact to This Prospect NOW?', $optContact);
    // Buttons
    $btnSubmit      = Input::make_btn('submit', $page['mode'], "{$page['mode']} Prospect");
?>
<form class="form-labels-on-top" method="post" id="form_prospect" action="">

    <div class="form-title-row">
        <h1><?php echo $page['mode']; ?>&nbsp;Prospect</h1>
        <ul id="status" class="status_quo">
            <?php echo $objStatus->message; ?>
        </ul>        
    </div>
    
    <div class="form-row">
        <h3>About the Prospect</h3>
    </div>
    
    <div class="form-row">
        <?php echo $txtName; ?>
    </div>
    
    <div class="form-row">
        <?php echo $txtBranch; ?>
    </div>
    
    <div class="form-row">
        <?php echo $txtIndustry; ?>
    </div>    
    
    <div class="form-row">
        <?php echo $rblRecruiter; ?>
    </div>
    
    <div class="form-row">
        <?php echo $txtDescription; ?>
    </div>
    
    <div class="form-row">
        <?php echo $txtRemarks; ?>
    </div>
    
    <div class="form-row">
        <h3>Prospect: Address</h3>
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
        <h3>Prospect: Communication</h3>
    </div>
    
    <div class="form-row">
        <?php echo $txtPhone; ?>
    </div>

    <div class="form-row">
        <?php echo $txtPhoneExt; ?>
    </div>

    <div class="form-row">
        <?php echo $txtFax; ?>
    </div>

    <div class="form-row">
        <?php echo $emlEmail; ?>
    </div>
    
    <div class="form-row">
        <h3>Prospect: Links</h3>
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
    
    <div class="form-row">
        <h3>Next Step</h3>
    </div>
    
    <div class="form-row">
        <?php echo $rblContactNow; ?>
    </div>    
    
    <div class="form_row">
        <?php echo $btnSubmit; ?>
    </div>
    
</form>