<ul style="background-color: #<?php echo $objStatus->background_color; ?>; color: #<?php echo $objStatus->color; ?>;">
    <?php echo $objStatus->message; ?>
</ul>
<div style="width:350px; float:left">
    <fieldset>
        <legend>
            <a href="update.php?id=<?php echo $objContact->id; ?>">Update</a>
            <a href="delete.php?id=<?php echo $objContact->id; ?>">Delete</a>
            Contact
        </legend>
        <table>
            <colgroup>
                <col style="background-color:#CCCCFF">
                <col style="background-color:#FFFFFF">
            </colgroup>
            <tr>
                <td><strong>Name:</strong></td>
                <td><?php echo $objContact->name_full(); ?></td>
            </tr>
            <tr>
                <td><strong>Department:</strong></td>
                <td><?php echo $objContact->department; ?></td>
            </tr>
            <tr>
                <td><strong>Title:</strong></td>
                <td><?php echo $objContact->title; ?></td>
            </tr>
            <tr>
                <td><strong>Phone:</strong></td>
                <td><?php echo $contact_phone; ?></td>
            </tr>
            <tr>
                <td><strong>Fax:</strong></td>
                <td><?php echo $contact_fax; ?></td>
            </tr>
            <tr>
                <td><strong>E-mail:</strong></td>
                <td><?php echo $contact_email; ?></td>
            </tr>
            <tr>
                <td><strong>LinkedIn:</strong></td>
                <td><?php echo $contact_linkedin; ?></td>
            </tr>
            <tr>
                <td><strong>Twitter:</strong></td>
                <td><?php echo $contact_twitter; ?></td>
            </tr>
            <tr>
                <td><strong>Facebook:</strong></td>
                <td><?php echo $contact_facebook; ?></td>
            </tr>
            <tr>
                <td><strong>Google+:</strong></td>
                <td><?php echo $contact_googleplus; ?></td>
            </tr>
        </table>
    </fieldset>
    <p>[Contact-specific logs]</p>
</div>
<div style="width:350px;float:right;">
    <fieldset>
        <legend>Company</legend>
        <table>
            <colgroup>
                <col style="background-color:#CCCCFF">
                <col style="background-color:#FFFFFF">
            </colgroup>
            <tr>
                <td><strong>Company:</strong></td>
                <td><a href="../companies/detail.php?id=<?php echo $objContact->id_company; ?>"><?php echo $objCompany->name; ?></a></td>
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
                <td>
                    <strong>Address:</strong>
                </td>
                <td>
                    <?php echo $company_building; ?>
                    <?php echo $objCompany->address_street; ?>
                    <br />
                    <?php echo $company_unit; ?>
                    <?php echo $objCompany->address_city.', '.$objCompany->address_state.'&nbsp;'.$objCompany->address_zip5.'-'.$objCompany->address_zip4; ?>
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
                <td><strong>Google+:</strong></td>
                <td><?php echo $company_googleplus; ?></td>
            </tr>
            <tr>
                <td><strong>DESCRIPTION:</strong></td>
                <td><?php echo $objCompany->description; ?></td>
            </tr>
        </table>
    </fieldset>
    <p>[Additional cross-referenced company contacts]</p>
</div>
<div class="clear"></div>