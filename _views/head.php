<?php
    $pt4 = strtoupper(substr($project['title'],0,4));
    $pt6 = strtolower(substr($project['title'],4,6));
    
    $loginout = NULL;
    if (empty($_SESSION))
    {
        if($page['mode'] != "Log In")
        {
            $loginout .= "<a href=\"{$page['path']}login.php\">Log In</a>";
        }
        $loginout .= "<a href=\"{$page['path']}register.php\">Register</a>";
    }
    if (!empty($_SESSION))
    {
        $loginout .= "<a href=\"{$page['path']}logout.php\">Log Out</a>";
    }    
    
    $session_whose = "<br />";

    if(!empty($_SESSION['profile']))
    {
        $session_name_full = $_SESSION['profile']['name_last'];
        if(!empty($_SESSION['profile']['name_middle']))
        {
            $session_name_full = $_SESSION['profile']['name_middle'] . ' ' . $session_name_full;
        }
        if(!empty($_SESSION['profile']['name_first']))
        {
            $session_name_full = $_SESSION['profile']['name_first'] . ' ' . $session_name_full;
        }
        $session_whose .= "{$session_name_full}
            <br/>
            {$_SESSION['profile']['address_city']}, {$_SESSION['profile']['address_state']}";
    }
    else
    {
        if(!empty($_SESSION))
        {
            $session_whose .= "We invite you to build your profile<br />before proceding further.";
        }
    }    
    
    $nav_li = NULL;
    if (!empty($_SESSION['user']))
    {
        $nav_li .= "<li><a href=\"{$page['path']}welcome.php\">HOME</a></li>
            <li><a href=\"{$page['path']}profile/\">Profile</a></li>";
    }
    if (!empty($_SESSION['profile']))
    {
        $nav_li .= "<li><a href=\"{$page['path']}companies/\">Companies</a></li>
            <li><a href=\"{$page['path']}contacts/\">Contacts</a></li>
            <li><a href=\"{$page['path']}logs/\">Logs</a></li>
            <li>Mail</li>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="<?php echo $project['description']; ?>" />
        <meta name="keywords" content="<?php echo $project['keywords']; ?>" />
        <meta name="author" content="<?php echo $project['author']; ?>" />
        <meta name="robots" content="noindex, follow" />
        <title><?php echo ($project['title'].' | '.$page['title'].$page['subtitle']); ?></title>
        <link rel="stylesheet" href="<?php echo $page['path'];?>_css/reset.css" />
        <link rel="stylesheet" href="<?php echo $page['path'];?>_css/common.css" />
        <script language="javascript" type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script language="javascript" type="text/javascript"
            src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    </head>
    <body>