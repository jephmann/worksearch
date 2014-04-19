<?php
/**
 * Description of Person
 *
 * @author Jeffrey
 */
class Person extends Data {
    
    // Person Properties
    public $gender          = NULL;
    public $id_salutation   = NULL;
    public $id_name_suffix  = NULL;
    public $name_first      = NULL;
    public $name_middle     = NULL;
    public $name_last       = NULL;
    public $name_suffix     = NULL;
    public $date_birth      = NULL;
        
    // Person get/set Methods

    public function getGender() {
        return $this->gender;
    }
    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getId_salutation() {
        return $this->id_salutation;
    }
    public function setId_salutation($id_salutation) {
        $this->id_salutation = $id_salutation;
    }
    
    public function getId_name_suffix() {
        return $this->id_name_suffix;
    }
    public function setId_name_suffix($id_name_suffix) {
        $this->id_name_suffix = $id_name_suffix;
    }
    
    public function getName_first() {
        return $this->name_first;
    }
    public function setName_first($name_first) {
        $this->name_first = $name_first;
    }

    public function getName_middle() {
        return $this->name_middle;
    }
    public function setName_middle($name_middle) {
        $this->name_middle = $name_middle;
    }

    public function getName_last() {
        return $this->name_last;
    }
    public function setName_last($name_last) {
        $this->name_last = $name_last;
    }

    public function getName_suffix() {
        return $this->name_suffix;
    }
    public function setName_suffix($name_suffix) {
        $this->name_suffix = $name_suffix;
    }
    
    public function getDate_birth() {
        return $this->date_birth;
    }
    public function setDate_birth($date_birth) {
        $this->date_birth = $date_birth;
    }
    
    // Helper Methods (because I don't know what else to call them)
    public function name_full()
    {
        $name_full = $this->name_last;
        if(!empty($this->name_middle))
        {
            $name_full = $this->name_middle.' '.$name_full;            
        }
        if(!empty($this->name_first))
        {
            $name_full = $this->name_first.' '.$name_full;            
        }
        if(!empty($this->name_suffix))
        {
            $name_full .= ' '.$this->name_suffix;
        }
        return $name_full;
    }    

    public function birth_year()
    {        
        $birth_year = date('Y',strtotime($this->date_birth));
        return $birth_year;
    }    
    public function birth_month()
    {
        $birth_month = date('m',strtotime($this->date_birth));        
        return $birth_month;
    }    
    public function birth_day()
    {
        $birth_day = date('j',strtotime($this->date_birth));        
        return $birth_day;
    }    
    public function full_birth_date()
    {
        $full_birth_date = date('l, F d, Y',strtotime($this->date_birth));
        return $full_birth_date;
    }
    
}