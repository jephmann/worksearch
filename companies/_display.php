<?php
    $company_building       = NULL;
    if (!empty($objCompany->address_building))
    {
        $company_building   = $objCompany->address_building.'<br .>';
    }
    $company_unit           = NULL;
    if (!empty($objCompany->address_unit))
    {
        $company_unit       = $objCompany->address_unit.'<br .>';
    }
    $company_zip            = formatPostUS($objCompany->address_zip5, $objCompany->address_zip4);
    $company_csz            = $objCompany->address_city.', '.$objCompany->address_state.' '.$company_zip;
    $company_phone          = formatPhone($objCompany->phone, $objCompany->phone_extension);
    $company_fax            = formatPhone($objCompany->fax, NULL);
    $company_email          = formatEmailLink($objCompany->name, $objCompany->email);
    $company_website        = formatOutsideLink($objCompany->name, $objCompany->website, NULL);
    $company_linkedin       = formatOutsideLink("Company LinkedIn", $objCompany->linkedin, NULL);
    $company_twitter        = formatOutsideLink("Company Twitter", $objCompany->twitter, NULL);
    $company_facebook       = formatOutsideLink("Company Facebook", $objCompany->facebook, NULL);
    $company_googleplus     = formatOutsideLink("Company GooglePlus", $objCompany->googleplus, NULL);
    $company_recruiter      = "<span style=\"color:green;\">NO</span>";
    if($objCompany->recruiter==TRUE)
    {
        $company_recruiter  = "<span style=\"color:red;\">YES</span>";
    }
?>