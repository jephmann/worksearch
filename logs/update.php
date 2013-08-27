<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " | Update",
        'path'      => "../",
        'mode'      => "Update",
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

    $id = $_GET['id'];
    try
    {
        $stmt = $db->prepare($objLog->select($id));
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }
    $row = $stmt->fetch();
    
    
    $objLog->setWeek_ending(htmlentities($row['week_ending'], ENT_QUOTES, 'UTF-8'));
    $objLog->setContact_date(htmlentities($row['contact_date'], ENT_QUOTES, 'UTF-8'));
    $objLog->setWork(htmlentities($row['work'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_company(htmlentities($row['id_company'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_contact(htmlentities($row['id_contact'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_contact_method(htmlentities($row['id_contact_method'], ENT_QUOTES, 'UTF-8'));
    $objLog->setSpecify(htmlentities($row['specify'], ENT_QUOTES, 'UTF-8'));
    $objLog->setResults(htmlentities($row['results'], ENT_QUOTES, 'UTF-8'));
    $objLog->setRemarks(htmlentities($row['remarks'], ENT_QUOTES, 'UTF-8'));
    
    
    
    
    
    
    //$optWeekEnding = optWeeks('Saturday', date('Y-m-d', strtotime('2013-08-03')));
    $contact_date_mm = date('m', strtotime($objLog->contact_date));
    $contact_date_dd = date('j', strtotime($objLog->contact_date));
    $contact_date_yyyy = date('Y', strtotime($objLog->contact_date));
    
    echo $contact_date_dd;
    
    require ('_defaults.php');
    if(!empty($_POST))
    {
        require_once ('_post.php');
        //require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            try
            {
                $stmt_update    = $db->prepare($objLog->update());
                $stmt_update->execute($objLog->parameters($id));
                header('Location:index.php');
            }
            catch(PDOException $ex)
            {
                $objStatus->setMessage("<li>Failed to Update Contact: {$ex->getMessage()}</li>");
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