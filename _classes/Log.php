<?php
/**
 * Description of Log
 *
 * @author Jeffrey
 */
class Log extends Data {
    
    // Log Properties
    public $id_user             = NULL;
    public $week_ending         = NULL;                         // * "Week Ending"
    public $contact_date        = NULL;                         // * "Contact Date"
    public $work                = "Website Design/Development"; // * "Type of Work Sought
    public $id_prospect         = NULL;                         // * "Name and Address of Contact"
    public $id_contact          = NULL;                         // * "Person Contacted
    public $id_contact_method   = NULL;                         // * "Method of Contact
    public $specify             = "N/A";
    public $results             = NULL;                         // * "Results
    // * from the IDES "work search form".
    
    // Data Properties
    public $table       = "logs";
    protected $fields   = array(
        'id_user',
        'week_ending',
        'contact_date',
        'work',
        'id_prospect',
        'id_contact',
        'id_contact_method',
        'specify',
        'results',
        'remarks'
        );
        
    // Log get/set Methods
    public function getId_user() {
        return $this->id_user;
    }
    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }    
    
    public function getWeek_ending() {
        return $this->week_ending;
    }
    public function setWeek_ending($week_ending) {
        $this->week_ending = $week_ending;
    }

    public function getContact_date() {
        return $this->contact_date;
    }
    public function setContact_date($contact_date) {
        $this->contact_date = $contact_date;
    }

    public function getId_prospect() {
        return $this->id_prospect;
    }
    public function setId_prospect($id_prospect) {
        $this->id_prospect = $id_prospect;
    }

    public function getId_contact() {
        return $this->id_contact;
    }
    public function setId_contact($id_contact) {
        $this->id_contact = $id_contact;
    }

    public function getId_contact_method() {
        return $this->id_contact_method;
    }
    public function setId_contact_method($id_contact_method) {
        $this->id_contact_method = $id_contact_method;
    }

    public function getSpecify() {
        return $this->specify;
    }
    public function setSpecify($specify) {
        $this->specify = $specify;
    }

    public function getResults() {
        return $this->results;
    }
    public function setResults($results) {
        $this->results = $results;
    }

    public function getWork() {
        return $this->work;
    }
    public function setWork($work) {
        $this->work = $work;
    }    
    
    // Log Query Methods    
    public function parameters($id)
    {
        $parameters = array(
            ':id_user'              => $this->id_user,
            ':week_ending'          => $this->week_ending,
            ':contact_date'         => $this->contact_date,
            ':work'                 => $this->work,
            ':id_prospect'          => $this->id_prospect,
            ':id_contact'           => $this->id_contact,
            ':id_contact_method'    => $this->id_contact_method,
            ':specify'              => $this->specify,
            ':results'              => $this->results,
            ':remarks'              => $this->remarks,
            );
        if(!empty($id))
        {
            $parameters[':id'] = $id;
        }
        return $parameters;
    }
    
    // Contact Date methods
    public function contact_month()
    {
        return date('m', strtotime($this->contact_date));
    }    
    public function contact_day()
    {
        return date('j', strtotime($this->contact_date));
    }    
    public function contact_year()
    {
        return date('Y', strtotime($this->contact_date));
    }    
    public function full_contact_date()
    {
        $full_contact_date = date('l, F d, Y',strtotime($this->contact_date));
        return $full_contact_date;
    }
    
    // Week Ending Date methods
    public function week_ending_month()
    {
        return date('m', strtotime($this->week_ending));
    }    
    public function week_ending_day()
    {
        return date('j', strtotime($this->week_ending));
    }    
    public function week_ending_year()
    {
        return date('Y', strtotime($this->week_ending));
    }    
    public function full_week_ending()
    {
        $full_week_ending = date('l, F d, Y',strtotime($this->week_ending));
        return $full_week_ending;
    }
    
}