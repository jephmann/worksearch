<?php
/**
 * Description of Data
 *
 * @author Jeffrey
 */
class Data {
    
    // Data Properties
    public $id          = NULL;
    public $table       = NULL;
    protected $fields   = array();
    
    // Data get/set Methods
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
        
    /*
     * Data helper methods: CRUD (These return SQL statements)
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
}