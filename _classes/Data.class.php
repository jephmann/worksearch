<?php
/**
 * Description of Data
 *
 * @author Jeffrey
 */
class Data implements iData {
    
    // Data Properties
    public $id          = NULL;
    public $remarks     = NULL;
    protected $table    = NULL;
    protected $fields   = array();
    
    // Data get/set Methods
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getRemarks() {
        return $this->remarks;
    }
    public function setRemarks($remarks) {
        $this->remarks = $remarks;
    }
            
    /*
     * SQL helper methods:
     * These return SQL statements per the child objects which inherit them.
     */
    
    // CREATE
    public function insert()
    {
        $arrayValues                = array();    
        $f                          = count($this->fields);    
        for ($i=0; $i<$f; $i++)
        {
            $arrayValues[$i]        = ":{$this->fields[$i]}";
        }
        $fields                     = implode(',', $this->fields);
        $values                     = implode(',', $arrayValues);
        $query                      = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values})";
        return $query;
    }
    
    // READ (all)    
    public function selectAll($id_user)
    {
        $table                      = $this->table;
        $fields                     = implode(',', $this->fields);
        $query                      = "SELECT id, {$fields} FROM {$table}";
        if(!empty($id_user))
        {
            $query                  .= " WHERE id_user = :id_user";
        }
        return $query;
    }
    
    // READ (one)
    public function select($id_user)
    {
        $table                      = $this->table;
        $fields                     = implode(',', $this->fields);
        $query                      = "SELECT {$fields} FROM {$table} WHERE id = :id";
        if(!empty($id_user))
        {
            $query                  .= " AND id_user = :id_user";
        }
        $query                      .= " LIMIT 1";
        return $query;
    }
    
    // UPDATE
    public function update($id_user)
    {
        $arrayFieldvalues           = array();    
        $f                          = count($this->fields);
        for ($i=0; $i<$f; $i++)
        {
            $arrayFieldvalues[$i]   = "{$this->fields[$i]} = :{$this->fields[$i]}";
        }
        $field_value                = implode(',', $arrayFieldvalues);
        $query                      = "UPDATE {$this->table} SET {$field_value} WHERE id = :id";
        if(!empty($id_user))
        {
            $query                  .= " AND id_user = :id_user";
        }
        return $query;
    }
    
    // DELETE
    public function delete($id_user)
    {
        $query                      = "DELETE FROM {$this->table} WHERE id = :id";
        if(!empty($id_user))
        {
            $query                  .= " AND id_user = :id_user";
        }
        return $query;
    }
    
    // Parameter Array (IDs only)
    public function id_params($id, $id_user)
    {
        $parameters = array();
        if(!empty($id))
        {
            $parameters[':id'] = $id;
        }
        if(!empty($id_user))
        {
            $parameters[':id_user'] = $id_user;
        }
        return $parameters;
    }
    
    // Options for dropdownlists and radiobuttonlists
    public function options($value, $display)
    {
        /*
         * $value might not always be id;
         * e.g. sometimes $value may be a state abbreviation
         */
        $query = "SELECT {$value}, {$display} FROM {$this->table} ORDER BY {$display}";
        return $query;
    }
    
    // Options which display two fields on a dropdownlist
    public function options_concat($value, $concatFields, $display, $sortFields)
    {        
        $query = "SELECT {$value}, CONCAT({$concatFields}) AS {$display} FROM {$this->table} ORDER BY {$sortFields}";
        return $query;
    }
    
    /*
     * Common SQL helper(s)
     */
    
    // sort [formerly return_sort]
    final public function sort($get, $orderby, $dir, $field)
    {
        $sort = " ORDER BY ";
        if ($get == true)
        {
            $sort .= "{$orderby} {$dir}";
        }
        else
        {
            $sort .= "{$field} ASC";
        }        
        return $sort;
    }
    
    /*
     * Database helper functions:
     * These connect via PDO to the database and execute the SQL statements.
     */
    
    // create [formerly insertRow}
    final public function db_create($db, $obj)
    {
        try
        {
            $stmt   = $db->prepare($obj->insert());
            $stmt->execute($obj->parameters(NULL));
            $id     = $db->lastInsertId();
            $error  = NULL;
        }
        catch(PDOException $ex)
        {
            $id     = NULL;
            $error  = $ex->getMessage();
        }
        
        $output     = array(
            'id'    => $id,
            'error' => $error,
            );
        return $output;
    }
        
    // read  [formerly read]      
    final public function db_read($db, $sql, $parameters, $all)
    {
        try
        {
            $stmt   = $db->prepare($sql);
            $stmt->execute($parameters);
            $error  = NULL;
        }
        catch(PDOException $ex)
        {
            $error  = ("Failed to run query: " . $ex->getMessage());
            $error  .= ("<br />{$sql}");
        }
        if($all == TRUE)
        {
            $result = $stmt->fetchAll();
        }
        else
        {
            $result = $stmt->fetch();
        }
        
        $output         = array(
            'result'    => $result,
            'error'     => $error,
        );
        return $output;
    }
    
    // update [formerly updateRow]    
    final public function db_update($db, $obj)
    {
        try
        {
            $stmt   = $db->prepare($obj->update());
            $stmt->execute($obj->parameters($obj->id));
            $error  = NULL;            
        }
        catch(PDOException $ex)
        {
            $error  = $ex->getMessage();
        }
        
        $output     = array(
            'error' => $error,
        );
        return $output;
    }
    
    // delete [formerly delete]   
    final public function db_delete($db, $obj, $id_found)
    {
        if($id_found == TRUE)
        {
            try
            {
                $stmt   = $db->prepare($obj->delete());
                $stmt->bindParam(':id', $obj->id);
                $stmt->execute();
                $error  = NULL;
            }
            catch(PDOException $ex)
            {
                $error  = 'DELETE Error: ' . $ex->getMessage();
            }
        }
        $output     = array(
            'error' => $error,
        );
        return $output;
    }
    
    /*
     * Special common query executions
     */
    
    // id_exists
    final public function id_exists($db, $objTable)
    {
        $boolean    = FALSE;
        $query      = "SELECT 1 FROM {$objTable->table} WHERE id = :id";
        $param      = array(':id' => $objTable->id);
        try
        {
            $stmt   = $db->prepare($query);
            $stmt->execute($param);
        }
        catch(PDOException $ex)
        {
            die("Failed to run query on {$objTable->table}.id: " . $ex->getMessage());
        }
        $row        = $stmt->fetch();
        if($row)
        {
            $boolean = TRUE;
        }
        return $boolean;
    }
    
    // record exists
    final public function record_exists($db, $field, $value, $db_table)
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
}