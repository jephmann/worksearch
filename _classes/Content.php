<?php
/**
 * Description of Content
 *
 * @author Jeffrey
 */
class Content extends Data {
    
    // User properties*
    public $sequence            = NULL;
    public $name                = NULL;
    public $definition          = NULL;
    public $flag_user           = NULL;
    public $flag_profile        = NULL;
    public $flag_maintenance    = NULL;
    
    // Data Properties
    public $table       = "contents";
    protected $fields   = array(
        'sequence',
        'name',
        'definition',
        'flag_user',
        'flag_profile',
        'flag_maintenance',
        'remarks',
    );
    
    public function getSequence() {
        return $this->sequence;
    }

    public function getName() {
        return $this->name;
    }

    public function getDefinition() {
        return $this->definition;
    }

    public function setSequence($sequence) {
        $this->sequence = $sequence;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDefinition($definition) {
        $this->definition = $definition;
    }
    
    public function getFlag_user() {
        return $this->flag_user;
    }

    public function getFlag_profile() {
        return $this->flag_profile;
    }

    public function getFlag_maintenance() {
        return $this->flag_maintenance;
    }

    public function setFlag_user($flag_user) {
        $this->flag_user = $flag_user;
    }

    public function setFlag_profile($flag_profile) {
        $this->flag_profile = $flag_profile;
    }

    public function setFlag_maintenance($flag_maintenance) {
        $this->flag_maintenance = $flag_maintenance;
    }

            
    // Content Query Methods    
    public function parameters($id)
    {
        $parameters = array(
            ':sequence'         => $this->sequence,
            ':name'             => $this->name,
            ':definition'       => $this->definition,
            ':remarks'          => $this->remarks,
            ':flag_user'        => $this->flag_user,
            ':flag_profile'     => $this->flag_profile,
            ':flag_maintenance' => $this->flag_maintenance,
            );
        if(!empty($id))
        {
            $parameters[':id'] = $id;
        }
        return $parameters;
    }
    
    public function directory()
    {
        $directory = NULL;
        if(!empty($this->name))
        {
            $directory = str_replace(' ', '_', strtolower($this->name));
        }        
        return $directory;
    }


    
    
}
