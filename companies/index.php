<?php    
    $page = array(
        'title'     => "Companies",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/Status.php');
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Company.php');
    require_once ($page['path'].'_functions/redirect.php');
    require_once ($page['path'].'_functions/ddlOptions.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    require_once ($page['path'].'_functions/returnSort.php');
    require_once ($page['path'].'_functions/formatPhone.php');
    
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    
    $objCompany = new Company;
    /*
     * =========================================================================
     */
    
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
    
    $query  = $objCompany->selectAll().' '.$where.$sort;
    try
    {
        $stmt = $db->prepare($query);
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }
    
    $rows = $stmt->fetchAll();
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
        
        $rowCompanyStart    = NULL;
        $rowCompanyEnd      = NULL;
        if($rowWebsite!=NULL)
        {
            $rowCompanyStart    = "<a target=\"_blank\" href=\"{$rowWebsite}\">";
            $rowCompanyEnd      = "</a>";
        }
        $rowCompany     = $rowCompanyStart.$rowName.$rowCompanyEnd;
        
        
        $street = NULL;
        if(!empty($rowStreet))
        {
            $street = '<br />'.$rowStreet;
        }
        $building = NULL;
        if(!empty($rowBuilding))
        {
            $building = '<br />'.$rowBuilding;
        }
        $unit = NULL;
        if(!empty($rowUnit))
        {
            $unit = '<br />'.$rowUnit;
        }
        $phone = NULL;
        if(!empty($rowPhone))
        {
            $phone = '<br />'.formatPhone($rowPhone);
        }
        $phone_extension = NULL;
        if(!empty($rowPhoneExtension))
        {
            $phone_extension = ($rowPhoneExtension);
            $phone .= ' x'.$phone_extension;
        }
        $email = NULL;
        if(!empty($rowEmail))
        {
            $email = "<a href=\"mailto:{$rowEmail}\">{$rowEmail}</a>";
        }    
        
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
            <strong>{$rowCompany}</strong>
            {$building}
            {$street}
            {$unit}
            {$phone}
            </td>
            <td class=\"td_detail\">{$rowCity}, {$rowState}</td>
            <td class=\"td_detail\">{$rowZIP5}</td>
            <td class=\"td_detail\">{$email}</td>
            </tr>";
    }
    $tbody  .= "</tbody>";
    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_html/head.php');
    require_once ($page['path'].'_html/header.php');
    require_once ($page['path'].'_html/aside.php');
    require_once ('_table.php');
    require_once ($page['path'].'_html/footer.php');
?>