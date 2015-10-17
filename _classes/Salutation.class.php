<?php
/**
 * Description of Salutation
 *
 * @author Jeffrey
 */
class Salutation extends Data {
    
    /*
     *  Properties
     */
    
    public $gender      = "N";
    public $abrv        = NULL;
    public $name        = NULL;
    
    /* 
     * Properties: Data
     */
    
    protected $table    = "salutations";
    protected $fields   = array(
        'gender',
        'abrv',
        'name',
    );
    
    function __construct($gender, $abrv, $name) {
        $this->gender = $gender;
        $this->abrv = $abrv;
        $this->name = $name;
    }
    
    /*
     *  Methods: get/set
     */
    
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
    
    /*
     * Method: parameterized query    
     */
    
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