<?php
    /*
     * LOGS
     */

    $prmLog     = $objLog->id_params($objLog->id, $objLog->id_user);
    $sqlLog     = $objLog->select($objLog->id_user);
    $fetchLog   = $objData->db_read($db, $sqlLog, $prmLog, FALSE);
    $rowLog     = $fetchLog['result'];
    if(!empty($fetchLog['error']))
    {
        $objStatus->setMessage("<li>Log Error: {$fetchLog['error']}</li>");
        $objStatus->setClass("status_error");
    }
    $objLog->setId_user(htmlentities($rowLog['id_user'], ENT_QUOTES, 'UTF-8'));
    $objLog->setWeek_ending(htmlentities($rowLog['week_ending'], ENT_QUOTES, 'UTF-8'));
    $objLog->setContact_date(htmlentities($rowLog['contact_date'], ENT_QUOTES, 'UTF-8'));
    $objLog->setWork(htmlentities($rowLog['work'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_prospect(htmlentities($rowLog['id_prospect'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_contact(htmlentities($rowLog['id_contact'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_contact_method(htmlentities($rowLog['id_contact_method'], ENT_QUOTES, 'UTF-8'));
    $objLog->setSpecify(htmlentities($rowLog['specify'], ENT_QUOTES, 'UTF-8'));
    $objLog->setResults(htmlentities($rowLog['results'], ENT_QUOTES, 'UTF-8'));
    $objLog->setRemarks(htmlentities($rowLog['remarks'], ENT_QUOTES, 'UTF-8'));