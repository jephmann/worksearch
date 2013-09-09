<?php    
    $page = array(
        'title'     => "Companies",
        'subtitle'  => " > Detail",
        'path'      => "../",
        'mode'      => "Detail",
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    // =========================================================================
    
    $objCompany = new Company;
    $id         = $_GET['id'];
    require ($page['path'].'_fetch/company.php');
    require ($page['path'].'_display/company.php');
    
    // =========================================================================    
    require_once ($page['path'].'_html/head.php');
    require_once ($page['path'].'_html/header.php');
    require_once ($page['path'].'_html/aside.php');
    ?>
<div style="width:300px; float:left">
    <fieldset>
        <legend>
            <?php echo $objCompany->name; ?>
            --
            <a href="update.php?id=<?php echo $id; ?>">Update</a>
            |
            <a href="<?php echo $page['path']; ?>delete.php?id=<?php echo $id; ?>">Delete</a>
        </legend>
        <table>
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
            <tr>
                <td><strong>DESCRIPTION:</strong></td>
                <td><?php echo $objCompany->description; ?></td>
            </tr>
        </table>
    </fieldset>
</div>
<div style="width:300px;float:right;">
    <fieldset>
        <legend>Contact(s):</legend>
        
    </fieldset>
    <fieldset>
        <legend>LOG:</legend>
        <p>In progress.</p>
    </fieldset>
</div>
    <?php
    require_once ($page['path'].'_html/footer.php');
?>