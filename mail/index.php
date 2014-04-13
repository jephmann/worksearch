<?php    
    $page = array(
        'title'     => "Mail",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
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
    <legend><?php echo $page['title'] ?></legend>
    <h3>Under Construction</h3>
    <p>
        Here we would have provisions for either individual e-mails or mass
        e-mails. As each (individual) e-mail is sent, data would be sent
        automatically to Logs, where the user may have the option to update or
        correct.
    </p>
    
</fieldset>
<?php    
    require_once ($page['path'].'_views/footer.php');
?>