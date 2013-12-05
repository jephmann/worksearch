<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    $id_user    = $_SESSION['user']['id'];
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus  = new Status;
    $objStatus->setClass("status_quo");
    // =========================================================================
    
    $prmJoin    = array(':id_user' => $id_user);
    require_once ($page['path'].'_variables/index.php');
    if (isset($_GET['orderby']) && isset($_GET['dir']))
    {
        $get        = TRUE;
        $orderby    = $_GET['orderby'];
        $dir        = $_GET['dir'];       
    }
    $sort   = return_sort($get, $orderby, $dir, 'contact_date');
    
    /*
     * 2103.09.28 TODO:
     * Create and Validate Filtering
     * - something must be selected
     * - textbox must have something
     */
    if (!empty($_POST['where']) && !empty($_POST['like']))
    {
        $where                  = $_POST['where'];
        $like                   = $_POST['like'];
        $and                    = " AND {$where} LIKE :{$where}";
        $prmJoin[":{$where}"]   = "%{$like}%";
    }
    // =========================================================================
    
    $sqlJoin    = "SELECT
        logs.id AS id,
        logs.week_ending AS week_ending,
        logs.contact_date AS contact_date,
        companies.name AS company,
        CONCAT(contacts.name_last,', ',contacts.name_first,' ',contacts.name_middle) AS contact_name,
        contact_methods.name AS contact_method,
        logs.specify AS specify
        FROM logs
        LEFT JOIN companies
        ON logs.id_company = companies.id
        LEFT JOIN contacts
        ON logs.id_contact = contacts.id
        LEFT JOIN contact_methods
        ON logs.id_contact_method = contact_methods.id
        WHERE logs.id_user = :id_user
        {$and}{$sort}";
    $fetchJoin  = read($db, $sqlJoin, $prmJoin, TRUE);
    if(!empty($fetchJoin['error']))
    {
        $objStatus->setMessage("<li>Join Error -- {$fetchJoin['error']}</li>");
        $objStatus->setClass("status_error");
        $columns    = NULL;
        $thead      = NULL;
        $tbody      = NULL;
        $rows       = NULL;
    }
    else
    {
        $columns=array(
            array('title'=>'OPTIONS','field'=>NULL),
            array('title'=>'Week Ending','field'=>'week_ending'),
            array('title'=>'Contact Date','field'=>'contact_date'),
            array('title'=>'Company','field'=>'company'),
            array('title'=>'Contact','field'=>'contact_name'),
            array('title'=>'Contact Method','field'=>'contact_method'),
        );
        $thead  = return_THEAD($columns);
        $tbody  = "<tbody>";        
        $rows   = $fetchJoin['result'];
        foreach($rows as $row)
        {
            $rowID              = htmlentities($row['id'], ENT_QUOTES, 'UTF-8');
            $rowWeekEnding      = htmlentities($row['week_ending'], ENT_QUOTES, 'UTF-8');
            $rowContactDate     = htmlentities($row['contact_date'], ENT_QUOTES, 'UTF-8');
            $rowCompany         = htmlentities($row['company'], ENT_QUOTES, 'UTF-8');
            $rowContactName     = htmlentities($row['contact_name'], ENT_QUOTES, 'UTF-8');
            $rowContactMethod   = htmlentities($row['contact_method'], ENT_QUOTES, 'UTF-8');
            $rowSpecify         = htmlentities($row['specify'], ENT_QUOTES, 'UTF-8');

            $log_week_ending    = date("l F j, Y",strtotime($rowWeekEnding));
            $log_contact_date   = date("l F j, Y",strtotime($rowContactDate));
            $contact_company    = nullCheck($rowCompany,'DELETED');
            $contact_name       = nullCheck($rowContactName,'DELETED');

            $tbody.="<tr>
                <td class=\"td_dud\">
                <a title=\"Detail of This Log\" href=\"detail.php?id={$rowID}\">Detail</a>
                <br />
                <a title=\"Update This Log\" href=\"update.php?id={$rowID}\">Update</a>
                <br />
                <a title=\"Delete This Log\" href=\"delete.php?id={$rowID}\" class=\"delete\">Delete</a>
                </td>
                <td class=\"td_detail\">{$log_week_ending}</td>
                <td class=\"td_detail\">{$log_contact_date}</td>
                <td class=\"td_detail\">{$contact_company}</td>
                <td class=\"td_detail\">{$contact_name}</td>
                <td class=\"td_detail\">{$rowContactMethod}<br />({$rowSpecify})</td>
                </tr>";
        }
        $tbody  .= "</tbody>";
    }
    
    // =========================================================================
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require_once ('_table.php');
    require_once ($page['path'].'_views/footer.php');
?>