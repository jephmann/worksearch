<?php
/**
 * Description of Status
 *
 * @author Jeffrey
 */
class Status {
    
    public $message             = NULL;
    public $color               = NULL;
    public $background_color    = NULL;
    
    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getBackground_color() {
        return $this->background_color;
    }

    public function setBackground_color($background_color) {
        $this->background_color = $background_color;
    }


}
/*
    Note that it is a good practice to NOT end your PHP files with a closing PHP tag.
    This prevents trailing newlines on the file from being included in your output,
    which can cause problems with redirecting users.
*/