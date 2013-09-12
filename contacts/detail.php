<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " | Detail",
        'path'      => "../",
        'mode'      => "Detail",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    // =========================================================================    
    
    // CONTACT
    $objContact = new Contact;
    $id         = $_GET['id'];
    require ('_fetch.php');
    require ('_display.php');
    
    // CONTACT'S COMPANY
    $objCompany = new Company;
    $id         = $objContact->id_company;
    require ($page['path'].'companies/_fetch.php');
    require ($page['path'].'companies/_display.php');
    
    // CONTACT'S LOGS
    /*
     * 2013.09.06 TO DO:
     * - Display Logs specific to this Contact
     */
    $objLogs    = new Log;
    $id         = $_GET['id'];
    $field      = 'id_contact';
    $sqlLogs    = $objLogs->selectAll();
    $sqlLogs    .= " WHERE {$field} = :{$field}";
    $rowLogs    = fetchRowsWhere($db, $field, $id, $sqlLogs);    
    
    // COMPANY'S ADDITIONAL CONTACTS
    /*
     * 2013.09.06 TO DO:
     * - Display Contacts (other than this Contact) specific to this Contact's Company
     * - Not entirely happy with a parameterized clause going with
     *      a non-parameterized clause
     */
    //$objContacts    = new Contact;
    //$id             = $objContact->id_company;
    //$not_id         = $_GET['id'];
    //$field          = 'id_company';
    //$sqlContacts    = $objContacts->selectAll();
    //$sqlContacts    .= " WHERE {$field} = :{$field}";
    //$sqlContacts    .= " AND id_contact <> {$not_id}";
    //$rowContacts    = fetchRowsWhere($db, $field, $id, $sqlContacts);
    
    // =========================================================================    
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    ?>
<div style="width:300px; float:right">
    <fieldset>
        <legend>
            <a href="update.php?id=<?php echo $id; ?>">Update</a>
            <a href="<?php echo $page['path']; ?>delete.php?id=<?php echo $id; ?>">Delete</a>
            <?php echo $objContact->name_full(); ?>
        </legend>
        <table>
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
<div style="width:300px;float:left;">

    <fieldset>
        <legend>Company</legend>
        <table>
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
    <?php
    require_once ($page['path'].'_views/footer.php');
?>