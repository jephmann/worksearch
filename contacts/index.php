<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    $id_user    = $_SESSION['user']['id'];
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    require_once ($page['path'].'_include/helpers.php');
    // =========================================================================
    
    $prmJoin    = array(':id_user' => $id_user);
    require_once ($page['path'].'_variables/index.php');
    if (isset($_GET['orderby']) && isset($_GET['dir']))
    {
        $get        = TRUE;
        $orderby    = $_GET['orderby'];
        $dir        = $_GET['dir'];       
    }
    $sort   = return_sort($get, $orderby, $dir, 'name_last');
    
    /*
     * 2103.09.28 TODO:
     * Validate Filtering
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
        contacts.id AS id,
        prospects.name AS prospect,
        prospects.address_city AS city,
        prospects.address_state AS state,
        contacts.id_prospect AS id_prospect,
        contacts.name_last AS name_last,
        contacts.name_first AS name_first,
        contacts.name_middle AS name_middle,
        contacts.department AS department,
        contacts.title AS title,
        contacts.phone AS phone,
        contacts.phone_mobile AS mobile,
        contacts.phone_extension AS extension,
        contacts.email AS email
        FROM contacts
        LEFT JOIN prospects
        ON contacts.id_prospect = prospects.id
        WHERE contacts.id_user = :id_user
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
            array(
                'title'=>'OPTIONS',
                'field'=>NULL),
            array(
                'title'=>'Name',
                'field'=>'name_last'),
            array(
                'title'=>'Prospect',
                'field'=>'prospect'),
            array(
                'title'=>'Department',
                'field'=>'department'),
            array(
                'title'=>'Title',
                'field'=>'title'),
        );
        $thead      = $formats->thead($columns);
        $tbody      = "<tbody>";        
        $rows       = $fetchJoin['result'];
        foreach($rows as $row)
        {
            $rowID              = htmlentities($row['id'], ENT_QUOTES, 'UTF-8');
            $rowIDProspect      = htmlentities($row['id_prospect'], ENT_QUOTES, 'UTF-8');
            $rowProspect        = htmlentities($row['prospect'], ENT_QUOTES, 'UTF-8');
            $rowCity            = htmlentities($row['city'], ENT_QUOTES, 'UTF-8');
            $rowState           = htmlentities($row['state'], ENT_QUOTES, 'UTF-8');
            $rowNameLast        = htmlentities($row['name_last'], ENT_QUOTES, 'UTF-8');
            $rowNameFirst       = htmlentities($row['name_first'], ENT_QUOTES, 'UTF-8');
            $rowNameMiddle      = htmlentities($row['name_middle'], ENT_QUOTES, 'UTF-8');
            $rowDepartment      = htmlentities($row['department'], ENT_QUOTES, 'UTF-8');
            $rowTitle           = htmlentities($row['title'], ENT_QUOTES, 'UTF-8');
            $rowPhone           = htmlentities($row['phone'], ENT_QUOTES, 'UTF-8');
            $rowPhoneExtension  = htmlentities($row['extension'], ENT_QUOTES, 'UTF-8');
            $rowPhoneMobile     = htmlentities($row['mobile'], ENT_QUOTES, 'UTF-8');
            $rowEmail           = htmlentities($row['email'], ENT_QUOTES, 'UTF-8');

            // Formatting and Displaying
            
            $contact_citystate  = "{$rowCity}, {$rowState}";

            $contact_phone      = $formats->phone($rowPhone, $rowPhoneExtension);
            if(!empty($contact_phone))
            {
                $contact_phone  = "<br />O: {$contact_phone}";
            }
            $contact_phone_mobile   = $formats->phone($rowPhoneMobile, NULL);
            if(!empty($contact_phone_mobile))
            {
                $contact_phone_mobile  = "<br />M: {$contact_phone_mobile}";
            }
            $contact_email      = $links->email("Contact", $rowEmail);
            if(!empty($contact_email))
            {
                $contact_email  = "<br />{$contact_email}";
            }            
            $contact_prospect    = $formats->nullCheck($rowProspect,'DELETED');
            if(!empty($rowProspect))
            {
                $contact_prospect = $links->inside("Detail of This Prospect",
                        "../prospects/detail.php?id={$rowIDProspect}",
                        $contact_prospect);
            }
            
            $dud = array(
                'detail'    => $links->inside("Detail of This Contact",
                        "detail.php?id={$rowID}",
                        "Detail"),
                'update'    => $links->inside("Update This Contact",
                        "update.php?id={$rowID}",
                        "Update"),
                'delete'    => "<a title=\"Delete This Contact\" href=\"delete.php?id={$rowID}\" class=\"delete\">Delete</a>",
            );            

            $tbody.="<tr>
                <td class=\"td_dud\">
                {$dud['detail']}
                <br />
                {$dud['update']}
                <br />
                {$dud['delete']}
                </td>
                <td class=\"td_detail\">
                <strong>{$rowNameFirst} {$rowNameMiddle} {$rowNameLast}</strong>
                {$contact_phone}
                {$contact_phone_mobile}
                {$contact_email}
                </td>
                <td class=\"td_detail\"><strong>{$contact_prospect}</strong><br />{$contact_citystate}</td>
                <td class=\"td_detail\">{$rowDepartment}</td>
                <td class=\"td_detail\">{$rowTitle}</td>
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