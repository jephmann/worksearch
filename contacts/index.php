<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/Status.php');
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Person.php');
    require_once ($page['path'].'_classes/Contact.php');
    require_once ($page['path'].'_functions/redirect.php');
    require_once ($page['path'].'_functions/ddlOptions.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    require_once ($page['path'].'_functions/returnSort.php');
    require_once ($page['path'].'_functions/formatPhone.php');
    
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    
    $objContact = new Contact;
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
    $sort   = return_sort($get, $orderby, $dir, 'name_last');
    
    
    
    $query  = $objContact->selectAll().' '.$where.$sort;
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
        $rowIDCompany       = htmlentities($row['id_company'], ENT_QUOTES, 'UTF-8');
        $rowNameLast        = htmlentities($row['name_last'], ENT_QUOTES, 'UTF-8');
        $rowNameFirst       = htmlentities($row['name_first'], ENT_QUOTES, 'UTF-8');
        $rowNameMiddle      = htmlentities($row['name_middle'], ENT_QUOTES, 'UTF-8');
        $rowNameSuffix      = htmlentities($row['name_suffix'], ENT_QUOTES, 'UTF-8');
        $rowDepartment      = htmlentities($row['department'], ENT_QUOTES, 'UTF-8');
        $rowTitle           = htmlentities($row['title'], ENT_QUOTES, 'UTF-8');
        $rowPhone           = htmlentities($row['phone'], ENT_QUOTES, 'UTF-8');
        $rowPhoneExtension  = htmlentities($row['phone_extension'], ENT_QUOTES, 'UTF-8');
        $rowFax             = htmlentities($row['fax'], ENT_QUOTES, 'UTF-8');
        $rowEmail           = htmlentities($row['email'], ENT_QUOTES, 'UTF-8');
        
        $tbody.="<tr>
            <td class=\"td_dud\">
            <a href=\"detail.php?id={$rowID}\">Detail</a>
            <br />
            <a href=\"update.php?id={$rowID}\">Update</a>
            <br />
            <a href=\"delete.php?id={$rowID}\">Delete</a>
            </td>
            <td class=\"td_detail\">{$rowIDCompany}</td>
            <td class=\"td_detail\">{$rowNameFirst} {$rowNameMiddle} {$rowNameLast} {$rowNameSuffix}</td>
            <td class=\"td_detail\">{$rowDepartment}</td>
            <td class=\"td_detail\">{$rowTitle}</td>
            <td class=\"td_detail\">{$rowPhone} x{$rowPhoneExtension}</td>
            <td class=\"td_detail\">{$rowEmail}</td>
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