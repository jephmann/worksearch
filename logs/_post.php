<?php
    $week_ending = new DateTime($_POST['week_ending']);
    $objLog->setWeek_ending($week_ending->format('Y-m-d'));

    $contact_date_yyyy = ($_POST['contact_date_yyyy']);
    $contact_date_mm = ($_POST['contact_date_mm']);
    $contact_date_dd = ($_POST['contact_date_dd']);
    $contact_date = new DateTime($contact_date_yyyy.'-'.$contact_date_mm.'-'.$contact_date_dd);

    $objLog->setContact_date($contact_date->format('Y-m-d'));

    $objLog->setWork($_POST['work']);
    $objLog->setId_company($_POST['company']);
    $objLog->setId_contact($_POST['contact']);
    $objLog->setId_contact_method($_POST['contact_method']);
    $objLog->setSpecify($_POST['specify']);
    $objLog->setResults($_POST['results']);
    $objLog->setRemarks($_POST['remarks']);
?>
