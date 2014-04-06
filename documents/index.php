<?php    
    $page = array(
        'title'     => "Documents",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require ($page['path'].'_include/first.php');
    user_session($page['path']);
    require ($page['path'].'_classes/all.php');
    require ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setClass("status_quo");
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
        Here we would have provisions for uploading documents related to one's
        job search -- resumes, cover letters, etc.
    </p>
    
</fieldset>
<?php    
    require_once ($page['path'].'_views/footer.php');
?>