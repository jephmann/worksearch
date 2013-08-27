<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " | Create",
        'path'      => "../",
        'mode'      => "Create",
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/Status.php');
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Log.php');
    require_once ($page['path'].'_functions/ddlDates.php');
    require_once ($page['path'].'_functions/ddlOptions.php');
    require_once ($page['path'].'_functions/rblOptions.php');
    
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    
    $objLog = new Log;    
    /*
     * =========================================================================
     */    
    
    $contact_date_yyyy = ('Y');
    $contact_date_mm = ('m');
    $contact_date_dd = ('d');
    
    require ('_defaults.php');
    if(!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            try
            {
                $stmt_insert        = $db->prepare($objLog->insert());
                $stmt_insert->execute($objLog->parameters(NULL));
                $header             = ("Location:index.php"); 
                header($header);
            }
            catch(PDOException $ex)
            {
                $objStatus->setMessage("<li>Failed to add the new Contact: {$ex->getMessage()}</li>");
                $objStatus->setColor("FF0000");
                $objStatus->setBackground_color("FFFF00");
            }
        }
    }
    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_html/head.php');
    require_once ($page['path'].'_html/header.php');
    require_once ($page['path'].'_html/aside.php');
    require_once ('_form.php');
    require_once ($page['path'].'_html/footer.php');
?>