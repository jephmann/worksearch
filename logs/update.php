<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " | Update",
        'path'      => "../",
        'mode'      => "Update",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    // =========================================================================
    
    $objLog = new Log;
    $objLog->setId($_GET['id']);
    require ('_fetch.php');
    
    //$optWeekEnding = optWeeks('Saturday', date('Y-m-d', strtotime('2013-08-03')));
    $contact_date_mm = date('m', strtotime($objLog->contact_date));
    $contact_date_dd = date('j', strtotime($objLog->contact_date));
    $contact_date_yyyy = date('Y', strtotime($objLog->contact_date));
    
    require ('_defaults.php');
    if(!empty($_POST))
    {
        require_once ('_post.php');
        //require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            $location   = 'index.php';
            $update     = updateRow($db, $objLog);
            if(!empty($update['result']['error']))
            {
                $objStatus->setMessage("<li>Failed to Update Log: {$update['result']['error']}</li>");
                $objStatus->setColor("FF0000");
                $objStatus->setBackground_color("FFFF00");
            }
            else
            {
                header('Location:'.$location);
            }
        }
    }
    
    // =========================================================================
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require_once ('_form.php');
    require_once ($page['path'].'_views/footer.php');
?>