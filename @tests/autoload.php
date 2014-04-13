<?php

    
    /*** nullify any existing autoloads ***/
    spl_autoload_register(null, false);

    /*** specify extensions that may be loaded ***/
    spl_autoload_extensions('.php, .class.php');

    /*** class Loader ***/
    function classLoader($class)
    {
        $filename = strtolower($class) . '.php';
        $file ='../_classes/' . $filename;
        if (!file_exists($file))
        {
            return false;
        }
        include $file;
    }

    /*** register the loader functions ***/
    spl_autoload_register('classLoader');
    
    $formats = new Format();    
    $ssn = $formats->SSN('356542271');
    echo $ssn;
    
    $links = new Link();    
    $email = $links->email('Jeffrey', 'jephmann@gmail.com'); 
    echo $email;
    
    


