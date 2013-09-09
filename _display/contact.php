<?php
    $contact_phone      = formatPhone($objContact->phone, $objContact->phone_extension);
    $contact_fax        = formatPhone($objContact->fax, NULL);
    $contact_email      = formatEmailLink("Contact", $objContact->email);
    $contact_linkedin   = formatOutsideLink("Contact LinkedIn", $objContact->linkedin, NULL);
    $contact_twitter    = formatOutsideLink("Contact Twitter", $objContact->twitter, NULL);
    $contact_facebook   = formatOutsideLink("Contact Facebook", $objContact->facebook, NULL);
    $contact_googleplus = formatOutsideLink("Contact Google Plus", $objContact->googleplus, NULL);