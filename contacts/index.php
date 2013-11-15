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
        companies.name AS company,
        contacts.name_last AS name_last,
        contacts.name_first AS name_first,
        contacts.name_middle AS name_middle,
        contacts.department AS department,
        contacts.title AS title,
        contacts.phone AS phone,
        contacts.phone_extension AS extension,
        contacts.email AS email
        FROM contacts
        LEFT JOIN companies
        ON contacts.id_company = companies.id
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
                'title'=>'Company',
                'field'=>'company'),
            array(
                'title'=>'Name',
                'field'=>'name_last'),
            array(
                'title'=>'Department',
                'field'=>'department'),
            array(
                'title'=>'Title',
                'field'=>'title'),
            array(
                'title'=>'Phone',
                'field'=>'phone'),
            array(
                'title'=>'E-Mail',
                'field'=>'email'),
        );
        $thead  = return_THEAD($columns);
        $tbody  = "<tbody>";        
        $rows   = $fetchJoin['result'];
        foreach($rows as $row)
        {
            $rowID              = htmlentities($row['id'], ENT_QUOTES, 'UTF-8');
            $rowCompany         = htmlentities($row['company'], ENT_QUOTES, 'UTF-8');
            $rowNameLast        = htmlentities($row['name_last'], ENT_QUOTES, 'UTF-8');
            $rowNameFirst       = htmlentities($row['name_first'], ENT_QUOTES, 'UTF-8');
            $rowNameMiddle      = htmlentities($row['name_middle'], ENT_QUOTES, 'UTF-8');
            $rowDepartment      = htmlentities($row['department'], ENT_QUOTES, 'UTF-8');
            $rowTitle           = htmlentities($row['title'], ENT_QUOTES, 'UTF-8');
            $rowPhone           = htmlentities($row['phone'], ENT_QUOTES, 'UTF-8');
            $rowPhoneExtension  = htmlentities($row['extension'], ENT_QUOTES, 'UTF-8');
            $rowEmail           = htmlentities($row['email'], ENT_QUOTES, 'UTF-8');

            $contact_phone      = formatPhone($rowPhone, $rowPhoneExtension);
            $contact_email      = formatEmailLink("Contact", $rowEmail);            
            $contact_company    = nullCheck($rowCompany,'DELETED');

            $tbody.="<tr>
                <td class=\"td_dud\">
                <a href=\"detail.php?id={$rowID}\">Detail</a>
                <br />
                <a href=\"update.php?id={$rowID}\">Update</a>
                <br />
                <a href=\"delete.php?id={$rowID}\" class=\"delete\">Delete</a>
                </td>
                <td class=\"td_detail\">{$contact_company}</td>
                <td class=\"td_detail\">{$rowNameFirst} {$rowNameMiddle} {$rowNameLast}</td>
                <td class=\"td_detail\">{$rowDepartment}</td>
                <td class=\"td_detail\">{$rowTitle}</td>
                <td class=\"td_detail\">{$contact_phone}</td>
                <td class=\"td_detail\">{$contact_email}</td>
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