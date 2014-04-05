<?php
    $pt4 = strtoupper(substr($project['title'],0,4));
    $pt6 = strtolower(substr($project['title'],4,6));
    
    $loginout = NULL;
    if (empty($_SESSION))
    {
        if($page['mode'] != "Log In")
        {
            $loginout .= formatInsideLink("Log In", "{$page['path']}login.php", "Log In");
        }
        $loginout .= formatInsideLink("Register", "{$page['path']}register.php", "Register");
    }
    if (!empty($_SESSION))
    {
        $loginout .= formatInsideLink("Log Out", "{$page['path']}logout.php", "Log Out");
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
        $nav_li .= "\r<li>" . formatInsideLink("HOME", "{$page['path']}welcome.php", "HOME") . "</li>\r
            \r<li>" . formatInsideLink("Profile", "{$page['path']}profile/", "Profile") . "</li>\r";
    }
    if (!empty($_SESSION['profile']))
    {
        $nav_li .= "\r<li>" . formatInsideLink("Companies", "{$page['path']}companies/", "Companies") . "</li>\r
            \r<li>" . formatInsideLink("Contacts", "{$page['path']}contacts/", "Contacts") . "</li>\r
            \r<li>" . formatInsideLink("Logs", "{$page['path']}logs/", "Logs") . "</li>\r
            \r<li>Mail</li>\r
            \r<li>Documents</li>\r
            \r<li>Networking</li>\r";
    }
    
    //=====
    $objContents    = new Content;
    $prmContents    = $objContents->parameters(NULL);
    $sort           = return_sort(FALSE, NULL, NULL, 'sequence');    
    $sqlContents    = $objContents->selectAll(NULL).' '.$sort;
    $fetchContents  = read($db, $sqlContents, $prmContents, TRUE);
    $rowContents    = NULL;
    $navContents    = NULL;    // for all pages
    $divContents    = NULL;    // for the welcome page
    if(!empty($fetchContents['error']))
    {
        $objStatus->setMessage("<li>{$fetchContents['error']}</li>");
        $objStatus->setClass("status_error");
        $rowContents    = NULL;
        $navContents    = NULL;
        $divContents    = NULL;
    }
    else
    {
        $rowContents    = $fetchContents['result'];
        foreach($rowContents as $rowContent)
        {
            $content_sequence       = htmlentities($rowContent['sequence'], ENT_QUOTES, 'UTF-8');
            $content_name           = htmlentities($rowContent['name'], ENT_QUOTES, 'UTF-8');
            $content_definition     = htmlentities($rowContent['definition'], ENT_QUOTES, 'UTF-8');
            $content_user           = htmlentities($rowContent['flag_user'], ENT_QUOTES, 'UTF-8');
            $content_profile        = htmlentities($rowContent['flag_profile'], ENT_QUOTES, 'UTF-8');
            $content_maintenance    = htmlentities($rowContent['flag_maintenance'], ENT_QUOTES, 'UTF-8');
            $content_directory      = str_replace(' ', '_', strtolower($content_name)).'/';
            if($content_sequence == FALSE)
            {
                $content_directory  = 'welcome.php';
            }
            $content_link           = formatInsideLink($content_name, "{$page['path']}{$content_directory}", $content_name);
            $content_li             = "\r<li>" . $content_link . "</li>\r";
                    
            if ($content_user == TRUE)
            {
                if (!empty($_SESSION['user']))
                {
                    $navContents .= $content_li;
                }
            }
            
            $content_profile_note = NULL;
            if ($content_profile == TRUE)
            {
                $content_profile_note = " <em>"
                        . "Ordinarily you would not see this link unless your Profile is in the system."
                        . "</em>";
                if (!empty($_SESSION['profile']))
                {
                    $navContents .= $content_li;
                }
            }

            if($content_sequence == TRUE) // Omits "HOME" for the Welcome page
            {
                $content_div = "<div class=\"contents\">
                    <span>
                        {$content_link}
                    </span>
                    <p>
                        {$content_definition}{$content_profile_note}
                    </p>            
                </div>";
                // posstible IFs re user/profile session variables, a la above navigation links        
                $divContents .= $content_div;
            }
        }
    }
    //=====
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