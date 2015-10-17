<?php
/**
 * Description of Log
 *
 * @author Jeffrey
 */
class Log extends Data {
    
    /*
     *  Properties
     */
    
    public $contact_date        = NULL;                         // * "Contact Date"
    public $id_contact          = NULL;                         // * "Person Contacted
    public $id_contact_method   = NULL;                         // * "Method of Contact
    public $id_prospect         = NULL;                         // * "Name and Address of Contact"
    public $id_user             = NULL;
    public $results             = NULL;                         // * "Results
    public $specify             = "N/A";
    public $week_ending         = NULL;                         // * "Week Ending"
    public $work                = "Website Design/Development"; // * "Type of Work Sought
    // * from the IDES "work search form".
    
    /* 
     * Properties: Data
     */
    
    protected $table            = "logs";
    protected $fields           = array(
        'remarks',
        'contact_date',
        'id_contact',
        'id_contact_method',
        'id_prospect',
        'id_user',
        'results',
        'specify',
        'week_ending',
        'work',
        );
    
    function __construct($contact_date, $id_contact, $id_contact_method, $id_prospect, $id_user, $results, $specify, $week_ending, $work) {
        $this->contact_date = $contact_date;
        $this->id_contact = $id_contact;
        $this->id_contact_method = $id_contact_method;
        $this->id_prospect = $id_prospect;
        $this->id_user = $id_user;
        $this->results = $results;
        $this->specify = $specify;
        $this->week_ending = $week_ending;
        $this->work = $work;
    }
    
    /*
     *  Methods: get/set
     */
    
    function getContact_date() {
        return $this->contact_date;
    }

    function getId_contact() {
        return $this->id_contact;
    }

    function getId_contact_method() {
        return $this->id_contact_method;
    }

    function getId_prospect() {
        return $this->id_prospect;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getResults() {
        return $this->results;
    }

    function getSpecify() {
        return $this->specify;
    }

    function getWeek_ending() {
        return $this->week_ending;
    }

    function getWork() {
        return $this->work;
    }

    function setContact_date($contact_date) {
        $this->contact_date = $contact_date;
    }

    function setId_contact($id_contact) {
        $this->id_contact = $id_contact;
    }

    function setId_contact_method($id_contact_method) {
        $this->id_contact_method = $id_contact_method;
    }

    function setId_prospect($id_prospect) {
        $this->id_prospect = $id_prospect;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function setResults($results) {
        $this->results = $results;
    }

    function setSpecify($specify) {
        $this->specify = $specify;
    }

    function setWeek_ending($week_ending) {
        $this->week_ending = $week_ending;
    }

    function setWork($work) {
        $this->work = $work;
    }
    
    /*
     * Method: parameterized query    
     */
    
    public function parameters($id)
    {
        $parameters = array(
            ':remarks'              => $this->remarks,
            ':contact_date'         => $this->contact_date,
            ':id_contact'           => $this->id_contact,
            ':id_contact_method'    => $this->id_contact_method,
            ':id_prospect'          => $this->id_prospect,
            ':id_user'              => $this->id_user,
            ':results'              => $this->results,
            ':specify'              => $this->specify,
            ':week_ending'          => $this->week_ending,
            ':work'                 => $this->work,
            );
        if(!empty($id))
        {
            $parameters[':id'] = $id;
        }
        return $parameters;
    }
    
    /*
     * Methods: dates
     */
    
    // Contact Date
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
        return date('l, F d, Y',strtotime($this->contact_date));
    }
    
    // Week Ending Date
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
        return date('l, F d, Y',strtotime($this->week_ending));
    }
    
}