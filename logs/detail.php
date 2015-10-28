<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " | Detail",
        'path'      => "../",
        'mode'      => "Detail",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $id_user            = $_SESSION['user']['id'];
    $objLog             = new Log;
    $objLog->setId($_GET['id']);
    $objLog->setId_user($id_user);
    require ('_fetch.php');
    
    $objProspect        = new Prospect;
    $objProspect->setId($objLog->id_prospect);
    $objProspect->setId_user($id_user);
    require ('../prospects/_fetch.php');
    
    $objContact         = new Contact;
    $objContact->setId($objLog->id_contact);
    $objContact->setId_user($id_user);
    require ('../contacts/_fetch.php');
    
    $objContactMethod   = new Contact_Method;
    $objContactMethod->setId($objLog->id_contact_method);    
    $prmContactMethod   = $objContactMethod->id_params($objContactMethod->id);
    $sqlContactMethod   = $objContactMethod->select(NULL);
    $fetchContactMethod = $objData->db_read($db, $sqlContactMethod, $prmContactMethod, FALSE);
    $rowContactMethod   = $fetchContactMethod['result'];
    if(!empty($fetchContactMethod['error']))
    {
        $objStatus->setMessage("<li>Log Contact Method Error: {$fetchContactMethod['error']}</li>");
        $objStatus->setClass("status_error");
    }
    $objContactMethod->setName(htmlentities($rowContactMethod['name'], ENT_QUOTES, 'UTF-8'));
    
    $log_week_ending    = $objLog->full_week_ending();
    $log_contact_date   = $objLog->full_contact_date();
    $log_work           = $objLog->work;
    $log_prospect       = NULL;
    if(empty($objProspect->name))
    {
        $log_prospect   = Format::nullCheck($objProspect->name,'DELETED');
    }
    else
    {
        $log_prospect   = Link::inside("Go to Prospect Detail",
            "{$page['path']}prospects/detail.php?id={$objLog->id_prospect}",
            $objProspect->name);
    }
    $log_contact        = NULL;
    if(empty($objContact->name_last))
    {
        $log_contact    = Format::nullCheck($objContact->name_full(),'DELETED');
    }
    else
    {
        $log_contact    = Link::inside("Go to Contact Detail",
            "{$page['path']}contacts/detail.php?id={$objLog->id_contact}",
            $objContact->name_full());
    }
    $log_contact_method = $objContactMethod->name;
    $log_specify        = $objLog->specify;
    $log_results        = $objLog->results;
    $log_remarks        = $objLog->remarks;
    
    
    // =========================================================================
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require ('_details.php');
    require_once ($page['path'].'_views/footer.php');