<?php
/**
 * Description of Status
 *
 * @author Jeffrey
 */
class Status {    
    public $message             = NULL;
    public $class               = NULL;
    
    public function getMessage() {
        return $this->message;
    }
    public function setMessage($message) {
        $this->message = $message;
    }
    
    public function getClass() {
        return $this->class;
    }
    public function setClass($class) {
        $this->class = $class;
    }
}