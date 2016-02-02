<?php    
    $page = array(
        'title'     => "Mail",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    

    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_views2/head.php');
    require_once ($page['path'].'_views2/header.php');
    require_once ($page['path'].'_views2/nav.php');
    // require_once ($page['path'].'_views/aside.php');
?>
<form class="form-labels-on-top">
    <div class="form-title-row">
        <h1><?php echo ($page['title'].$page['subtitle']); ?></h1>
    </div>
    <h3>Under Construction</h3>
    <p>
        Here we would have provisions for either individual e-mails or mass
        e-mails. As each (individual) e-mail is sent, data would be sent
        automatically to Logs, where the user may have the option to update or
        correct.
    </p>    
</form>
<?php    
    require_once ($page['path'].'_views2/foot.php');
?>