<?php
/**
 * Description of Profile
 *
 * @author Jeffrey
 */
class Profile extends Person implements iAddress {
    
    /*
     * Properties
     */
    
    // remarks                      Data
    public $address_building        = NULL;
    public $address_city            = "Chicago";
    public $address_state           = "IL";
    public $address_street          = NULL;
    public $address_unit            = NULL;
    public $address_zip4            = NULL;
    public $address_zip5            = NULL;
    // date_birth                   Person
    public $drivers_license         = NULL;
    public $drivers_state           = NULL;
    public $email                   = NULL;
    public $fax                     = NULL;
    // gender                       Person
    // id_name_suffix               Person
    // id_salutation                Person
    public $id_user                 = NULL;
    // name_first                   Person
    // name_last                    Person
    // name_middle                  Person
    public $phone                   = NULL;
    public $phone_extension         = NULL;
    public $phone_mobile            = NULL;
    public $skype                   = NULL;
    public $social_security_number  = NULL;
    
    /* 
     * Properties: Data
     */
    
    protected $table                = "profile";
    protected $fields               = array(
        'remarks',
        'address_building',
        'address_city',
        'address_state',
        'address_street',
        'address_unit',
        'address_zip4',
        'address_zip5',
        'date_birth',
        'drivers_license',
        'drivers_state',
        'email',
        'fax',
        'gender',
        'id_name_suffix',
        'id_salutation',
        'id_user',
        'name_first',
        'name_last',
        'name_middle',
        'phone',
        'phone_extension',
        'phone_mobile',
        'skype',
        'social_security_number',
    );
    
    function __construct($address_building, $address_city, $address_state, $address_street, $address_unit, $address_zip4, $address_zip5, $drivers_license, $drivers_state, $email, $fax, $id_user, $phone, $phone_extension, $phone_mobile, $skype, $social_security_number) {
        $this->address_building = $address_building;
        $this->address_city = $address_city;
        $this->address_state = $address_state;
        $this->address_street = $address_street;
        $this->address_unit = $address_unit;
        $this->address_zip4 = $address_zip4;
        $this->address_zip5 = $address_zip5;
        $this->drivers_license = $drivers_license;
        $this->drivers_state = $drivers_state;
        $this->email = $email;
        $this->fax = $fax;
        $this->id_user = $id_user;
        $this->phone = $phone;
        $this->phone_extension = $phone_extension;
        $this->phone_mobile = $phone_mobile;
        $this->skype = $skype;
        $this->social_security_number = $social_security_number;
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

    function getDrivers_license() {
        return $this->drivers_license;
    }

    function getDrivers_state() {
        return $this->drivers_state;
    }

    function getEmail() {
        return $this->email;
    }

    function getFax() {
        return $this->fax;
    }

    function getId_user() {
        return $this->id_user;
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

    function getSocial_security_number() {
        return $this->social_security_number;
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

    function setDrivers_license($drivers_license) {
        $this->drivers_license = $drivers_license;
    }

    function setDrivers_state($drivers_state) {
        $this->drivers_state = $drivers_state;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFax($fax) {
        $this->fax = $fax;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
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

    function setSocial_security_number($social_security_number) {
        $this->social_security_number = $social_security_number;
    } 
    
    /*
     * Method: parameterized query    
     */
    
    public function parameters($id)
    {
        $parameters = array(
            ':remarks'                  => $this->remarks,
            ':address_building'         => $this->address_building,
            ':address_city'             => $this->address_city,
            ':address_state'            => $this->address_state,
            ':address_street'           => $this->address_street,
            ':address_unit'             => $this->address_unit,
            ':address_zip4'             => $this->address_zip4,
            ':address_zip5'             => $this->address_zip5,
            ':date_birth'               => $this->date_birth,
            ':drivers_license'          => $this->drivers_license,
            ':drivers_state'            => $this->drivers_state,
            ':email'                    => $this->email,
            ':fax'                      => $this->fax,
            ':gender'                   => $this->gender,
            ':id_name_suffix'           => $this->id_name_suffix,
            ':id_salutation'            => $this->id_salutation,
            ':id_user'                  => $this->id_user,
            ':name_first'               => $this->name_first,
            ':name_last'                => $this->name_last,
            ':name_middle'              => $this->name_middle,
            ':phone'                    => $this->phone,
            ':phone_extension'          => $this->phone_extension,
            ':phone_mobile'             => $this->phone_mobile,
            ':skype'                    => $this->skype,
            ':social_security_number'   => $this->social_security_number,
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
    
    public function full_mobile()
    {
        $output     = NULL;
        $mobile         = $this->phone_mobile;
        if(!empty($mobile))
        {
            $area           = substr($mobile, 0, 3);
            $prefix         = substr($mobile, 3, 3);
            $suffix         = substr($mobile, 6, 4);
            $output         = "({$area}) {$prefix}-{$suffix}";
        }
        return $output;
    }
    
    public function full_ssn()
    {
        $output     = NULL;
        if(!empty($this->social_security_number))
        {
            $three      = substr($this->social_security_number, 0, 3);
            $two        = substr($this->social_security_number, 3, 2);
            $four       = substr($this->social_security_number, 5, 4);
            $output     = "{$three}-{$two}-{$four}";
        }
        return $output;
    }
    
    public function full_dl()
    {
        $output     = NULL;
        if(!empty($this->drivers_license))
        {
            $output     = $this->drivers_state.' ';
            $four       = substr($this->drivers_license, 0, 4);
            $eight      = substr($this->drivers_license, 4, 4);
            $twelve     = substr($this->drivers_license, 8, 4);
            $output     .= "{$four} {$eight} {$twelve}";
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