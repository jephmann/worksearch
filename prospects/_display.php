<?php
    /*
     * PROSPECTS
     */

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
    
    $prospect_website        = Link::outside($objProspect->name,
            $objProspect->website);
    $prospect_linkedin       = Link::outside("Prospect's LinkedIn",
            $objProspect->linkedin, $img_linkedin);
    $prospect_twitter        = Link::outside("Prospect's Twitter",
            $objProspect->twitter, $img_twitter);
    $prospect_facebook       = Link::outside("Prospect's Facebook",
            $objProspect->facebook, $img_facebook);
    $prospect_googleplus     = Link::outside("Prospect's GooglePlus",
            $objProspect->googleplus,'GooglePlus' );
    
    $prospect_recruiter      = "<span style=\"color:green;\">NO</span>";
    if($objProspect->recruiter==TRUE)
    {
        $prospect_recruiter  = "<span style=\"color:red;\">YES</span>";
    }