<?php
/**
 * Description of Prospect
 *
 * @author Jeffrey
 */
class Prospect extends Data implements iAddress, iLink {
    
    /*
     * Properties
     */
    
    // remarks                  Data
    public $address_building    = NULL;
    public $address_city        = "Chicago";
    public $address_state       = "IL";
    public $address_street      = NULL;
    public $address_unit        = NULL;
    public $address_zip4        = NULL;
    public $address_zip5        = NULL;
    public $branch              = NULL;
    public $description         = NULL;
    public $email               = NULL;
    public $facebook            = NULL;
    public $fax                 = NULL;
    public $googleplus          = NULL;
    public $id_user             = NULL;
    public $industry            = NULL;
    public $linkedin            = NULL;
    public $name                = NULL;
    public $phone               = NULL;
    public $phone_extension     = NULL;
    public $recruiter           = FALSE;
    public $twitter             = NULL;
    public $website             = NULL;
    public $contact             = FALSE; // not a db field; if yes, next step is Contact form; if no, next step is Prospect index.
    
    /* 
     * Properties: Data
     */
    
    protected $table            = "prospects";
    protected $fields           = array(
        'remarks',
        'address_building',
        'address_city',
        'address_state',
        'address_street',
        'address_unit',
        'address_zip4',
        'address_zip5',
        'branch',
        'description',
        'email',
        'facebook',
        'fax',
        'googleplus',
        'id_user',
        'industry',
        'linkedin',
        'name',
        'phone',
        'phone_extension',
        'recruiter',
        'twitter',
        'website',
        );
    
    function __construct($address_building, $address_city, $address_state, $address_street, $address_unit, $address_zip4, $address_zip5, $branch, $description, $email, $facebook, $fax, $googleplus, $id_user, $industry, $linkedin, $name, $phone, $phone_extension, $recruiter, $twitter, $website, $contact) {
        $this->address_building = $address_building;
        $this->address_city = $address_city;
        $this->address_state = $address_state;
        $this->address_street = $address_street;
        $this->address_unit = $address_unit;
        $this->address_zip4 = $address_zip4;
        $this->address_zip5 = $address_zip5;
        $this->branch = $branch;
        $this->description = $description;
        $this->email = $email;
        $this->facebook = $facebook;
        $this->fax = $fax;
        $this->googleplus = $googleplus;
        $this->id_user = $id_user;
        $this->industry = $industry;
        $this->linkedin = $linkedin;
        $this->name = $name;
        $this->phone = $phone;
        $this->phone_extension = $phone_extension;
        $this->recruiter = $recruiter;
        $this->twitter = $twitter;
        $this->website = $website;
        $this->contact = $contact;
    }      
        
    /*
     *  Methods: get/set
     */
    
    function getAddress_building() {
        return $this->address_building;
    }

    function getAddress_city() {
        return $this->address_city;
    }

    function getAddress_state() {
        return $this->address_state;
    }

    function getAddress_street() {
        return $this->address_street;
    }

    function getAddress_unit() {
        return $this->address_unit;
    }

    function getAddress_zip4() {
        return $this->address_zip4;
    }

    function getAddress_zip5() {
        return $this->address_zip5;
    }

    function getBranch() {
        return $this->branch;
    }

    function getDescription() {
        return $this->description;
    }

    function getEmail() {
        return $this->email;
    }

    function getFacebook() {
        return $this->facebook;
    }

    function getFax() {
        return $this->fax;
    }

    function getGoogleplus() {
        return $this->googleplus;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getIndustry() {
        return $this->industry;
    }

    function getLinkedin() {
        return $this->linkedin;
    }

    function getName() {
        return $this->name;
    }

    function getPhone() {
        return $this->phone;
    }

    function getPhone_extension() {
        return $this->phone_extension;
    }

    function getRecruiter() {
        return $this->recruiter;
    }

    function getTwitter() {
        return $this->twitter;
    }

    function getWebsite() {
        return $this->website;
    }

    function getContact() {
        return $this->contact;
    }

    function setAddress_building($address_building) {
        $this->address_building = $address_building;
    }

    function setAddress_city($address_city) {
        $this->address_city = $address_city;
    }

    function setAddress_state($address_state) {
        $this->address_state = $address_state;
    }

    function setAddress_street($address_street) {
        $this->address_street = $address_street;
    }

    function setAddress_unit($address_unit) {
        $this->address_unit = $address_unit;
    }

    function setAddress_zip4($address_zip4) {
        $this->address_zip4 = $address_zip4;
    }

    function setAddress_zip5($address_zip5) {
        $this->address_zip5 = $address_zip5;
    }

    function setBranch($branch) {
        $this->branch = $branch;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    function setFax($fax) {
        $this->fax = $fax;
    }

    function setGoogleplus($googleplus) {
        $this->googleplus = $googleplus;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function setIndustry($industry) {
        $this->industry = $industry;
    }

    function setLinkedin($linkedin) {
        $this->linkedin = $linkedin;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setPhone_extension($phone_extension) {
        $this->phone_extension = $phone_extension;
    }

    function setRecruiter($recruiter) {
        $this->recruiter = $recruiter;
    }

    function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    function setWebsite($website) {
        $this->website = $website;
    }

    function setContact($contact) {
        $this->contact = $contact;
    }
    
    /*
     * Method: parameterized query    
     */
    
    public function parameters($id)
    {
        $parameters = array(
            ':remarks'          => $this->remarks,
            ':address_building' => $this->address_building,
            ':address_city'     => $this->address_city,
            ':address_state'    => $this->address_state,
            ':address_street'   => $this->address_street,
            ':address_unit'     => $this->address_unit,
            ':address_zip4'     => $this->address_zip4,
            ':address_zip5'     => $this->address_zip5,
            ':branch'           => $this->branch,
            ':description'      => $this->description,
            ':email'            => $this->email,
            ':facebook'         => $this->facebook,
            ':fax'              => $this->fax,
            ':googleplus'       => $this->googleplus,
            ':id_user'          => $this->id_user,
            ':industry'         => $this->industry,
            ':linkedin'         => $this->linkedin,
            ':name'             => $this->name,
            ':phone'            => $this->phone,
            ':phone_extension'  => $this->phone_extension,
            ':recruiter'        => $this->recruiter,
            ':twitter'          => $this->twitter,
            ':website'          => $this->website,
            );
        if(!empty($id))
        {
            $parameters[':id'] = $id;
        }
        return $parameters;
    }
    
    /*
     * Methods: helpers
     */
        
    public function full_phone()
    {
        $output     = NULL;
        $phone      = $this->phone;
        $extension  = $this->phone_extension;
        if(!empty($phone))
        {
            $area       = substr($phone, 0, 3);
            $prefix     = substr($phone, 3, 3);
            $suffix     = substr($phone, 6, 4);
            $output     = "({$area}) {$prefix}-{$suffix}";
            if(!empty($extension))
            {
                $output .= ' x'.$extension;
            }
        }
        return $output;
    }
    
    public function full_fax()
    {
        $output     = NULL;
        $fax        = $this->fax;
        if(!empty($fax))
        {
            $area       = substr($fax, 0, 3);
            $prefix     = substr($fax, 3, 3);
            $suffix     = substr($fax, 6, 4);
            $output   = "({$area}) {$prefix}-{$suffix}";
        }
        return $output;
    }
    
    public function full_zip()
    {        
        $output     = NULL;
        $zip5       = $this->address_zip5;
        $zip4       = $this->address_zip4;
        if(!empty($zip5))
        {
            $output = $zip5;
            if(!empty($zip4))
            {
                $output .= '-'.$zip4;
            }
        }
        return $output;
    }
    
    public function link_email()
    {
        $output = NULL;
        $email  = $this->email;
        $name   = $this->name_full();
        if(!empty($email))
        {
            $a_title    = "title=\"E-Mail for {$name}\"";
            $a_href     = "href=\"mailto:{$email}\"";
            $output     = "<a {$a_title} {$a_href}>{$email}</a>";
        }
        return $output;
    }
    
}