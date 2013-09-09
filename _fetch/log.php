<?php    
    $rowLog = fetchRow($db, $objLog, $id);
    
    $objLog->setWeek_ending(htmlentities($rowLog['week_ending'], ENT_QUOTES, 'UTF-8'));
    $objLog->setContact_date(htmlentities($rowLog['contact_date'], ENT_QUOTES, 'UTF-8'));
    $objLog->setWork(htmlentities($rowLog['work'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_company(htmlentities($rowLog['id_company'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_contact(htmlentities($rowLog['id_contact'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_contact_method(htmlentities($rowLog['id_contact_method'], ENT_QUOTES, 'UTF-8'));
    $objLog->setSpecify(htmlentities($rowLog['specify'], ENT_QUOTES, 'UTF-8'));
    $objLog->setResults(htmlentities($rowLog['results'], ENT_QUOTES, 'UTF-8'));
    $objLog->setRemarks(htmlentities($rowLog['remarks'], ENT_QUOTES, 'UTF-8'));