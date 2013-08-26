<?php
/**
 * Description of Profile
 *
 * @author Jeffrey
 */
class Profile extends Person {
    
    // Profile Properties
    public $address_building        = NULL;
    public $address_street          = NULL;
    public $address_unit            = NULL;
    public $address_city            = "Chicago";
    public $address_state           = "IL";
    public $address_zip5            = "606##";
    public $address_zip4            = "####";
    public $phone                   = "##########";
    public $phone_extension         = "####";
    public $fax                     = "##########";
    public $email                   = NULL;
    public $social_security_number  = "#########";
    public $drivers_state           = "IL";
    public $drivers_license         = NULL;
    public $username                = NULL;
    public $password                = NULL;
    
    // Data Properties
    protected $table    = "profile";
    protected $fields   = array(
        'name_last',
        'name_first',
        'name_middle',
        'name_suffix',
        'gender',
        'id_salutation',
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
        'username',
        'password',
    );
        
    // Profile get/set Methods
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
    
    public function getUsername() {
        return $this->username;
    }
    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    
    // Profile Query Methods    
    public function parameters($id)
    {
        $parameters = array(
            ':name_last'                => $this->name_last,
            ':name_first'               => $this->name_first,
            ':name_middle'              => $this->name_middle,
            ':name_suffix'              => $this->name_suffix,
            ':gender'                   => $this->gender,
            ':id_salutation'            => $this->id_salutation,
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
            ':username'                 => $this->username,
            ':password'                 => $this->password,
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