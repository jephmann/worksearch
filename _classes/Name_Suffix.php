<?php
/**
 * Description of Salutation
 *
 * @author Jeffrey
 */
class Name_Suffix extends Data {
    
    // Salutation Properties
    public $abrv    = NULL;
    public $name    = NULL;
    
    // Data Properties
    public $table       = "name_suffixes";
    protected $fields   = array(
        'abrv',
        'name',
    );
        
    // Salutation get/set Methods
    public function getAbrv() {
        return $this->abrv;
    }
    public function setAbrv($abrv) {
        $this->abrv = $abrv;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }   
    
    // Salutation Query Methods    
    public function parameters($id)
    {        
        $parameters = array(
            ':abrv'     => $this->abrv,
            ':name'     => $this->name,
            );
        if(!empty($id))
        {
            $parameters[':id'] = $id;
        }
        return $parameters;
    }
}