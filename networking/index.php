<?php    
    $page = array(
        'title'     => "Networking",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require ($page['path'].'_include/first.php');
    user_session($page['path']);
    require ($page['path'].'_classes/all.php');
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
        This would be a mostly open-ended diary of one's networking activities
        at job fairs, MeetUps and other mass gatherings.
    </p>
    
</fieldset>
<?php    
    require_once ($page['path'].'_views/footer.php');
?>