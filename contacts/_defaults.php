<?php
    $option_errors      = NULL;
    
    $rblGender          = $inputs->rbl_gender('gender', $objContact->getGender());
    
    $optSalutations     = $inputs->ddl_options($db,
            $objContact->getId_salutation(),
            'id', 'abrv', $objSalutations,
            NULL, NULL);
    if(!empty($optSalutations['error']))
    {
        $option_errors .= $optSalutations['error'];
    }
    
    $optNameSuffixes    = $inputs->ddl_options($db,
            $objContact->getId_name_suffix(),
            'id', 'abrv', $objNameSuffixes,
            NULL, NULL);
    if(!empty($optNameSuffixes['error']))
    {
        $option_errors .= $optNameSuffixes['error'];
    }
    
    $optProspects       = $inputs->ddl_options($db,
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