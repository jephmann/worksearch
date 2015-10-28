<?php
    $page = array(
        'title'     => "Session",
        'subtitle'  => " > Log In",
        'path'      => NULL,
        'mode'      => "Log In",
    );
    require ($page['path'].'_include/first.php');    
    // user_session redirect unnecessary here
    // =========================================================================
    
    // JH's touch: the User class
    $objUser = new User;
    $objUser->setUsername(NULL);
    $objUser->setPassword(NULL);
    $objUser->setSalt(NULL);
    $objUser->setEmail(NULL);
    
    // This variable will be used to re-display the user's username to them in the
    // login form if they fail to enter the correct password.  It is initialized here
    // to an empty value, which will be shown if the user has not submitted the form.
    $submitted_username = '';
    
    // This if statement checks to determine whether the login form has been submitted
    // If it has, then the login code is run, otherwise the form is displayed
    if(!empty($_POST))
    {
        $status_message = NULL;
        // This query retreives the user's information from the database using
        // their username.
        $query = "
            SELECT id, username, password, salt, email
            FROM users
            WHERE username = :username
            ";
        
        // The parameter values
        $query_params = array(
            ':username' => $_POST['login_username']
        );
        
        try
        {
            // Execute the query against the database
            $stmt   = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code. 
            //die("Failed to run query: " . $ex->getMessage());
            $status_message .= ("Failed to run query: " . $ex->getMessage());
        }
        
        // This variable tells us whether the user has successfully logged in or not.
        // We initialize it to false, assuming they have not.
        // If we determine that they have entered the right details, then we switch it to true.
        $login_ok = false;
        
        // Retrieve the user data from the database.  If $row is false, then the username
        // they entered is not registered.
        $row = $stmt->fetch();
        if($row)
        {
            // Using the password submitted by the user and the salt stored in the database,
            // we now check to see whether the passwords match by hashing the submitted password
            // and comparing it to the hashed version already stored in the database.
            $check_password = hash('sha256', $_POST['login_password'] . $row['salt']);
            for($round = 0; $round < 65536; $round++)
            {
                $check_password = hash('sha256', $check_password . $row['salt']);
            }
            
            if($check_password === $row['password'])
            {
                // If they do, then we flip this to true
                $login_ok = true;
            }
        }
        
        // If the user logged in successfully, then we send them to the private members-only page
        // Otherwise, we display a login failed message and show the login form again
        if($login_ok)
        {
            // Here I am preparing to store the $row array into the $_SESSION by
            // removing the salt and password values from it.  Although $_SESSION is
            // stored on the server-side, there is no reason to store sensitive values
            // in it unless you have to.  Thus, it is best practice to remove these
            // sensitive values first.
            unset($row['salt']);
            unset($row['password']);
            
            // This stores the user's data into the session at the index 'user'.
            // We will check this index on the private members-only page to determine whether
            // or not the user is logged in.  We can also use it to retrieve
            // the user's details.
            $_SESSION['user'] = $row;
            
            // My add: check for an exsiting Profile for the user
            // If Profile exists, add to the Session
            $objProfile     = new Profile;
            $prmProfile     = $objProfile->id_params(NULL, $_SESSION['user']['id']);
            $sqlProfile     = $objProfile->selectAll($_SESSION['user']['id']) . " LIMIT 1";
            $fetchProfile   = $objData->db_read($db, $sqlProfile, $prmProfile, TRUE);
            $rowProfile     = $fetchProfile['result'][0];
            if(!empty($rowProfile))
            {
                $_SESSION['profile'] = $rowProfile;
            }
            
            // Redirect the user to the private members-only page.
            header("Location: welcome.php");
            die("Redirecting to: welcome.php");
        }
        else
        {
            // Tell the user they failed
            print("Login Failed.");
            $status_message .= ("Login Failed.");
            
            // Show them their username again so all they have to do is enter a new
            // password.  The use of htmlentities prevents XSS attacks.  You should
            // always use htmlentities on user submitted values before displaying them
            // to any users (including the user that submitted them).  For more information:
            // http://en.wikipedia.org/wiki/XSS_attack
            $submitted_username = htmlentities($_POST['login_password'], ENT_QUOTES, 'UTF-8');
        }
        if(!empty($status_message))
        {                    
            $objStatus->setMessage($status_message);
            $objStatus->setClass("status_error");
        }
    } 
    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require ('_login.php');
    require_once ($page['path'].'_views/footer.php');