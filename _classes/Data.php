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
        
    // Data helper methods: CRUD (These return SQL statements)
    public function selectAll()
    {
        $table  = $this->table;
        $fields = implode(',', $this->fields);
        $query  = "SELECT id, {$fields} FROM {$table}";
        return $query;
    }
    public function select($id)
    {
        $table  = $this->table;
        $fields = implode(',', $this->fields);
        $query  = "SELECT {$fields} FROM {$table} WHERE id = {$id} LIMIT 1";
        /*
         * 2013.09.08 TODO:
         * - Consider parameterizing "WHERE", a la "update()" and "delete()",
         *      thus making "select($id)" into "select()" instead.
         */
        return $query;
    }
    public function update()
    {
        $arrayFieldvalues   = array();    
        $f                  = count($this->fields);
        for ($i=0; $i<$f; $i++)
        {
            $arrayFieldvalues[$i] = "{$this->fields[$i]} = :{$this->fields[$i]}";
        }
        $field_value        = implode(',', $arrayFieldvalues);
        $query              = "UPDATE {$this->table} SET {$field_value} WHERE id = :id";
        return $query;
    }
    public function insert()
    {
        $arrayValues    = array();    
        $f              = count($this->fields);    
        for ($i=0; $i<$f; $i++)
        {
            $arrayValues[$i] = ":{$this->fields[$i]}";
        }
        $fields         = implode(',', $this->fields);
        $values         = implode(',', $arrayValues);
        $query          = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values})";
        return $query;
    }
    
    public function delete()
    {
        $query  = "DELETE FROM {$this->table} WHERE id = :id";
        return $query;
    }
}