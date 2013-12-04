<?php
    // CRUD
    require_once ($page['path'].'_functions/create.php');
    require_once ($page['path'].'_functions/read.php');
    require_once ($page['path'].'_functions/update.php');
    require_once ($page['path'].'_functions/delete.php');
    // STRINGS
    require_once ($page['path'].'_functions/formatLinks.php');
    require_once ($page['path'].'_functions/formatPhone.php');
    require_once ($page['path'].'_functions/formatPostUS.php');
    require_once ($page['path'].'_functions/formatDriversLicense.php');
    require_once ($page['path'].'_functions/formatSSN.php');
    require_once ($page['path'].'_functions/nullCheck.php');
    require_once ($page['path'].'_functions/returnFullNamePlus.php');
    require_once ($page['path'].'_functions/validation.php');
    require_once ($page['path'].'_functions/returnImage.php'); 
    // INPUTS
    require_once ($page['path'].'_functions/ddlDates.php');
    require_once ($page['path'].'_functions/ddlOptions.php');
    require_once ($page['path'].'_functions/rblGender.php');
    require_once ($page['path'].'_functions/rblOptions.php');
    require_once ($page['path'].'_functions/rblTrueFalse.php');
    // OTHER
    require_once ($page['path'].'_functions/redirect.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    require_once ($page['path'].'_functions/returnSort.php');
    require_once ($page['path'].'_functions/returnTHEAD.php');
    
    // images I need in a variety of places
    $link_img       = "{$page['path']}_images/SocialMediaBookmarkIcon/16/";
    $img_linkedin   = return_image($link_img.'linkedin.png','LinkedIn');
    $img_twitter    = return_image($link_img.'twitter.png','Twitter');
    $img_facebook   = return_image($link_img.'facebook.png','Facebook');
    $img_googleplus = return_image($link_img.'linkedin.png','Google+');