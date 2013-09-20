<?php
/**
 * Description of Salutation
 *
 * @author Jeffrey
 */
class Salutation extends Data {
    
    // Salutation Properties
    public $gender  = "N";
    public $abrv    = NULL;
    public $name    = NULL;
    
    // Data Properties
    public $table       = "salutations";
    protected $fields   = array(
        'gender',
        'abrv',
        'name',
    );
        
    // Salutation get/set Methods
    public function getGender() {
        return $this->gender;
    }
    public function setGender($gender) {
        $this->gender = $gender;
    }

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
            ':gender'   => $this->gender,
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