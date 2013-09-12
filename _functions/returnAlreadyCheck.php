<?php
    function returnAlreadyCheck($field, $value, $db_table, $db)
    {
        /*
         * 2013.09.10 TODO:
         * Now that I decided that more than one user can use this application
         * (originally it was to be just one user; originally I was to be the only user),
         * $query must be readapted to include $id_user.
         * Before, this function was to ensure that something was unique in a table.
         * Ideally, now it must ensure that something was unique per $id_user in a table
         */
        $boolean    = FALSE;
        $query      = "SELECT 1 FROM {$db_table} WHERE {$field} = :{$field}";
        $param      = array(':'.$field => $value);
        try
        {
            $stmt   = $db->prepare($query);
            $result = $stmt->execute($param);
        }
        catch(PDOException $ex)
        {
            die("Failed to run query on {$db_table}.{$field}: " . $ex->getMessage());
        }
        $row        = $stmt->fetch();
        if($row)
        {
            $boolean = TRUE;
        }
        return $boolean;
        
        //  A SELECT query is used to retrieve data from the database.
        // :fieldname is a special token, we will substitute a real value in its place when
        // we execute the query.
        
        // This contains the definitions for any special tokens that we place in
        // our SQL query.  In this case, we are defining a value for the token
        // :username.  It is possible to insert $_POST['fieldname'] directly into
        // your $query string; however doing so is very insecure and opens your
        // code up to SQL injection exploits.  Using tokens prevents this.
        // For more information on SQL injections, see Wikipedia:
        // http://en.wikipedia.org/wiki/SQL_Injection
        
        // These two statements run the query against your database table.
        
        // Note: On a production website, you should not output $ex->getMessage().
        // It may provide an attacker with helpful information about your code.
        
        // The fetch() method returns an array representing the "next" row from
        // the selected results, or false if there are no more rows to fetch.
        
        // If a row was returned, then we know a matching username was found in
        // the database already and we should not allow the user to continue.
        
        /*
         * The above awkwardly named function is based on two queries from register php in the tutorial
         * http://forums.devshed.com/php-faqs-and-stickies-167/how-to-program-a-basic-but-secure-login-system-using-891201.html
         * which is also the source of these notes.         * 
         */
    }