<?php
/**
 * Description of State
 *
 * @author Jeffrey
 */
class State extends Data {
    
    // State Properties
    public $abrv        = NULL;
    public $state       = NULL;
    
    // Data Properties
    protected $table    = "states";
    protected $fields   = array(
        'abrv',
        'state',
    );
        
    // State get/set Methods
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
    
    // State Query Methods    
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