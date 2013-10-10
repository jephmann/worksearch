<?php
    $week_ending        = NULL;
    if(!empty($_POST['week_ending']))
    {        
        $week_ending    = new DateTime($_POST['week_ending']);
        $week_ending    = $week_ending->format('Y-m-d');
    }
    
    $contact_date       = NULL;
    $contact_date_yyyy  = ($_POST['contact_date_yyyy']);
    $contact_date_mm    = ($_POST['contact_date_mm']);
    $contact_date_dd    = ($_POST['contact_date_dd']);
    if((!empty($contact_date_yyyy)) && (!empty($contact_date_mm)) && (!empty($contact_date_dd)))
    {
        $contact_date   = new DateTime($contact_date_yyyy.'-'.$contact_date_mm.'-'.$contact_date_dd);
        $contact_date   = $contact_date->format('Y-m-d');
    }
    
    $contact_method     = NULL;
    if(isset($_POST['contact_method']))
    {
        $contact_method = $_POST['contact_method'];
    }

    /*
     * NEVER set/reset $object->id_user via POST
     */
    $objLog->setWeek_ending($week_ending);
    $objLog->setContact_date($contact_date);
    $objLog->setWork($_POST['work']);
    $objLog->setId_company($_POST['company']);
    $objLog->setId_contact($_POST['contact']);
    $objLog->setId_contact_method($contact_method);
    $objLog->setSpecify($_POST['specify']);
    $objLog->setResults($_POST['results']);
    $objLog->setRemarks($_POST['remarks']);