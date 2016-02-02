<?php
    if(isset($_COOKIE['username']))
    {
        $cookie_username = $_COOKIE['username'];
    } else {
        $cookie_username = '';
    }

    if(isset($_COOKIE['password']))
    {
        $cookie_password = $_COOKIE['password'];
    } else {
        $cookie_password = '';
    }

    if(isset($_COOKIE['remember']))
    {
        $cookie_remember = 'checked';
    } else {
        $cookie_remember = '';
    }
?>
