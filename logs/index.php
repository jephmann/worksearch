<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/Status.php');
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Log.php');
    require_once ($page['path'].'_functions/redirect.php');
    require_once ($page['path'].'_functions/ddlOptions.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    require_once ($page['path'].'_functions/returnSort.php');
    require_once ($page['path'].'_functions/formatPhone.php');
    
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    
    $objLog = new Log;    
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
    $sort   = return_sort($get, $orderby, $dir, 'contact_date');
    if (!empty($_POST['where']) && !empty($_POST['like']))
    {
        $where = " WHERE {$_POST['where']} LIKE '%{$_POST['like']}%'";
    }    
    
    $query  = $objLog->selectAll().' '.$where.$sort;
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
        $rowIDContact       = htmlentities($row['id_contact'], ENT_QUOTES, 'UTF-8');
        $rowWeekEnding      = htmlentities($row['week_ending'], ENT_QUOTES, 'UTF-8');
        $rowContactDate     = htmlentities($row['contact_date'], ENT_QUOTES, 'UTF-8');
        $rowIDContactMethod = htmlentities($row['id_contact_method'], ENT_QUOTES, 'UTF-8');
        $rowSpecify         = htmlentities($row['specify'], ENT_QUOTES, 'UTF-8');            
        
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
            <td class=\"td_detail\">{$rowWeekEnding}</td>
            <td class=\"td_detail\">{$rowContactDate}</td>
            <td class=\"td_detail\">{$rowIDContactMethod} ({$rowSpecify})</td>
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