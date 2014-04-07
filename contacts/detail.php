<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " | Detail",
        'path'      => "../",
        'mode'      => "Detail",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    $id_user    = $_SESSION['user']['id'];
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus  = new Status;
    $objStatus->setClass("status_quo");
    // =========================================================================    
    
    // CONTACT
    $objContact     = new Contact;
    $objContact->setId_user($id_user);
    $objContact->setId($_GET['id']);
    require ('_fetch.php');
    require ('_display.php');
    
    // CONTACT'S PROSPECT
    $objProspect     = new Prospect;
    $objProspect->setId_user($id_user);
    $objProspect->setId($objContact->id_prospect);
    require ($page['path'].'prospects/_fetch.php');
    require ($page['path'].'prospects/_display.php');
    $prospect_name = "<a title=\"Link to Prospect Detail\"
        href=\"../prospects/detail.php?id={$objContact->id_prospect}\">
            {$objProspect->name}</a>";
    $prospect_branch    = $objProspect->branch;
    
    // CONTACT'S LOGS
    /*
     * 2013.09.06 TO DO:
     * - Display Logs specific to this Contact
     */
    $objLogs        = new Log;
    $objLogs->setId_user($id_user);
    $objLogs->setId_prospect($objProspect->id);
    $objLogs->setId_contact($objContact->id);
    
    $prmLogs = $objLogs->id_params($objLogs->id, $objLogs->id_user);
    $prmLogs['id_contact'] = $objLogs->id_contact;
    $sqlLogs = $objLogs->selectAll($id_user);
    $sqlLogs .= " AND id_contact = :id_contact";
    
    $fetchLogs   = read($db, $sqlLogs, $prmLogs, TRUE);
    $rowLogs     = $fetchLogs['result'];
    if(!empty($fetchLogs['error']))
    {
        $objStatus->setMessage("<li>Contact Log Error: {$fetchLogs['error']}</li>");
        $objStatus->setClass("status_error");
    }
    $tr_logs = NULL;
    if(empty($rowLogs))
    {
        $tr_logs .= "<tr><td>NO LOGS Posted</td></tr>";
    }
    else
    {
        // 2013.11.29 TODO: Retrieve Contact Logs
        $tr_logs .= "<thead><tr>
            <th>Log<br />Detail</th>
            <th>Week<br />Ending</th>
            <th>Contact<br />Date</th>
            <th>Results</th>
            </tr></thead>
            </tbody>";
        foreach($rowLogs as $rowL)
        {
            $rowLID = $rowL['id'];
            $rowLWeekEnding = $rowL['week_ending'];
            $rowLContactDate = $rowL['contact_date'];
            $rowLWork = $rowL['work'];
            $rowLResults = $rowL['results'];
            $tr_logs .= "<tr>
                <td><a href=\"../logs/detail.php?id={$rowLID}\">Detail</a></td>
                <td>{$rowLWeekEnding}</td>
                <td>{$rowLContactDate}</td>
                <td>{$rowLResults}</td>
                </tr>";
        }
    }
    
    // PROSPECT'S ADDITIONAL CONTACTS
    /*
     * 2013.09.06 TO DO:
     * - Display Contacts (other than this Contact) specific to this Contact's Prospect
     */
    $objContacts    = new Contact;
    $objContacts->setId_prospect($objProspect->id);
    $objContacts->setId_user($id_user);
    
    // =========================================================================    
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require ('_details.php');
    require_once ($page['path'].'_views/footer.php');
?>