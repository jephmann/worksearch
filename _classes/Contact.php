<?php
/**
 * Description of Contact
 *
 * @author Jeffrey
 */
class Contact extends Person {
    
    // Contact Properties
    public $id_company      = NULL;
    public $department      = NULL;
    public $title           = NULL;
    public $phone           = NULL;
    public $phone_extension = NULL;
    public $fax             = NULL;
    public $email           = NULL;
    public $linkedin        = NULL;
    public $twitter         = NULL;
    public $facebook        = NULL;
    public $googleplus      = NULL;
    
    // Data Properties
    protected $table    = "contacts";
    protected $fields   = array(
        'id_company',
        'id_salutation',
        'name_last',
        'name_first',
        'name_middle',
        'name_suffix',
        'gender',
        'phone',
        'phone_extension',
        'fax',
        'email',
        'title',
        'department',
        'linkedin',
        'twitter',
        'facebook',
        'googleplus'
        );
        
    // Contact get/set Methods
    public function getId_company() {
        return $this->id_company;
    }
    public function setId_company($id_company) {
        $this->id_company = $id_company;
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

    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }    

    public function getDepartment() {
        return $this->department;
    }
    public function setDepartment($department) {
        $this->department = $department;
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
    
    // Contact Query Methods    
    public function parameters($id)
    {
        $parameters = array(
            ':id_company'       => $this->id_company,
            ':id_salutation'    => $this->id_salutation,
            ':name_last'        => $this->name_last,
            ':name_first'       => $this->name_first,
            ':name_middle'      => $this->name_middle,
            ':name_suffix'      => $this->name_suffix,
            ':gender'           => $this->gender,
            ':phone'            => $this->phone,
            ':phone_extension'  => $this->phone_extension,
            ':fax'              => $this->fax,
            ':email'            => $this->email,
            ':title'            => $this->title,
            ':department'       => $this->department,
            ':linkedin'         => $this->linkedin,
            ':twitter'          => $this->twitter,
            ':facebook'         => $this->facebook,
            ':googleplus'       => $this->googleplus,
            );
        if(!empty($id))
        {
            $parameters['id'] = $id;
        }
        return $parameters;
    }
}
/*
    Note that it is a good practice to NOT end your PHP files with a closing PHP tag.
    This prevents trailing newlines on the file from being included in your output,
    which can cause problems with redirecting users.
*/