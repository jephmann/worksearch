<?php
/**
 * Description of Contact
 *
 * @author Jeffrey
 */
class Contact extends Person {
    
    // Contact Properties
    public $id_user         = NULL;
    public $id_prospect     = NULL;
    public $department      = NULL;
    public $title           = NULL;
    public $phone           = NULL;
    public $phone_extension = NULL;
    public $phone_mobile    = NULL;
    public $fax             = NULL;
    public $email           = NULL;
    public $linkedin        = NULL;
    public $twitter         = NULL;
    public $facebook        = NULL;
    public $googleplus      = NULL;
    
    // Data Properties
    protected $table        = "contacts";
    protected $fields       = array(
        'id_user',
        'id_prospect',
        'id_salutation',
        'name_last',
        'name_first',
        'name_middle',
        'id_name_suffix',
        'gender',
        'phone',
        'phone_extension',
        'phone_mobile',
        'fax',
        'email',
        'title',
        'department',
        'linkedin',
        'twitter',
        'facebook',
        'googleplus',
        'remarks'
        );
        
    // Contact get/set Methods
    public function getId_user() {
        return $this->id_user;
    }
    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }    
    
    public function getId_prospect() {
        return $this->id_prospect;
    }
    public function setId_prospect($id_prospect) {
        $this->id_prospect = $id_prospect;
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
    
    public function getPhone_mobile() {
        return $this->phone_mobile;
    }

    public function setPhone_mobile($phone_mobile) {
        $this->phone_mobile = $phone_mobile;
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
            ':id_user'          => $this->id_user,
            ':id_prospect'      => $this->id_prospect,
            ':id_salutation'    => $this->id_salutation,
            ':name_last'        => $this->name_last,
            ':name_first'       => $this->name_first,
            ':name_middle'      => $this->name_middle,
            ':id_name_suffix'   => $this->id_name_suffix,
            ':gender'           => $this->gender,
            ':phone'            => $this->phone,
            ':phone_extension'  => $this->phone_extension,
            ':phone_mobile'     => $this->phone_mobile,
            ':fax'              => $this->fax,
            ':email'            => $this->email,
            ':title'            => $this->title,
            ':department'       => $this->department,
            ':linkedin'         => $this->linkedin,
            ':twitter'          => $this->twitter,
            ':facebook'         => $this->facebook,
            ':googleplus'       => $this->googleplus,
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
    
    public function full_mobile()
    {
        $full_mobile = NULL;
        if(!empty($this->phone_mobile))
        {
            $area           = substr($this->phone_mobile, 0, 3);
            $prefix         = substr($this->phone_mobile, 3, 3);
            $suffix         = substr($this->phone_mobile, 6, 4);
            $full_mobile    = "({$area}) {$prefix}-{$suffix}";
        }
        return $full_mobile;
    }
    
    public function link_email()
    {        
        $link   = NULL;
        if(!empty($this->email))
        {
            $a_title    = "title=\"E-Mail for {$this->name_full()}\"";
            $a_href     = "href=\"mailto:{$this->email}\"";
            $link       = "<a {$a_title} {$a_href}>{$this->email}</a>";
        }
        return $link;
    }
}