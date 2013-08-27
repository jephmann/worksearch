<?php
    function redirect($filepath, $title)
    {
        // *.php is assumed.
        header("Location:{$filepath}.php");
        die("Redirecting to the {$title} page...");
    }
?>
