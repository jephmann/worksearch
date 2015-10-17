<?php
/**
 * Description of State
 *
 * @author Jeffrey
 */
class State extends Data {
    
    /*
     *  Properties
     */
    
    public $abrv        = NULL;
    public $state       = NULL;
    
    /* 
     * Properties: Data
     */
    
    protected $table    = "states";
    protected $fields   = array(
        'abrv',
        'state',
    );
    
    function __construct($abrv, $state) {
        $this->abrv = $abrv;
        $this->state = $state;
    }
    
    /*
     *  Methods: get/set
     */
    
    public function getAbrv() {
        return $this->abrv;
    }
    public function setAbrv($abrv) {
        $this->abrv = $abrv;
    }

    public function getState() {
        return $this->state;
    }
    public function setState($state) {
        $this->state = $state;
    }  
    
    /*
     * Method: parameterized query    
     */
    
    public function parameters($id)
    {        
        $parameters = array(
            ':abrv'     => $this->abrv,
            ':state'    => $this->state,
            );
        if(!empty($id))
        {
            $parameters[':id'] = $id;
        }
        return $parameters;
    }
}