<?php
/**
 * Description of Log
 *
 * @author Jeffrey
 */
class Log extends Data {
    
    // Log Properties
    public $week_ending         = NULL;                         // * "Week Ending"
    public $contact_date        = NULL;                         // * "Contact Date"
    public $work                = "Website Design/Development"; // * "Type of Work Sought
    public $id_company          = NULL;                         // * "Name and Address of Contact"
    public $id_contact          = NULL;                         // * "Person Contacted
    public $id_contact_method   = NULL;                         // * "Method of Contact
    public $specify             = "N/A";
    public $results             = NULL;                         // * "Results
    public $remarks             = NULL;
    // * from the IDES "work search form":
    
    // Data Properties
    public $table   = "logs";
    protected $fields  = array(
        'week_ending',
        'contact_date',
        'work',
        'id_company',
        'id_contact',
        'id_contact_method',
        'specify',
        'results',
        'remarks'
        );
        
    // Log get/set Methods
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

    public function getId_company() {
        return $this->id_company;
    }
    public function setId_company($id_company) {
        $this->id_company = $id_company;
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

    public function getRemarks() {
        return $this->remarks;
    }
    public function setRemarks($remarks) {
        $this->remarks = $remarks;
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
            ':week_ending'          => $this->week_ending,
            ':contact_date'         => $this->contact_date,
            ':work'                 => $this->work,
            ':id_company'           => $this->id_company,
            ':id_contact'           => $this->id_contact,
            ':id_contact_method'    => $this->id_contact_method,
            ':specify'              => $this->specify,
            ':results'              => $this->results,
            ':remarks'              => $this->remarks,
            );
        if(!empty($id))
        {
            $parameters['id'] = $id;
        }
        return $parameters;
    }
    
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
    
}