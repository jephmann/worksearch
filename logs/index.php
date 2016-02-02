<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $id_user    = $_SESSION['user']['id'];
    $prmJoin    = array(':id_user' => $id_user);
    require_once ($page['path'].'_variables/index.php');
    if (isset($_GET['orderby']) && isset($_GET['dir']))
    {
        $get        = TRUE;
        $orderby    = $_GET['orderby'];
        $dir        = $_GET['dir'];       
    }
    $sort       = $objData->sort($get, $orderby, $dir, 'contact_date');
    
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
        prospects.name AS prospect,
        CONCAT(contacts.name_last,', ',contacts.name_first,' ',contacts.name_middle) AS contact_name,
        contact_methods.name AS contact_method,
        logs.specify AS specify
        FROM logs
        LEFT JOIN prospects
        ON logs.id_prospect = prospects.id
        LEFT JOIN contacts
        ON logs.id_contact = contacts.id
        LEFT JOIN contact_methods
        ON logs.id_contact_method = contact_methods.id
        WHERE logs.id_user = :id_user
        {$and}{$sort}";
    $fetchJoin  = $objData->db_read($db, $sqlJoin, $prmJoin, TRUE);
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
        $columns    = array(
            array('title'=>'OPTIONS','field'=>NULL),
            array('title'=>'Week Ending','field'=>'week_ending'),
            array('title'=>'Contact Date','field'=>'contact_date'),
            array('title'=>'Prospect','field'=>'prospect'),
            array('title'=>'Contact','field'=>'contact_name'),
            array('title'=>'Contact Method','field'=>'contact_method'),
        );
        $thead  = Format::thead($columns);
        $tbody  = "<tbody>";        
        $rows   = $fetchJoin['result'];
        foreach($rows as $row)
        {
            $rowID              = htmlentities($row['id'], ENT_QUOTES, 'UTF-8');
            $rowWeekEnding      = htmlentities($row['week_ending'], ENT_QUOTES, 'UTF-8');
            $rowContactDate     = htmlentities($row['contact_date'], ENT_QUOTES, 'UTF-8');
            $rowProspect        = htmlentities($row['prospect'], ENT_QUOTES, 'UTF-8');
            $rowContactName     = htmlentities($row['contact_name'], ENT_QUOTES, 'UTF-8');
            $rowContactMethod   = htmlentities($row['contact_method'], ENT_QUOTES, 'UTF-8');
            $rowSpecify         = htmlentities($row['specify'], ENT_QUOTES, 'UTF-8');

            $log_week_ending    = date("l F j, Y",strtotime($rowWeekEnding));
            $log_contact_date   = date("l F j, Y",strtotime($rowContactDate));
            $contact_prospect   = Format::nullCheck($rowProspect,'DELETED');
            $contact_name       = Format::nullCheck($rowContactName,'DELETED');
            
            $dud = array(
                'detail'    => Link::inside("Detail of This Log",
                        "detail.php?id={$rowID}",
                        "Detail"),
                'update'    => Link::inside("Update This Log",
                        "update.php?id={$rowID}",
                        "Update"),
                'delete'    => "<a title=\"Delete This Log\" href=\"delete.php?id={$rowID}\" class=\"delete\">Delete</a>",
            );

            $tbody.="<tr>
                <td class=\"td_dud\">
                {$dud['detail']}
                <br />
                {$dud['update']}
                <br />
                {$dud['delete']}
                </td>
                <td class=\"td_detail\">{$log_week_ending}</td>
                <td class=\"td_detail\">{$log_contact_date}</td>
                <td class=\"td_detail\">{$contact_prospect}</td>
                <td class=\"td_detail\">{$contact_name}</td>
                <td class=\"td_detail\">{$rowContactMethod}<br />({$rowSpecify})</td>
                </tr>";
        }
        $tbody  .= "</tbody>";
    }
    
    // =========================================================================
    require_once ($page['path'].'_views2/head.php');
    require_once ($page['path'].'_views2/header.php');
    require_once ($page['path'].'_views2/nav.php');
    //require_once ($page['path'].'_views/aside.php');
    require_once ('_table2.php');
    require_once ($page['path'].'_views2/foot.php');