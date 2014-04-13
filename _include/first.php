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
    
    /*
        Note that it is a good practice to NOT end your PHP files with a closing PHP tag.
        This prevents trailing newlines on the file from being included in your output,
        which can cause problems with redirecting users.
         
        * = http://forums.devshed.com/php-faqs-and-stickies-167/how-to-program-a-basic-but-secure-login-system-using-891201.html
    */