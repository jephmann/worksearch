<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " | Detail",
        'path'      => "../",
        'mode'      => "Detail",
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Person.php');
    require_once ($page['path'].'_classes/Company.php');
    require_once ($page['path'].'_classes/Contact.php');
    require_once ($page['path'].'_classes/Log.php');
    require_once ($page['path'].'_classes/Profile.php');
    require_once ($page['path'].'_classes/Status.php');
    require_once ($page['path'].'_functions/formatPhone.php');
    
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    
    $objContact = new Contact;
    
    $objCompany = new Company;
    /*
     * =========================================================================
     */

    $id = $_GET['id'];
    try
    {
        $stmt = $db->prepare($objContact->select($id));
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }
    $row = $stmt->fetch();
    
    $objContact->setId_company(htmlentities($row['id_company'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_first(htmlentities($row['name_first'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_middle(htmlentities($row['name_middle'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_last(htmlentities($row['name_last'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_suffix(htmlentities($row['name_suffix'], ENT_QUOTES, 'UTF-8'));
    $objContact->setDepartment(htmlentities($row['department'], ENT_QUOTES, 'UTF-8'));
    $objContact->setTitle(htmlentities($row['title'], ENT_QUOTES, 'UTF-8'));
    $objContact->setPhone(htmlentities($row['phone'], ENT_QUOTES, 'UTF-8'));
    $objContact->setPhone_extension(htmlentities($row['phone_extension'], ENT_QUOTES, 'UTF-8'));
    $objContact->setFax(htmlentities($row['fax'], ENT_QUOTES, 'UTF-8'));
    $objContact->setEmail(htmlentities($row['email'], ENT_QUOTES, 'UTF-8'));
    $objContact->setLinkedin(htmlentities($row['linkedin'], ENT_QUOTES, 'UTF-8')); 
    $objContact->setTwitter(htmlentities($row['twitter'], ENT_QUOTES, 'UTF-8'));  
    $objContact->setFacebook(htmlentities($row['facebook'], ENT_QUOTES, 'UTF-8'));  
    $objContact->setGoogleplus(htmlentities($row['googleplus'], ENT_QUOTES, 'UTF-8'));
    
    $contact_phone      = formatPhone($objContact->phone);
    if(!empty($objContact->phone_extension))
    {
        $contact_phone .= ' x'.$objContact->phone_extension;
    }
    $contact_fax    = formatPhone($objContact->fax);
    $contact_email  = "<a href=\"mailto:{$objContact->email}\">{$objContact->email}</a>";
    
    try
    {
        $stmt = $db->prepare($objCompany->select($objContact->id_company));
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }
    $row = $stmt->fetch();
    
    $objCompany->setName(htmlentities($row['name'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_building(htmlentities($row['address_building'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_street(htmlentities($row['address_street'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_unit(htmlentities($row['address_unit'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_city(htmlentities($row['address_city'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_state(htmlentities($row['address_state'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_zip5(htmlentities($row['address_zip5'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_zip4(htmlentities($row['address_zip4'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setPhone(htmlentities($row['phone'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setPhone_extension(htmlentities($row['phone_extension'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setFax(htmlentities($row['fax'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setEmail(htmlentities($row['email'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setWebsite(htmlentities($row['website'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setLinkedin(htmlentities($row['linkedin'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setTwitter(htmlentities($row['twitter'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setFacebook(htmlentities($row['facebook'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setGoogleplus(htmlentities($row['googleplus'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setIndustry(htmlentities($row['industry'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setRecruiter(htmlentities($row['recruiter'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setDescription(htmlentities($row['description'], ENT_QUOTES, 'UTF-8'));
    
    $company_building   = NULL;
    if (!empty($objCompany->address_building))
    {
        $company_building = $objCompany->address_building.'<br .>';
    }
    $company_unit   = NULL;
    if (!empty($objCompany->address_unit))
    {
        $company_unit = $objCompany->address_unit.'<br .>';
    }
    $company_phone      = formatPhone($objCompany->phone);
    if(!empty($objCompany->phone_extension))
    {
        $company_phone .= ' x'.$objCompany->phone_extension;
    }
    $company_fax        = formatPhone($objCompany->fax);
    $company_email      = "<a href=\"mailto:{$objCompany->email}\">{$objCompany->email}</a>";
    $company_website    = "<a target=\"_blank\" href=\"{$objCompany->website}\">{$objCompany->website}</a>";
    $company_linkedin   = "<a target=\"_blank\" href=\"{$objCompany->linkedin}\">{$objCompany->linkedin}</a>";
    $company_twitter    = "<a target=\"_blank\" href=\"{$objCompany->twitter}\">{$objCompany->twitter}</a>";
    $company_facebook   = "<a target=\"_blank\" href=\"{$objCompany->facebook}\">{$objCompany->facebook}</a>";
    $company_googleplus = "<a target=\"_blank\" href=\"{$objCompany->googleplus}\">{$objCompany->googleplus}</a>";
    $company_recruiter  = "<span style=\"color:green;\">NO</span>";
    if($objCompany->recruiter==TRUE)
    {
        $company_recruiter = "<span style=\"color:red;\">YES</span>";
    }
    
    
    
    
    // HTML
    require_once ($page['path'].'_html/head.php');
    require_once ($page['path'].'_html/header.php');
    require_once ($page['path'].'_html/aside.php');
    ?>
    <fieldset>
        <legend>
            <?php echo $objContact->name_full(); ?>
            --
            <a href="update.php?id=<?php echo $id; ?>">Update</a>
            |
            <a href="<?php echo $page['path']; ?>delete.php?id=<?php echo $id; ?>">Delete</a>
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
                <td><strong>Linked-In:</strong></td>
                <td><?php echo $objContact->linkedin; ?></td>
            </tr>
            <tr>
                <td><strong>Twitter:</strong></td>
                <td><?php echo $objContact->twitter; ?></td>
            </tr>
            <tr>
                <td><strong>Facebook:</strong></td>
                <td><?php echo $objContact->facebook; ?></td>
            </tr>
            <tr>
                <td><strong>Google+:</strong></td>
                <td><?php echo $objContact->googleplus; ?></td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <legend>Company</legend>
        <table>
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
                <td><strong>GooglePlus:</strong></td>
                <td><?php echo $company_googleplus; ?></td>
            </tr>
            <tr>
                <td><strong>DESCRIPTION:</strong></td>
                <td><?php echo $objCompany->description; ?></td>
            </tr>
        </table>
    </fieldset>

<fieldset>
    <legend>Logs</legend>
    <p>In progress</p>
</fieldset>
    <?php
    require_once ($page['path'].'_html/footer.php');
?>