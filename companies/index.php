<?php    
    $page = array(
        'title'     => "Companies",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    // =========================================================================
    
    $columns=array(
        array('title'=>'OPTIONS','field'=>NULL),
        array('title'=>'Company','field'=>'name'),
        array('title'=>'City','field'=>'address_city'),
        array('title'=>'ZIP','field'=>'address_zip5'),
    );
    $thead = return_THEAD($columns);
    
    $get        = FALSE;
    $orderby    = NULL;
    $dir        = NULL;
    $tbody      = "<tbody>";
    $where      = NULL;
    if (isset($_GET['orderby']) && isset($_GET['dir']))
    {
        $get        = TRUE;
        $orderby    = $_GET['orderby'];
        $dir        = $_GET['dir'];       
    }
    $sort   = return_sort($get, $orderby, $dir, 'name');
    if (!empty($_POST['where']) && !empty($_POST['like']))
    {
        $where = " WHERE {$_POST['where']} LIKE '%{$_POST['like']}%'";
    }
    // =========================================================================
    
    $objCompanies   = new Company;
    $sqlCompanies   = $objCompanies->selectAll().' '.$where.$sort;
    try
    {
        $stmtCompanies = $db->prepare($sqlCompanies);
        $stmtCompanies->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }    
    $rows = $stmtCompanies->fetchAll();
    
    foreach($rows as $row)
    {
        $rowID              = htmlentities($row['id'], ENT_QUOTES, 'UTF-8');
        $rowName            = htmlentities($row['name'], ENT_QUOTES, 'UTF-8');
        $rowBuilding        = htmlentities($row['address_building'], ENT_QUOTES, 'UTF-8');
        $rowStreet          = htmlentities($row['address_street'], ENT_QUOTES, 'UTF-8');
        $rowUnit            = htmlentities($row['address_unit'], ENT_QUOTES, 'UTF-8');
        $rowCity            = htmlentities($row['address_city'], ENT_QUOTES, 'UTF-8');
        $rowState           = htmlentities($row['address_state'], ENT_QUOTES, 'UTF-8');
        $rowZIP5            = htmlentities($row['address_zip5'], ENT_QUOTES, 'UTF-8');
        $rowZIP4            = htmlentities($row['address_zip4'], ENT_QUOTES, 'UTF-8');
        $rowPhone           = htmlentities($row['phone'], ENT_QUOTES, 'UTF-8');
        $rowPhoneExtension  = htmlentities($row['phone_extension'], ENT_QUOTES, 'UTF-8');
        $rowFax             = htmlentities($row['fax'], ENT_QUOTES, 'UTF-8');
        $rowEmail           = htmlentities($row['email'], ENT_QUOTES, 'UTF-8');
        $rowWebsite         = htmlentities($row['website'], ENT_QUOTES, 'UTF-8');
        $rowDescription     = htmlentities($row['description'], ENT_QUOTES, 'UTF-8');
        
        // Formatting and Displaying
        
        $company_name           = $rowName;
        if(!empty($rowWebsite))
        {
            $company_name       = formatOutsideLink($rowName, $rowWebsite, $rowName);
        }
        
        $company_phone          = formatPhone($rowPhone, $rowPhoneExtension);
        if(!empty($company_phone))
        {
            $company_phone      = '<br />'.$company_phone;
        }
        $company_fax            = formatPhone($rowFax, NULL);
        $company_email          = formatEmailLink("Company", $rowEmail);
        $company_zip            = formatPostUS($rowZIP5, $rowZIP4);
        
        $company_street         = NULL;
        if(!empty($rowStreet))
        {
            $company_street     = '<br />'.$rowStreet;
        }
        $company_building       = NULL;
        if(!empty($rowBuilding))
        {
            $company_building   = '<br />'.$rowBuilding;
        }
        $company_unit           = NULL;
        if(!empty($rowUnit))
        {
            $company_unit       = '<br />'.$rowUnit;
        }
        
        $company_citystate      = $rowCity.', '.$rowState;
        
        $tbody.="<tr>
            <td class=\"td_dud\">
            <a href=\"detail.php?id={$rowID}\">Detail</a>
            <br />
            <a href=\"update.php?id={$rowID}\">Update</a>
            <br />
            <a
            href=\"delete.php?id={$rowID}\"
            onclick=\"alertDelete({$rowID})\">Delete</a>
            </td>
            <td class=\"td_detail\">
            <strong>{$company_name}</strong>
            {$company_building}
            {$company_street}
            {$company_unit}
            {$company_phone}
            </td>
            <td class=\"td_detail\">{$company_citystate}</td>
            <td class=\"td_detail\">{$company_zip}<br /><br />{$company_email}</td>
            </tr>";
    }
    $tbody  .= "</tbody>";    

    // =========================================================================
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require_once ('_table.php');
    require_once ($page['path'].'_views/footer.php');
?>