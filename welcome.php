<?php    
    $page = array(
        'title'     => "Session",
        'subtitle'  => " > Welcome",
        'path'      => NULL,
        'mode'      => "Welcome",
    );
    require ($page['path'].'_include/first.php');
    user_session($page['path']);
    require ($page['path'].'_classes/all.php');
    require ($page['path'].'_functions/all.php');
    require_once ($page['path'].'_include/helpers.php');
    // =========================================================================
    

    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
?>
<fieldset>
    <legend>WELCOME!</legend>
    <?php
        echo $divContents;
    ?>
</fieldset>
<?php    
    require_once ($page['path'].'_views/footer.php');
?>
