<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " | Create",
        'path'      => "../",
        'mode'      => "Create",
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    // =========================================================================
    
    
    $thisYear   = date('Y');
    $thisMonth  = date('m');
    $thisDay    = date('d');
    
    $thisDate       = "{$thisYear}-{$thisMonth}-{$thisDay}";
    $weekEnding     = date("Y-m-d",strtotime($thisDate." this Saturday"));
    $dateContact    = date("Y-m-d",strtotime($thisDate));
    
    
    $objLog = new Log;
    $objLog->setWeek_ending($weekEnding);
    $objLog->setContact_date($dateContact);
    require ('_defaults.php');
    if(!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            $insert = insertRow($db, $objLog);
            if(!empty($insert['error']))
            {
                $objStatus->setMessage("<li>Failed to Create Log: {$insert['error']}</li>");
                $objStatus->setColor("FF0000");
                $objStatus->setBackground_color("FFFF00");
            }
            else
            {
                header('Location:index.php');
            }
        }
    }
    
    // =========================================================================
    require_once ($page['path'].'_html/head.php');
    require_once ($page['path'].'_html/header.php');
    require_once ($page['path'].'_html/aside.php');
    require_once ('_form.php');
    require_once ($page['path'].'_html/footer.php');
?>