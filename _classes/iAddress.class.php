<?php
/**
 *
 * @author Jeffrey
 */
interface iAddress {
    
    public function getAddress_building();
    public function setAddress_building($address_building);
    
    public function getAddress_street();
    public function setAddress_street($address_street);

    public function getAddress_unit();
    public function setAddress_unit($address_unit);

    public function getAddress_city();
    public function setAddress_city($address_city);

    public function getAddress_state();
    public function setAddress_state($address_state);

    public function getAddress_zip5();
    public function setAddress_zip5($address_zip5);

    public function getAddress_zip4();
    public function setAddress_zip4($address_zip4);
    
    public function getPhone();
    public function setPhone($phone);

    public function getPhone_extension();
    public function setPhone_extension($phone_extension);

    public function getFax();
    public function setFax($fax);

    public function getEmail();
    public function setEmail($email);
    
    // helpers
    public function full_phone();
    public function full_fax();
    public function full_zip();
    public function link_email();
    
}
