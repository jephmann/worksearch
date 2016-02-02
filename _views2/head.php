<?php
    $pt4 = strtoupper(substr($project['title'],0,4));
    $pt6 = strtolower(substr($project['title'],4,6));
    
    $loginout = NULL;
    if (empty($_SESSION))
    {
        if($page['mode'] != "Log In")
        {
            $loginout .= Link::inside("Log In", "{$page['path']}login.php", "Log In") . '&nbsp;';
        }
        $loginout .= Link::inside("Register", "{$page['path']}register.php", "Register");
    }
    if (!empty($_SESSION))
    {
        $loginout .= Link::inside("Log Out", "{$page['path']}logout.php", "Log Out");
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
            $session_whose .= "<em>We invite you to build your"
                . " <a href=\"{$page['path']}profile/\">profile</a>"
                . " before proceding further.</em>";
        }
    }
    
    //=====
    $objContents    = new Content;
    $prmContents    = $objContents->parameters(NULL);
    $sort           = $objData->sort(FALSE, NULL, NULL, 'sequence');    
    $sqlContents    = $objContents->selectAll(NULL).' '.$sort;
    $fetchContents  = $objData->db_read($db, $sqlContents, $prmContents, TRUE);
    $rowContents    = NULL;
    $navContents    = NULL;    // for all pages
    $divContents    = NULL;    // for the welcome page
    $nav            = array();
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
            
            array_push($nav, array( 'file' => $content_name, 'title' => $content_name ));
            
            
            if($content_sequence == FALSE)
            {
                $content_directory  = 'welcome.php';
            }
            $content_link           = Link::inside($content_name, "{$page['path']}{$content_directory}", $content_name);
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

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="<?php echo $project['description']; ?>" />
        <meta name="keywords" content="<?php echo $project['keywords']; ?>" />
        <meta name="author" content="<?php echo $project['author']; ?>" />
        <meta name="robots" content="noindex, follow" />
        <title><?php echo ($project['title'].' | '.$page['title'].$page['subtitle']); ?></title>
        
        <link rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"            
            integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw=="
            crossorigin="anonymous">
        
        <link rel="stylesheet" href="<?php echo $page['path'];?>_css/formstuff.css" />
	<link rel="stylesheet" href="<?php echo $page['path'];?>_css/form/demo.css">
	<link rel="stylesheet" href="<?php echo $page['path'];?>_css/form/form-labels-on-top.css">        
        <!-- search & validation -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    </head>
    <body>