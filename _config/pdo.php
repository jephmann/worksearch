<?php
    $db_username    = "root";
    $db_password    = NULL;
    $db_host        = "localhost";
    $db_name        = "worksearch";
    $db_charset     = "utf8";
    $db_mysql       = "mysql:host={$db_host};dbname={$db_name};charset={$db_charset}";
    $db_options     = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    try
    {
        $db = new PDO($db_mysql, $db_username, $db_password, $db_options);
    }
    catch(PDOException $ex)
    {
        die("Failed to connect to {$db_name} database: " . $ex->getMessage());
    }
    // Configures PDO to throw an exception when it encounters an error.
    // This allows us to use try/catch blocks to trap database errors.
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Configures PDO to return database rows from your database using an
    // associative array.
    // This means the array will have string indexes, where the string value
    // represents the name of the column in your database.
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
/*
    Based on:
    http://forums.devshed.com/php-faqs-and-stickies-167/how-to-program-a-basic-but-secure-login-system-using-891201.html
    -- JH
 */