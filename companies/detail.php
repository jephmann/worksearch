<?php    
    $page = array(
        'title'     => "Companies",
        'subtitle'  => " > Detail",
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
    
    // COMPANY
    $objCompany = new Company;
    $objCompany->setId_user($id_user);
    $objCompany->setId($_GET['id']);
    require ('_fetch.php');
    require ('_display.php');
    
    // COMPANY'S CONTACTS
    $objContacts = new Contact;
    $objContacts->setId_user($id_user);
    $objContacts->setId_company($objCompany->id);
    
    $prmContacts = $objContacts->id_params($objContacts->id, $objContacts->id_user);
    $prmContacts['id_company'] = $objContacts->id_company;
    $sqlContacts = $objContacts->selectAll($id_user);
    $sqlContacts .= " AND id_company = :id_company";    
    
    $fetchContacts   = read($db, $sqlContacts, $prmContacts, TRUE);
    $rowContacts     = $fetchContacts['result'];
    if(!empty($fetchContacts['error']))
    {
        $objStatus->setMessage("<li>Contacts Error: {$fetchContacts['error']}</li>");
        $objStatus->setClass("status_error");
    }
    $p_contacts = NULL;
    if(empty($rowContacts))
    {
        $p_contacts = "<p><strong>NONE Listed</strong></p>";
    }
    else
    {    
        foreach($rowContacts as $rowC)
        {
            $rowCID                 = htmlentities($rowC['id'], ENT_QUOTES, 'UTF-8');
            $rowCNameLast           = htmlentities($rowC['name_last'], ENT_QUOTES, 'UTF-8');
            $rowCNameFirst          = htmlentities($rowC['name_first'], ENT_QUOTES, 'UTF-8');
            $rowCNameMiddle         = htmlentities($rowC['name_middle'], ENT_QUOTES, 'UTF-8');
            $rowCDepartment         = htmlentities($rowC['department'], ENT_QUOTES, 'UTF-8');
            $rowCTitle              = htmlentities($rowC['title'], ENT_QUOTES, 'UTF-8');
            $rowCPhone              = htmlentities($rowC['phone'], ENT_QUOTES, 'UTF-8');
            $rowCPhoneExtension     = htmlentities($rowC['phone_extension'], ENT_QUOTES, 'UTF-8');
            $rowCPhoneMobile        = htmlentities($rowC['phone_mobile'], ENT_QUOTES, 'UTF-8');
            $rowCFax                = htmlentities($rowC['fax'], ENT_QUOTES, 'UTF-8');
            $rowCEmail              = htmlentities($rowC['email'], ENT_QUOTES, 'UTF-8');
            $rowCLinkedIn           = htmlentities($rowC['linkedin'], ENT_QUOTES, 'UTF-8');
            $rowCGooglePlus         = htmlentities($rowC['googleplus'], ENT_QUOTES, 'UTF-8');
            $rowCFacebook           = htmlentities($rowC['facebook'], ENT_QUOTES, 'UTF-8');
            $rowCTwitter            = htmlentities($rowC['twitter'], ENT_QUOTES, 'UTF-8');
            
            $c_name = "{$rowCNameFirst} {$rowCNameMiddle} {$rowCNameLast}";
            $c_email = formatEmailLink($c_name, $rowCEmail);

            $p_contacts .= "\r<p>\r<strong>" . formatInsideLink("Detail of Contact", "../contacts/detail.php?id={$rowCID}", $c_name) . "</strong>";
            if(!empty($rowCDepartment))
            {
                $p_contacts .= "\r<br />{$rowCDepartment}";
            }
            if(!empty($rowCTitle))
            {
                $p_contacts .= "\r<br />{$rowCTitle}";
            }
            if(!empty($rowCPhone))
            {
                $c_phone = formatPhone($rowCPhone,$rowCPhoneExtension);
                $p_contacts .= "\r<br />Office Phone: {$c_phone}";
            }
            if(!empty($rowCPhoneMobile))
            {
                $c_phone_mobile = formatPhone($rowCPhoneMobile,NULL);
                $p_contacts .= "\r<br />Mobile Phone: {$c_phone_mobile}";
            }
            if(!empty($rowCFax))
            {
                $c_fax = formatPhone($rowCFax,NULL);
                $p_contacts .= "\r<br />Office Fax: {$c_fax}";
            }
            if(!empty($rowCEmail))
            {
                $p_contacts .= "\r<br />E-Mail: {$c_email}";
            }
            
            $p_contact_links = NULL;
            if(!empty($rowCLinkedIn))
            {
                $p_contact_links .= "\r&nbsp;".formatOutsideLink('LinkedIn',$rowCLinkedIn,$img_linkedin);
            }
            if(!empty($rowCFacebook))
            {
                $p_contact_links .= "\r&nbsp;".formatOutsideLink('Facebook',$rowCFacebook,$img_facebook);
            }
            if(!empty($rowCTwitter))
            {
                $p_contact_links .= "\r&nbsp;".formatOutsideLink('Twitter',$rowCTwitter,$img_twitter);
            }
            if(!empty($rowCGooglePlus))
            {
                $p_contact_links .= "\r&nbsp;".formatOutsideLink('GooglePlus',$rowCGooglePlus,'GooglePlus');
            }
            if(!empty($p_contact_links))
            {
                $p_contacts .= "\r<br /><em><strong>Links:</strong></em> {$p_contact_links}";
            }
            $p_contacts .= "\r</p>\r";
        }

    }
    
    // COMPANY'S LOGS
    $objLogs = new Log;
    $objLogs->setId_user($id_user);
    $objLogs->setId_company($objCompany->id);
    
    $prmLogs = $objLogs->id_params($objLogs->id, $objLogs->id_user);
    $prmLogs['id_company'] = $objLogs->id_company;
    $sqlLogs = $objLogs->selectAll($id_user);
    $sqlLogs .= " AND id_company = :id_company";   
    
    $fetchLogs   = read($db, $sqlLogs, $prmLogs, TRUE);
    $rowLogs     = $fetchLogs['result'];
    if(!empty($fetchLogs['error']))
    {
        $objStatus->setMessage("<li>Contacts Error: {$fetchLogs['error']}</li>");
        $objStatus->setClass("status_error");
    }
    $tr_logs = NULL;
    if(empty($rowLogs))
    {
        $tr_logs .= "<tr><td>NO LOGS Posted</td></tr>";
    }
    else
    {
        // 2013.11.29 TODO: Retrieve Company Logs
        $tr_logs .= "<tr><td>Bunch of Logs</td></tr>";
    }
    
    
    // =========================================================================    
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require ('_details.php');
    require_once ($page['path'].'_views/footer.php');
?>