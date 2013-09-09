<?php
    function redirectById($filepath, $title, $id)
    {
        // *.php is assumed.
        header("Location:{$filepath}.php?id={$id}");
        die("Redirecting to the {$title} page...");
    }