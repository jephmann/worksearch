<?php
    echo "<pre>";
    var_dump($_POST);
    echo "</pre><pre>";
    var_dump($objLog);
    echo "</pre>";


    // $objStatus->message .= "<li>VALIDATON TEST</li>";
    
    if(!empty($status['message']))
    {
        $objStatus->color                = ("CC6666");
        $objStatus->background_color     = ("FFFFCC");
    }
?>
