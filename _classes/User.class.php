<?php
/**
 * Description of User
 *
 * @author Jeffrey
 */
class User extends Data {
    
    /*
     *  Properties*
     */
    
    public $username    = NULL;
    public $password    = NULL;
    public $salt        = NULL;
    public $email       = NULL;
    // * - http://forums.devshed.com/php-faqs-and-stickies-167/how-to-program-a-basic-but-secure-login-system-using-891201.html
    
    /* 
     * Properties: Data
     */
    
    protected $table   = "users";
    protected $fields  = array(
        'username',
        'password',
        'salt',
        'email',
        );
    
    /*
     *  Methods: get/set
     */
    
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

    public function getSalt() {
        return $this->salt;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    /*
     * Method: parameterized query    
     */
    
    public function parameters($id)
    {
        $parameters = array(
            ':username' => $this->username,
            ':password' => $this->password,
            ':salt'     => $this->salt,
            ':email'    => $this->email,
            );
        if(!empty($id))
        {
            $parameters['id'] = $id;
        }
        return $parameters;
    }
    
}

?>
