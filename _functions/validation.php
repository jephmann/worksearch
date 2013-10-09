<?php
    function validation_message($validation_message)
    {
        $string = NULL;
        if(!empty($validation_message))
        {
            $string = "<li>{$validation_message}</li>";
        }
        return $string;
    }