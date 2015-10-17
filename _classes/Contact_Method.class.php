<?php
/**
 * Description of Contact_Method
 *
 * @author Jeffrey
 */
class Contact_Method extends Data {
    
    // Contact_Method Properties
    public $name        = NULL;
    
    // Data Properties
    public $table       = "contact_methods";
    protected $fields   = array(
        'name',
    );
        
    // Contact_Method get/set Methods
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name     = $name;
    } 
    
    // Contact_Method Query Methods    
    public function parameters($id)
    {        
        $parameters     = array(
            ':name'     => $this->name,
            );
        if(!empty($id))
        {
            $parameters[':id'] = $id;
        }
        return $parameters;
    }  
}