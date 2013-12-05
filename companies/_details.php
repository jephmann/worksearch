<ul id="status" name="status" class="<?php echo $objStatus->class; ?>">
    <?php echo $objStatus->message; ?>    
</ul>
<section class="left">
    <fieldset>
        <legend>
            <a title="Update This Company" href="update.php?id=<?php echo $objCompany->id; ?>">Update</a>
            <a title="Delete This Company" href="delete.php?id=<?php echo $objCompany->id; ?>" class="delete">Delete</a>
            Company
        </legend>
        <table>
            <colgroup>
                <col style="background-color:#CCCCFF">
                <col style="background-color:#FFFFFF">
            </colgroup>
            <tr>
                <td><strong>Company:</strong></td>
                <td><?php echo $objCompany->name; ?></td>
            </tr>
            <tr>
                <td><strong>Recruiter:</strong></td>
                <td><?php echo $company_recruiter; ?></td>
            </tr>
            <tr>
                <td><strong>Industry:</strong></td>
                <td><?php echo $objCompany->industry; ?></td>
            </tr>
            <tr>
                <td><strong>Description:</strong></td>
                <td><?php echo $objCompany->description; ?></td>
            </tr>
            <tr>
                <td><strong>Remarks/Notes:</strong></td>
                <td><?php echo $objCompany->remarks; ?></td>
            </tr>
            <tr>
                <td>
                    <strong>Address:</strong>
                </td>
                <td>
                    <?php echo $company_building; ?>
                    <?php echo $objCompany->address_street; ?>
                    <br />
                    <?php echo $company_unit; ?>
                    <?php echo $company_csz; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Phone:</strong>
                </td>
                <td>
                    <?php echo $company_phone; ?>
                </td>
            </tr>
            <tr>
                <td><strong>Fax:</strong></td>
                <td><?php echo $company_fax; ?></td>
            </tr>
            <tr>
                <td><strong>E-Mail:</strong></td>
                <td><?php echo $company_email; ?></td>
            </tr>
            <tr>
                <td><strong>Website:</strong></td>
                <td><?php echo $company_website; ?></td>
            </tr>
            <tr>
                <td><strong>LinkedIn:</strong></td>
                <td><?php echo $company_linkedin; ?></td>
            </tr>
            <tr>
                <td><strong>Twitter:</strong></td>
                <td><?php echo $company_twitter; ?></td>
            </tr>
            <tr>
                <td><strong>Facebook:</strong></td>
                <td><?php echo $company_facebook; ?></td>
            </tr>
            <tr>
                <td><strong>GooglePlus:</strong></td>
                <td><?php echo $company_googleplus; ?></td>
            </tr>
        </table>
    </fieldset>
</section>
<section class="right">
    <fieldset>
        <legend>Contact(s):</legend>
        <?php echo $p_contacts; ?>
    </fieldset>
    <fieldset>
        <legend>LOG:</legend>
        <p><?php echo $sqlLogs; ?></p>
        <table>
            <?php echo $tr_logs; ?>
        </table>
    </fieldset>
</section>
<script language="javascript" type="text/javascript" src="_delete.js"></script>