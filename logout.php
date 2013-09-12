<?php   
    $page = array(
        'title'     => "Session",
        'subtitle'  => "Log Out",
        'path'      => NULL,
        'mode'      => "Log Out",
    );
    require ($page['path'].'_include/first.php');
    unset($_SESSION['user']);
    header("Location: login.php");
    die("Redirecting to: login.php");