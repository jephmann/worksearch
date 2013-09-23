<?php
    $status['message'] = NULL;

    // Ensure a Last Name for the Contact
    if(empty($objContact->name_last))
    {
        $status['message'] .= ("<li>Please enter a last name for this Contact.</li>");
    }
    
    // Not required, but Emails must be tested
    if(!empty($objContact->email))
    {
        // If the e-mail address is NOT valid (i.e. properly formatted)
        if(!filter_var($objContact->email, FILTER_VALIDATE_EMAIL))
        {
            $status['message'] .= ("<li>Invalid e-mail address.</li>");
        }
        // If the entered e-mail address is NOT unique among organizations
        if(returnAlreadyCheck($db, 'email', $objContact->email, 'contacts'))
        {
            $status['message'] .= ("<li>This Contact e-mail address already exists.</li>");
        }
    }
    
    if(!empty($status['message']))
    {
        $status['color']            = ("CC6666");
        $status['background-color'] = ("FFFFCC");
    }