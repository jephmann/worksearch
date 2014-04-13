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
    $prospect_email          = $objProspect->link_email();
    $prospect_website        = $links->outside($objProspect->name, $objProspect->website, NULL);
    $prospect_linkedin       = $links->outside("Prospect's LinkedIn", $objProspect->linkedin, $img_linkedin);
    $prospect_twitter        = $links->outside("Prospect's Twitter", $objProspect->twitter, $img_twitter);
    $prospect_facebook       = $links->outside("Prospect's Facebook", $objProspect->facebook, $img_twitter);
    $prospect_googleplus     = $links->outside("Prospect's GooglePlus", $objProspect->googleplus, NULL);
    $prospect_recruiter      = "<span style=\"color:green;\">NO</span>";
    if($objProspect->recruiter==TRUE)
    {
        $prospect_recruiter  = "<span style=\"color:red;\">YES</span>";
    }