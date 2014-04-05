<?php
    $prospect_building       = NULL;
    if (!empty($objProspect->address_building))
    {
        $prospect_building   = $objProspect->address_building."\r<br />";
    }
    $prospect_unit           = NULL;
    if (!empty($objProspect->address_unit))
    {
        $prospect_unit       = $objProspect->address_unit."\r<br />";
    }
    $prospect_zip            = $objProspect->full_zip();
    $prospect_csz            = $objProspect->address_city.', '.$objProspect->address_state.' '.$prospect_zip;
    $prospect_phone          = $objProspect->full_phone();
    $prospect_fax            = $objProspect->full_fax();
    $prospect_email          = formatEmailLink($objProspect->name, $objProspect->email);
    $prospect_website        = formatOutsideLink($objProspect->name, $objProspect->website, NULL);
    $prospect_linkedin       = formatOutsideLink("Prospect LinkedIn", $objProspect->linkedin, NULL);
    $prospect_twitter        = formatOutsideLink("Prospect Twitter", $objProspect->twitter, NULL);
    $prospect_facebook       = formatOutsideLink("Prospect Facebook", $objProspect->facebook, NULL);
    $prospect_googleplus     = formatOutsideLink("Prospect GooglePlus", $objProspect->googleplus, NULL);
    $prospect_recruiter      = "<span style=\"color:green;\">NO</span>";
    if($objProspect->recruiter==TRUE)
    {
        $prospect_recruiter  = "<span style=\"color:red;\">YES</span>";
    }