<?php    
    $page = array(
        'title'     => "Contacts",
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
        array('title'=>'Company ID','field'=>'id_company'),
        array('title'=>'Name','field'=>'name_last'),
        array('title'=>'Department','field'=>'department'),
        array('title'=>'Title','field'=>'title'),
        array('title'=>'Phone','field'=>'phone'),
        array('title'=>'E-Mail','field'=>'email'),
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
    $sort   = return_sort($get, $orderby, $dir, 'name_last');
    if (!empty($_POST['where']) && !empty($_POST['like']))
    {
        $where = " WHERE {$_POST['where']} LIKE '%{$_POST['like']}%'";
    }
    // =========================================================================
    
    $objContacts    = new Contact;
    $sqlContacts    = $objContacts->selectAll().' '.$where.$sort;
    try
    {
        $stmtContacts = $db->prepare($sqlContacts);
        $stmtContacts->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }
    $rows = $stmtContacts->fetchAll();
    
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
    
        $contact_phone      = formatPhone($rowPhone, $rowPhoneExtension);
        $contact_fax        = formatPhone($rowFax, NULL);
        $contact_email      = formatEmailLink("Contact", $rowEmail);
        
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
            <td class=\"td_detail\">{$contact_phone}</td>
            <td class=\"td_detail\">{$contact_email}</td>
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