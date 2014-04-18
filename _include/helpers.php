<?php
    // database class
    $objData    = new Data;

    // common helper classes
    $formats    = new Format;
    $inputs     = new Input;
    $links      = new Link;
    $objStatus  = new Status;
    $validate   = new Validation;
    
    // common images
    $link_img       = "{$page['path']}_images/SocialMediaBookmarkIcon/16/";
    $img_linkedin   = $formats->image($link_img.'linkedin.png','LinkedIn');
    $img_twitter    = $formats->image($link_img.'twitter.png','Twitter');
    $img_facebook   = $formats->image($link_img.'facebook.png','Facebook');
    $img_googleplus = $formats->image($link_img.'linkedin.png','Google+');
    
    // status message
    $objStatus->setClass("status_quo");