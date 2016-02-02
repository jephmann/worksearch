<form class="form-labels-on-top">
    <div class="form-title-row">
        <h1><?php echo ($page['title'].$page['subtitle']); ?></h1>
        <ul>
            <li><a title="Update This Prospect" href="update.php?id=<?php echo $objProspect->id; ?>">Update</a></li>
            <li><a title="Delete This Prospect" href="delete.php?id=<?php echo $objProspect->id; ?>" class="delete">Delete</a></li>
        </ul>
        <!--
        <ul id="status" class="<?php echo $objStatus->class; ?>">
            <?php echo $objStatus->message; ?>    
        </ul>
        -->
    </div>
    <h3>About This Prospect</h3>
    
    <div class="form-row">
        <label>
            <span>Prospect</span>
        </label>
        <p><?php echo $objProspect->name; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Branch</span>
        </label>
        <p><?php echo $objProspect->branch; ?></p>
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
            <span>Description</span>
        </label>
        <p><?php echo $objProspect->description; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Remarks/Notes</span>
        </label>
        <p><?php echo $objProspect->remarks; ?></p>
    </div>
    
    <br>   
    <h3>Prospect Address</h3>
    
    <div class="form-row">
        <p>
            <?php echo $prospect_building; ?>
            <?php echo $objProspect->address_street; ?>
            <br />
            <?php echo $prospect_unit; ?>
            <?php echo $prospect_csz; ?>
        </p>
    </div>
    
    <br>   
    <h3>Prospect Communication</h3>
    
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
        <p><?php echo $prospect_email; ?></p>
    </div>
    
    <br>   
    <h3>Prospect Links</h3>
    
    <div class="form-row">
        <label>
            <span>Website</span>
        </label>
        <p><?php echo $prospect_website; ?></p>
    </div>
    
    <div class="form-row">
        <label>
            <span>Additional Links</span>
        </label>
        <p><?php
            echo $prospect_linkedin . '&nbsp;';
            echo $prospect_twitter . '&nbsp;';
            echo $prospect_facebook . '&nbsp;';
            echo $prospect_googleplus . '&nbsp;';
            ?></p>
    </div>
    
    <br>
    <h3>Prospect Contact(s):</h3>    
    
    <div class="form-row">
        <?php echo $p_contacts; ?>
    </div>
    
    <br>    
    <h3>Prospect Log(s):</h3>
    
    <table>
        <?php echo $tr_logs; ?>
    </table>
</form>
<script language="javascript" type="text/javascript" src="_delete.js"></script>