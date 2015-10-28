<?php
    /*
     * CONTACTS
     */

    $option_errors      = NULL;
    
    $rblGender          = Input::rbl_gender('gender', $objContact->getGender());
    
    $optSalutations     = Input::ddl_options($db,
        $objContact->getId_salutation(),
        'id', 'abrv', $objSalutations);
    if(!empty($optSalutations['error']))
    {
        $option_errors .= $optSalutations['error'];
    }
    
    $optNameSuffixes    = Input::ddl_options($db,
        $objContact->getId_name_suffix(),
        'id', 'abrv', $objNameSuffixes);
    if(!empty($optNameSuffixes['error']))
    {
        $option_errors .= $optNameSuffixes['error'];
    }
    
    $optProspects       = Input::ddl_options($db,
        $objContact->getID_prospect(),
        'id', 'name', $objProspects,
        'name, \' \', UPPER(branch)',
        'name ASC, branch ASC');
    if(!empty($optProspects['error']))
    {
        $option_errors .= $optProspects['error'];
    }
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }