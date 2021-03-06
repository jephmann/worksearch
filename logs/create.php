<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " | Create",
        'path'      => "../",
        'mode'      => "Create",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $thisYear   = date('Y');
    $thisMonth  = date('m');
    $thisDay    = date('d');
    
    $thisDate       = "{$thisYear}-{$thisMonth}-{$thisDay}";
    $weekEnding     = date("Y-m-d",strtotime($thisDate." this Saturday"));
    $dateContact    = date("Y-m-d",strtotime($thisDate));
    
    $objLog             = new Log;
    $objLog->setId_user($_SESSION['user']['id']);
    $objLog->setWeek_ending($weekEnding);
    $objLog->setContact_date($dateContact);
    $objProspects       = new Prospect;
    $objContacts        = new Contact;
    $objContactMethods  = new Contact_Method;
    require ('_defaults.php');
    if(!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            $insert = $objData->db_create($db, $objLog);
            if(!empty($insert['error']))
            {
                $objStatus->setMessage("<li>Failed to Create Log: {$insert['error']}<br/>{$objLog->insert()}</li>");
                $objStatus->setClass("status_error");
            }
            else
            {
                header("Location:detail.php?id={$insert['id']}");
            }
        }
    }
    
    // =========================================================================
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require_once ('_form.php');
    require_once ($page['path'].'_views/footer.php');