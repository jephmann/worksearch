<?php
/**
 * Description of Salutation
 *
 * @author Jeffrey
 */
class Name_Suffix extends Data {
    
    /*
     *  Properties
     */
    
    public $abrv        = NULL;
    public $name        = NULL;
    public $gender      = NULL;
    
    /* 
     * Properties: Data
     */
    
    protected $table    = "name_suffixes";
    protected $fields   = array(
        'abrv',
        'name',
        'gender',
    );
    
    /*
    function __construct($abrv, $name, $gender) {
        $this->abrv = $abrv;
        $this->name = $name;
        $this->gender = $gender;
    } 
     */
    
    /*
     *  Methods: get/set
     */
    
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
    
    function getGender() {
        return $this->gender;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }
    
    /*
     * Method: parameterized query    
     */
    
    public function parameters($id)
    {        
        $parameters = array(
            ':abrv'     => $this->abrv,
            ':name'     => $this->name,
            ':gender'   => $this->gender,
            );
        if(!empty($id))
        {
            $parameters[':id'] = $id;
        }
        return $parameters;
    }
}