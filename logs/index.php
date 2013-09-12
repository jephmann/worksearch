<?php    
    $page = array(
        'title'     => "Logs",
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
        array('title'=>'Company','field'=>'id_company'),
        array('title'=>'Contact','field'=>'id_contact'),
        array('title'=>'Week Ending','field'=>'week_ending'),
        array('title'=>'Contact Date','field'=>'contact_date'),
        array('title'=>'Contact Method','field'=>'id_contact_method'),
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
    $sort   = return_sort($get, $orderby, $dir, 'contact_date');
    if (!empty($_POST['where']) && !empty($_POST['like']))
    {
        $where = " WHERE {$_POST['where']} LIKE '%{$_POST['like']}%'";
    }
    // =========================================================================
    
    $objLogs = new Log;
    $sqlLogs  = $objLogs->selectAll().' '.$where.$sort;
    try
    {
        $stmtLogs = $db->prepare($sqlLogs);
        $stmtLogs->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }
    $rows = $stmtLogs->fetchAll();
    
    foreach($rows as $row)
    {
        $rowID              = htmlentities($row['id'], ENT_QUOTES, 'UTF-8');
        $rowIDCompany       = htmlentities($row['id_company'], ENT_QUOTES, 'UTF-8');
        $rowIDContact       = htmlentities($row['id_contact'], ENT_QUOTES, 'UTF-8');
        $rowWeekEnding      = htmlentities($row['week_ending'], ENT_QUOTES, 'UTF-8');
        $rowContactDate     = htmlentities($row['contact_date'], ENT_QUOTES, 'UTF-8');
        $rowIDContactMethod = htmlentities($row['id_contact_method'], ENT_QUOTES, 'UTF-8');
        $rowSpecify         = htmlentities($row['specify'], ENT_QUOTES, 'UTF-8');
        
        $log_week_ending    = date("l F j, Y",strtotime($rowWeekEnding));
        $log_contact_date   = date("l F j, Y",strtotime($rowContactDate));   
        
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
            <td class=\"td_detail\">{$rowIDCompany}</td>
            <td class=\"td_detail\">{$rowIDContact}</td>
            <td class=\"td_detail\">{$log_week_ending}</td>
            <td class=\"td_detail\">{$log_contact_date}</td>
            <td class=\"td_detail\">{$rowIDContactMethod} ({$rowSpecify})</td>
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