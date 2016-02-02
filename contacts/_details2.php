<form class="form-labels-on-top">
    <div class="form-title-row">
        <h1><?php echo ($page['title'].$page['subtitle']); ?></h1>
        <ul>
            <li><a title="Update This Contact" href="update.php?id=<?php echo $objContact->id; ?>">Update</a></li>
            <li><a title="Delete This Contact" href="delete.php?id=<?php echo $objContact->id; ?>" class="delete">Delete</a></li>
        </ul>
        <!--
        <ul id="status" class="<?php echo $objStatus->class; ?>">
            <?php echo $objStatus->message; ?>
        </ul>
        -->
    </div>
    
    <div class="form-title-row">
        <h3>About This Contact</h3>
    </div>
    
    <div class="form-row">
        <label>
            <span>Contact</span>
        </label>
        <p><?php echo $objContact->name_full(); ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Department</span>
        </label>
        <p><?php echo $objContact->department; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Title</span>
        </label>
        <p><?php echo $objContact->title; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Remarks/Notes</span>
        </label>
        <p><?php echo $objContact->remarks; ?></p>
    </div>
    
    <div class="form-title-row">
        <h3>Contact Communication</h3>
    </div>
    
    <div class="form-row">
        <label>
            <span>Office Phone</span>
        </label>
        <p><?php echo $contact_phone; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Mobile Phone</span>
        </label>
        <p><?php echo $contact_mobile_phone; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Office Fax</span>
        </label>
        <p><?php echo $contact_fax; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Office E-mail</span>
        </label>
        <p><?php echo $contact_email; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Office Skype</span>
        </label>
        <p><?php echo $contact_skype; ?></p>
    </div>
    
    <div class="form-title-row">
        <h3>Contact Links</h3>
    </div>
    
    <div class="form-row">
        <label>
            <span>Website</span>
        </label>
        <p><?php echo $contact_website; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Other Links</span>
        </label>
        <p><?php echo $contact_linkedin
            . '&nbsp;' .  $contact_twitter
            . '&nbsp;' .  $contact_facebook
            . '&nbsp;' .  $contact_googleplus
            . '&nbsp;' ?></p>
    </div>
    
    <div class="form-title-row">
        <h3>Contact Prospect</h3>
    </div>
    
    <div class="form-row">
        <label>
            <span>Prospect</span>
        </label>
        <p><?php echo $prospect_name; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Branch</span>
        </label>
        <p><?php echo $prospect_branch; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Recruiter</span>
        </label>
        <p><?php echo $prospect_recruiter; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Industry</span>
        </label>
        <p><?php echo $objProspect->industry; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Address</span>
        </label>
        <p>
            <?php echo $prospect_building; ?>
            <?php echo $objProspect->address_street; ?>
            <br />
            <?php echo $prospect_unit; ?>
            <?php echo $prospect_csz; ?>
        </p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Phone</span>
        </label>
        <p><?php echo $prospect_phone; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Fax</span>
        </label>
        <p><?php echo $prospect_fax; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>E-Mail</span>
        </label>
        <p><?php echo $prospect_website; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Website</span>
        </label>
        <p><?php echo $prospect_email; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Other Links</span>
        </label>
        <p><?php echo $prospect_linkedin
            . '&nbsp;' .  $prospect_twitter
            . '&nbsp;' .  $prospect_facebook
            . '&nbsp;' .  $prospect_googleplus
            . '&nbsp;' ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>DESCRIPTION</span>
        </label>
        <p><?php echo $objProspect->description; ?></p>
    </div>
    
    <br>
    <h3>Contact Log(s):</h3>
        <table>
            <?php echo $tr_logs; ?>
        </table>
    <br>
        <br>
    <h3>Additional cross-referenced prospect contacts</h3>
    <p>[Yet to be built]</p>
</form>
<script language="javascript" type="text/javascript" src="_delete.js"></script>