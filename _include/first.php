<?php

    // $page['path'] comes from whatever file includes/requires this file
    $path_config = "{$page['path']}_config/";
    
    // this helps to resolve buffering differences between local and live environments
    ob_start();
    
    // general error stuff
    ini_set('display_errors', true);
    ini_set('display_startup_errors', true);
    error_reporting (E_ALL); 
    
    // tutorial*
    require_once("{$path_config}pdo.php");  // common.php part 1 (PDO configs, which include basic db variables)
    require_once("{$path_config}page.php"); // common.php part 2 (page configs, from within and without the tutorial)
    
    // autoloading class files    
    spl_autoload_register(null, false);     /*** nullify any existing autoloads ***/    
    spl_autoload_extensions('.class.php');  /*** specify extensions that may be loaded ***/    
    function classLoader($class)            /*** class Loader ***/
    {
        $filename   = strtolower($class) . '.class.php';
        $file       = '_classes/' . $filename;
        if (!file_exists($file))
        {
            $file   = '../' . $file;
            if (!file_exists($file))
            {
                return false;
            }
        }
        include $file;
    }    
    spl_autoload_register('classLoader');   /*** register the loader functions ***/
    
    /* COMMON CLASSES AND RELATED FUNCTIONS */
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
    
    /*
        Note that it is a good practice to NOT end your PHP files with a closing PHP tag.
        This prevents trailing newlines on the file from being included in your output,
        which can cause problems with redirecting users.
         
        * = http://forums.devshed.com/php-faqs-and-stickies-167/how-to-program-a-basic-but-secure-login-system-using-891201.html
    */