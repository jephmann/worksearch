<?php
/**
 * Description of Prospect
 *
 * @author Jeffrey
 */
class Prospect extends Data {
    
    // Prospect Properties
    public $id_user             = NULL;
    public $name                = NULL;
    public $branch              = NULL;
    public $address_building    = NULL;
    public $address_street      = NULL;
    public $address_unit        = NULL;
    public $address_city        = "Chicago";
    public $address_state       = "IL";
    public $address_zip5        = NULL;
    public $address_zip4        = NULL;
    public $phone               = NULL;
    public $phone_extension     = NULL;
    public $fax                 = NULL;
    public $email               = NULL;
    public $website             = NULL;
    public $linkedin            = NULL;
    public $twitter             = NULL;
    public $facebook            = NULL;
    public $googleplus          = NULL;
    public $industry            = NULL;
    public $recruiter           = FALSE;
    public $description         = NULL;
    public $contact             = FALSE; // not a db field; if yes, next step is Contact form; if no, next step is Prospect index.
    
    // Data Properties
    protected $table            = "prospects";
    protected $fields           = array(
        'id_user',
        'name',
        'branch',
        'address_building',
        'address_street',
        'address_unit',
        'address_city',
        'address_state',
        'address_zip5',
        'address_zip4',
        'phone',
        'phone_extension',
        'fax',
        'email',
        'website',
        'description',
        'linkedin',
        'twitter',
        'facebook',
        'googleplus',
        'industry',
        'recruiter',
        'remarks'
        );
        
    // Prospect get/set Methods
    public function getId_user() {
        return $this->id_user;
    }
    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }    
    
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getBranch() {
        return $this->branch;
    }

    public function setBranch($branch) {
        $this->branch = $branch;
    }
    
    public function getAddress_building() {
        return $this->address_building;
    }
    public function setAddress_building($address_building) {
        $this->address_building = $address_building;
    }
    
    public function getAddress_street() {
        return $this->address_street;
    }
    public function setAddress_street($address_street) {
        $this->address_street = $address_street;
    }

    public function getAddress_unit() {
        return $this->address_unit;
    }
    public function setAddress_unit($address_unit) {
        $this->address_unit = $address_unit;
    }

    public function getAddress_city() {
        return $this->address_city;
    }
    public function setAddress_city($address_city) {
        $this->address_city = $address_city;
    }

    public function getAddress_state() {
        return $this->address_state;
    }
    public function setAddress_state($address_state) {
        $this->address_state = $address_state;
    }

    public function getAddress_zip5() {
        return $this->address_zip5;
    }
    public function setAddress_zip5($address_zip5) {
        $this->address_zip5 = $address_zip5;
    }

    public function getAddress_zip4() {
        return $this->address_zip4;
    }
    public function setAddress_zip4($address_zip4) {
        $this->address_zip4 = $address_zip4;
    }
    
    public function getPhone() {
        return $this->phone;
    }
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPhone_extension() {
        return $this->phone_extension;
    }
    public function setPhone_extension($phone_extension) {
        $this->phone_extension = $phone_extension;
    }

    public function getFax() {
        return $this->fax;
    }
    public function setFax($fax) {
        $this->fax = $fax;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getWebsite() {
        return $this->website;
    }
    public function setWebsite($website) {
        $this->website = $website;
    }
    
    public function getLinkedin() {
        return $this->linkedin;
    }
    public function setLinkedin($linkedin) {
        $this->linkedin = $linkedin;
    }
    
    public function getTwitter() {
        return $this->twitter;
    }
    public function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    public function getFacebook() {
        return $this->facebook;
    }
    public function setFacebook($facebook) {
        $this->facebook = $facebook;
    }
    
    public function getGoogleplus() {
        return $this->googleplus;
    }
    public function setGoogleplus($googleplus) {
        $this->googleplus = $googleplus;
    }
    
    public function getIndustry() {
        return $this->industry;
    }
    public function setIndustry($industry) {
        $this->industry = $industry;
    }

    public function getRecruiter() {
        return $this->recruiter;
    }
    public function setRecruiter($recruiter) {
        $this->recruiter = $recruiter;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getContact() {
        return $this->contact;
    }
    public function setContact($contact) {
        $this->contact = $contact;
    }
        
    // Prospect Query Methods    
    public function parameters($id)
    {
        $parameters = array(
            ':id_user'          => $this->id_user,
            ':name'             => $this->name,
            ':branch'           => $this->branch,
            ':address_building' => $this->address_building,
            ':address_street'   => $this->address_street,
            ':address_unit'     => $this->address_unit,
            ':address_city'     => $this->address_city,
            ':address_state'    => $this->address_state,
            ':address_zip5'     => $this->address_zip5,
            ':address_zip4'     => $this->address_zip4,
            ':phone'            => $this->phone,
            ':phone_extension'  => $this->phone_extension,
            ':fax'              => $this->fax,
            ':email'            => $this->email,
            ':website'          => $this->website,
            ':description'      => $this->description,
            ':linkedin'         => $this->linkedin,
            ':twitter'          => $this->twitter,
            ':facebook'         => $this->facebook,
            ':googleplus'       => $this->googleplus,
            ':industry'         => $this->industry,
            ':recruiter'        => $this->recruiter,
            ':remarks'          => $this->remarks,
            );
        if(!empty($id))
        {
            $parameters[':id'] = $id;
        }
        return $parameters;
    }
    
    public function full_phone()
    {
        $full_phone = NULL;
        if(!empty($this->phone))
        {
            $area       = substr($this->phone, 0, 3);
            $prefix     = substr($this->phone, 3, 3);
            $suffix     = substr($this->phone, 6, 4);
            $full_phone = "({$area}) {$prefix}-{$suffix}";
            if(!empty($this->phone_extension))
            {
                $full_phone .= ' x'.$this->phone_extension;
            }
        }
        return $full_phone;
    }
    
    public function full_fax()
    {
        $full_fax = NULL;
        if(!empty($this->fax))
        {
            $area       = substr($this->fax, 0, 3);
            $prefix     = substr($this->fax, 3, 3);
            $suffix     = substr($this->fax, 6, 4);
            $full_fax   = "({$area}) {$prefix}-{$suffix}";
        }
        return $full_fax;
    }
    
    public function full_zip()
    {        
        $full_zip = NULL;
        if(!empty($this->address_zip5))
        {
            $full_zip = $this->address_zip5;
            if(!empty($this->address_zip4))
            {
                $full_zip .= '-'.$this->address_zip4;
            }
        }
        return $full_zip;
    }
    
    public function link_email()
    {        
        $link   = NULL;
        if(!empty($this->email))
        {
            $a_title    = "title=\"E-Mail for {$this->name}\"";
            $a_href     = "href=\"mailto:{$this->email}\"";
            $link       = "<a {$a_title} {$a_href}>{$this->email}</a>";
        }
        return $link;
    }
}