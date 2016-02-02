<form class="form-labels-on-top">
    <div class="form-title-row">
        <h1><?php echo ($page['title'].$page['subtitle']); ?></h1>
        <ul>
            <li><a title="Create New <?php echo $page['title']; ?>" href="create.php">Create</a></li>
            <li><a title="Update This <?php echo $page['title']; ?>" href="update.php">Update</a></li>
            <li><a title="Delete This <?php echo $page['title']; ?>" href="delete.php">Delete</a></li>
        </ul>
        <!--
        <ul id="status" class="<?php echo $objStatus->class; ?>">
            <?php echo $objStatus->message; ?>
        </ul>
        -->
    </div>
    <h3>Who Are You?</h3>
    
    <div class="form-row">
        <label>
            <span>Name</span>
        </label>
        <p><?php echo $profile_name_full; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Gender</span>
        </label>
        <p><?php echo $objProfile->gender; ?></p>
    </div>    

    <div class="form-row">
        <label>
            <span>Born</span>
        </label>
        <p><?php echo $objProfile->full_birth_date(); ?></p>
    </div>    

    <div class="form-row">
        <label>
            <span>Remarks</span>
        </label>
        <p><?php echo $objProfile->remarks; ?></p>
    </div>
    
    <br>   
    <h3>Your Address</h3>
    
    <div class="form-row">
        <p>
            <?php echo $profile_building; ?>
            <?php echo $objProfile->address_street; ?>
            <br />
            <?php echo $profile_unit; ?>
            <?php echo $profile_csz; ?>
        </p>
    </div>
    
    <br>
    <h3>Communication</h3>    

    <div class="form-row">
        <label id="lblPhone">
            <span>Phone</span>
        </label>
        <p><?php echo $profile_phone; ?></p>
    </div>    

    <div class="form-row">
        <label id="lblMobile">
            <span>Mobile Phone</span>
        </label>
        <p><?php echo $profile_mobile; ?></p>
    </div> 

    <div class="form-row">
        <label id="lblFax">
            <span>Fax</span>
        </label>
        <p><?php echo $profile_fax; ?></p>
    </div>   

    <div class="form-row">
        <label id="lblEmail">
            <span>E-Mail</span>
        </label>
        <p><?php echo $profile_email; ?></p>
    </div>  

    <div class="form-row">
        <label id="lblSkype">
            <span>Skype</span>
        </label>
        <p><?php echo $profile_skype; ?></p>
    </div>
    
    <br>
    <h3>Identification</h3>   

    <div class="form-row">
        <label id="lblDriversLicense">
            <span>Drivers License</span>
        </label>
        <p><?php echo $profile_drivers_license; ?></p>
    </div>  

    <div class="form-row">
        <label id="lblSocialSecurityNumber">
            <span>Social Security Number</span>
        </label>
        <p><?php echo $profile_social_security_number; ?></p>
    </div>
    
</form>