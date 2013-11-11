<?php
/**
 * Description of Profile
 *
 * @author Jeffrey
 */
class Profile extends Person {
    
    // Profile Properties
    public $id_user                 = NULL;
    public $address_building        = NULL;
    public $address_street          = NULL;
    public $address_unit            = NULL;
    public $address_city            = "Chicago";
    public $address_state           = "IL";
    public $address_zip5            = NULL;
    public $address_zip4            = NULL;
    public $phone                   = NULL;
    public $phone_extension         = NULL;
    public $fax                     = NULL;
    public $email                   = NULL;
    public $social_security_number  = NULL;
    public $drivers_state           = NULL;
    public $drivers_license         = NULL;
    
    // Data Properties
    public $table       = "profile";
    protected $fields   = array(
        'id_user',
        'name_last',
        'name_first',
        'name_middle',
        'gender',
        'id_salutation',
        'id_name_suffix',
        'date_birth',
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
        'social_security_number',
        'drivers_state',
        'drivers_license',
        'remarks',
    );
        
    // Profile get/set Methods
    public function getId_user() {
        return $this->id_user;
    }
    public function setId_user($id_user) {
        $this->id_user = $id_user;
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

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
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

    public function getSocial_security_number() {
        return $this->social_security_number;
    }
    public function setSocial_security_number($social_security_number) {
        $this->social_security_number = $social_security_number;
    }
    
    public function getDrivers_state() {
        return $this->drivers_state;
    }
    public function setDrivers_state($drivers_state) {
        $this->drivers_state = $drivers_state;
    }

    public function getDrivers_license() {
        return $this->drivers_license;
    }
    public function setDrivers_license($drivers_license) {
        $this->drivers_license = $drivers_license;
    }
    
    // Profile Query Methods    
    public function parameters($id)
    {
        $parameters = array(
            ':id_user'                  => $this->id_user,
            ':name_last'                => $this->name_last,
            ':name_first'               => $this->name_first,
            ':name_middle'              => $this->name_middle,
            ':gender'                   => $this->gender,
            ':id_salutation'            => $this->id_salutation,
            ':id_name_suffix'           => $this->id_name_suffix,
            ':date_birth'               => $this->date_birth,
            ':address_building'         => $this->address_building,
            ':address_street'           => $this->address_street,
            ':address_unit'             => $this->address_unit,
            ':address_city'             => $this->address_city,
            ':address_state'            => $this->address_state,
            ':address_zip5'             => $this->address_zip5,
            ':address_zip4'             => $this->address_zip4,
            ':email'                    => $this->email,
            ':phone'                    => $this->phone,
            ':phone_extension'          => $this->phone_extension,
            ':fax'                      => $this->fax,
            ':social_security_number'   => $this->social_security_number,
            ':drivers_state'            => $this->drivers_state,
            ':drivers_license'          => $this->drivers_license,
            ':remarks'                  => $this->remarks,
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
    
    public function full_ssn()
    {
        $full_ssn = NULL;
        if(!empty($this->social_security_number))
        {
            $three      = substr($this->social_security_number, 0, 3);
            $two        = substr($this->social_security_number, 3, 2);
            $four       = substr($this->social_security_number, 5, 4);
            $full_ssn   = "{$three}-{$two}-{$four}";
        }
        return $full_ssn;
    }
    
    public function full_dl()
    {
        $full_dl = NULL;
        if(!empty($this->drivers_license))
        {
            $full_dl    = $this->drivers_state.' ';
            $four       = substr($this->drivers_license, 0, 4);
            $eight      = substr($this->drivers_license, 4, 4);
            $twelve     = substr($this->drivers_license, 8, 4);
            $full_dl    .= "{$four} {$eight} {$twelve}";
        }
        return $full_dl;
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
    
}