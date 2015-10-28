<?php
/**
 * Description of Contact
 *
 * @author Jeffrey
 */
class Contact extends Person implements iLink {
    
    /*
     * Properties
     */
    
    // remarks              Data
    // date_birth           Person
    public $department      = NULL;
    public $email           = NULL;
    public $facebook        = NULL;
    public $fax             = NULL;
    // gender               Person
    public $googleplus      = NULL;
    // id_name_suffix       Person
    public $id_prospect     = NULL;
    // id_salutation        Person
    public $id_user         = NULL;
    public $linkedin        = NULL;
    // name_first           Person
    // name_last            Person
    // name_middle          Person
    public $phone           = NULL;
    public $phone_extension = NULL;
    public $phone_mobile    = NULL;
    public $skype           = NULL;
    public $title           = NULL;
    public $twitter         = NULL;
    public $website         = NULL;
    
    /* 
     * Properties: Data
     */
    
    protected $table        = "contacts";
    protected $fields       = array(
        'remarks',
        'date_birth',
        'department',
        'email',
        'facebook',
        'fax',
        'gender',
        'googleplus',
        'id_name_suffix',
        'id_prospect',
        'id_salutation',
        'id_user',
        'linkedin',
        'name_first',
        'name_last',
        'name_middle',
        'phone',
        'phone_extension',
        'phone_mobile',
        'skype',
        'title',
        'twitter',
        'website',
        );
    
    /*
    function __construct($department, $email, $facebook, $fax, $googleplus, $id_prospect, $id_user, $linkedin, $phone, $phone_extension, $phone_mobile, $skype, $title, $twitter, $website) {
        $this->department = $department;
        $this->email = $email;
        $this->facebook = $facebook;
        $this->fax = $fax;
        $this->googleplus = $googleplus;
        $this->id_prospect = $id_prospect;
        $this->id_user = $id_user;
        $this->linkedin = $linkedin;
        $this->phone = $phone;
        $this->phone_extension = $phone_extension;
        $this->phone_mobile = $phone_mobile;
        $this->skype = $skype;
        $this->title = $title;
        $this->twitter = $twitter;
        $this->website = $website;
    }
    */        
        
    /*
     *  Methods: get/set
     */        
        
    function getDepartment() {
        return $this->department;
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

    function getId_prospect() {
        return $this->id_prospect;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getLinkedin() {
        return $this->linkedin;
    }

    function getPhone() {
        return $this->phone;
    }

    function getPhone_extension() {
        return $this->phone_extension;
    }

    function getPhone_mobile() {
        return $this->phone_mobile;
    }

    function getSkype() {
        return $this->skype;
    }

    function getTitle() {
        return $this->title;
    }

    function getTwitter() {
        return $this->twitter;
    }

    function getWebsite() {
        return $this->website;
    }

    function setDepartment($department) {
        $this->department = $department;
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

    function setId_prospect($id_prospect) {
        $this->id_prospect = $id_prospect;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function setLinkedin($linkedin) {
        $this->linkedin = $linkedin;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setPhone_extension($phone_extension) {
        $this->phone_extension = $phone_extension;
    }

    function setPhone_mobile($phone_mobile) {
        $this->phone_mobile = $phone_mobile;
    }

    function setSkype($skype) {
        $this->skype = $skype;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    function setWebsite($website) {
        $this->website = $website;
    }
    
    /*
     * Method: parameterized query    
     */
    
    public function parameters($id = NULL)
    {
        $parameters = array(
            ':remarks'          => $this->remarks,
            ':date_birth'       => $this->date_birth,
            ':department'       => $this->department,
            ':email'            => $this->email,
            ':facebook'         => $this->facebook,
            ':fax'              => $this->fax,
            ':gender'           => $this->gender,
            ':googleplus'       => $this->googleplus,
            ':id_name_suffix'   => $this->id_name_suffix,
            ':id_prospect'      => $this->id_prospect,
            ':id_salutation'    => $this->id_salutation,
            ':id_user'          => $this->id_user,
            ':linkedin'         => $this->linkedin,
            ':name_first'       => $this->name_first,
            ':name_last'        => $this->name_last,
            ':name_middle'      => $this->name_middle,
            ':phone'            => $this->phone,
            ':phone_extension'  => $this->phone_extension,
            ':phone_mobile'     => $this->phone_mobile,
            ':skype'            => $this->skype,
            ':title'            => $this->title,
            ':twitter'          => $this->twitter,
            ':website'          => $this->website,
            );
        if($id)
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
        $phone      = $this->phone;
        $extension  = $this->phone_extension;
        $full_phone = NULL;
        if(!empty($phone))
        {
            $area       = substr($phone, 0, 3);
            $prefix     = substr($phone, 3, 3);
            $suffix     = substr($phone, 6, 4);
            $full_phone = "({$area}) {$prefix}-{$suffix}";
            if(!empty($extension))
            {
                $full_phone .= ' x'.$extension;
            }
        }
        return $full_phone;
    }
    
    public function full_fax()
    {
        $fax        = $this->fax;
        $full_fax   = NULL;
        if(!empty($fax))
        {
            $area       = substr($fax, 0, 3);
            $prefix     = substr($fax, 3, 3);
            $suffix     = substr($fax, 6, 4);
            $full_fax   = "({$area}) {$prefix}-{$suffix}";
        }
        return $full_fax;
    }
    
    public function full_mobile()
    {
        $mobile         = $this->phone_mobile;
        $full_mobile    = NULL;
        if(!empty($mobile))
        {
            $area           = substr($mobile, 0, 3);
            $prefix         = substr($mobile, 3, 3);
            $suffix         = substr($mobile, 6, 4);
            $full_mobile    = "({$area}) {$prefix}-{$suffix}";
        }
        return $full_mobile;
    }
    
    public function link_email()
    {
        $email  = $this->email;
        $name   = $this->name_full();
        $link   = NULL;
        if(!empty($email))
        {
            $a_title    = "title=\"E-Mail for {$name}\"";
            $a_href     = "href=\"mailto:{$email}\"";
            $link       = "<a {$a_title} {$a_href}>{$email}</a>";
        }
        return $link;
    }
    
}