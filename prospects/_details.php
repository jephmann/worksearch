<form class="form-labels-on-top">
    <div class="form-title-row">
        <h1><?php echo ($page['title'].$page['subtitle']); ?></h1>
    </div>
    <ul>
        <li><a title="Update This Prospect" href="update.php?id=<?php echo $objProspect->id; ?>">Update</a></li>
        <li><a title="Delete This Prospect" href="delete.php?id=<?php echo $objProspect->id; ?>" class="delete">Delete</a></li>
    </ul>
    <ul id="status" class="<?php echo $objStatus->class; ?>">
        <?php echo $objStatus->message; ?>    
    </ul>
    <h3>Prospect</h3>
    <table>
        <colgroup>
            <col style="background-color:#CCCCFF">
            <col style="background-color:#FFFFFF">
        </colgroup>
        <tr>
            <td><strong>Prospect:</strong></td>
            <td><?php echo $objProspect->name; ?></td>
        </tr>
        <tr>
            <td><strong>Branch:</strong></td>
            <td><?php echo $objProspect->branch; ?></td>
        </tr>
        <tr>
            <td><strong>Recruiter:</strong></td>
            <td><?php echo $prospect_recruiter; ?></td>
        </tr>
        <tr>
            <td><strong>Industry:</strong></td>
            <td><?php echo $objProspect->industry; ?></td>
        </tr>
        <tr>
            <td><strong>Description:</strong></td>
            <td><?php echo $objProspect->description; ?></td>
        </tr>
        <tr>
            <td><strong>Remarks/Notes:</strong></td>
            <td><?php echo $objProspect->remarks; ?></td>
        </tr>
        <tr>
            <td>
                <strong>Address:</strong>
            </td>
            <td>
                <?php echo $prospect_building; ?>
                <?php echo $objProspect->address_street; ?>
                <br />
                <?php echo $prospect_unit; ?>
                <?php echo $prospect_csz; ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Phone:</strong>
            </td>
            <td>
                <?php echo $prospect_phone; ?>
            </td>
        </tr>
        <tr>
            <td><strong>Fax:</strong></td>
            <td><?php echo $prospect_fax; ?></td>
        </tr>
        <tr>
            <td><strong>E-Mail:</strong></td>
            <td><?php echo $prospect_email; ?></td>
        </tr>
        <tr>
            <td><strong>Website:</strong></td>
            <td><?php echo $prospect_website; ?></td>
        </tr>
        <tr>
            <td><strong>LinkedIn:</strong></td>
            <td><?php echo $prospect_linkedin; ?></td>
        </tr>
        <tr>
            <td><strong>Twitter:</strong></td>
            <td><?php echo $prospect_twitter; ?></td>
        </tr>
        <tr>
            <td><strong>Facebook:</strong></td>
            <td><?php echo $prospect_facebook; ?></td>
        </tr>
        <tr>
            <td><strong>GooglePlus:</strong></td>
            <td><?php echo $prospect_googleplus; ?></td>
        </tr>
    </table>
    <br>
    <h3>Prospect Contact(s):</h3>
        <?php echo $p_contacts; ?>
    <br>
    <h3>Prospect Log(s):</h3>
    <table>
        <?php echo $tr_logs; ?>
    </table>
</form>
<script language="javascript" type="text/javascript" src="_delete.js"></script>