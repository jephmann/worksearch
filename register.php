<?php    
    $page = array(
        'title'     => "Session",
        'subtitle'  => " > Register",
        'path'      => NULL,
        'mode'      => "Register",
    );
    require ($page['path'].'_include/first.php');
    // user_session redirect unnecessary here
    require ($page['path'].'_classes/all.php');
    require ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    // =========================================================================
    
    // JH's touch: the User class
    $objUser = new User;
    $objUser->setUsername(NULL);
    $objUser->setPassword(NULL);
    $objUser->setSalt(NULL);
    $objUser->setEmail(NULL);
    
    // This if statement checks to determine whether the registration form has been submitted
    // If it has, then the registration code is run, otherwise the form is displayed
    if(!empty($_POST))
    {
        /*
         * BEGIN JH's SERVER-SIDE FORM VALIDATION
         * The next 3 if() clauses and next 2 database queries,
         * revised from the tutorial,
         * inspire JH's D*R*Y server-side form validation structure
         * for this project.
         * This would be a shared "include/require" file
         * in each entity's Create and Update form pages.
         * Said structure replaces the tutorial's "die" logic for error messages
         * with JH's Status class.
         * JH would create a single function based on the repeated db queries.
         */
        $status_message = NULL;
        
        // Ensure that the user has entered a non-empty username
        if(empty($_POST['user_username']))
        {
            $status_message .= ("<li>Please enter a username.</li>");
        }
        
        // Ensure that the user has entered a non-empty password
        if(empty($_POST['user_password']))
        {
            $status_message .= ("<li>Please enter a password.</li>");
        }
        
        // Make sure the user entered a valid E-Mail address
        // filter_var is a useful PHP function for validating form input, see:
        // http://us.php.net/manual/en/function.filter-var.php
        // http://us.php.net/manual/en/filter.filters.php
        if(!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL))
        {
            $status_message .= ("<li>Invalid E-Mail Address.</li>");
        }
        
        // We will use this SQL query to see whether the username entered by the
        // user is already in use.
        $check_username = returnAlreadyCheck('username', $_POST['user_username'], 'users', $db);
        if($check_username == TRUE)
        {
            $status_message .= ("<li>This username is already in use.</li>");
        }
        
        // Now we perform the same type of check for the email address, in order
        // to ensure that it is unique.        
        $check_email = returnAlreadyCheck('email', $_POST['user_email'], 'users', $db);
        if($check_email == TRUE)
        {
            $status_message .= ("<li>This email address is already registered.</li>");
        }
        
        if(!empty($status_message))
        {            
            $objStatus->setMessage($status_message);
            $objStatus->setColor("FF0000");
            $objStatus->setBackground_color("FFFF00");
        }
        /*
         * END JH's SERVER-SIDE FORM VALIDATION
         */
        
        // An INSERT query is used to add new rows to a database table.
        // Again, we are using special tokens (technically called parameters) to
        // protect against SQL injection attacks.
        
        // A salt is randomly generated here to protect again brute force attacks
        // and rainbow table attacks.  The following statement generates a hex
        // representation of an 8 byte salt.  Representing this in hex provides
        // no additional security, but makes it easier for humans to read.
        // For more information:
        // http://en.wikipedia.org/wiki/Salt_%28cryptography%29
        // http://en.wikipedia.org/wiki/Brute-force_attack
        // http://en.wikipedia.org/wiki/Rainbow_table
        
        // This hashes the password with the salt so that it can be stored securely
        // in your database.  The output of this next statement is a 64 byte hex
        // string representing the 32 byte sha256 hash of the password.  The original
        // password cannot be recovered from the hash.  For more information:
        // http://en.wikipedia.org/wiki/Cryptographic_hash_function
        
        // Next we hash the hash value 65536 more times.  The purpose of this is to
        // protect against brute force attacks.  Now an attacker must compute the hash 65537
        // times for each guess they make against a password, whereas if the password
        // were hashed only once the attacker would have been able to make 65537 different 
        // guesses in the same amount of time instead of only one.
        
        // Here we prepare our tokens for insertion into the SQL query.  We do not
        // store the original password; only the hashed version of it.  We do store
        // the salt (in its plaintext form; this is not a security risk).
        
        // Execute the query to create the user
        // Note: On a production website, you should not output $ex->getMessage().
        // It may provide an attacker with helpful information about your code.
        
        
        $username   = $_POST['user_username'];
        $salt       = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password   = hash('sha256', $_POST['user_password'] . $salt);
        for($round = 0; $round < 65536; $round++)
        {
            $password = hash('sha256', $password . $salt);
        }
        $email      = $_POST['user_email'];
        
        // JH's touch: the User class
        $objUser->setUsername($username);
        $objUser->setPassword($password);
        $objUser->setSalt($salt);
        $objUser->setEmail($email);
        
        // JH's touch: don't even try to query db unless status message is null
        if(empty($objStatus->message))
        {        
            // JH's function which calls the User class's insert() method
            $insert = insertRow($db, $objUser);
            if(!empty($insert['error']))
            {
                $objStatus->setMessage("<li>Failed to Create Log: {$insert['error']}</li>");
                $objStatus->setColor("FF0000");
                $objStatus->setBackground_color("FFFF00");
            }
            else
            {
                header('Location:login.php');
                // Calling die or exit after performing a redirect using the header function
                // is critical.  The rest of your PHP script will continue to execute and
                // will be sent to the user if you do not die or exit.
                die("Redirecting to login.php");
            }
        }
    }
    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require ('_register.php');
    require_once ($page['path'].'_views/footer.php');
?>