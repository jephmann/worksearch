<?php    
    $page = array(
        'title'     => "Networking",
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
    //require_once ($page['path'].'_views/aside.php');
?>
<form class="form-labels-on-top">
    <div class="form-title-row">
        <h1><?php echo ($page['title'].$page['subtitle']); ?></h1>
    </div>
    <h3>Under Construction</h3>
    <p>
        This would be a mostly open-ended diary of one's networking activities
        at job fairs, MeetUps and other mass gatherings.
    </p>    
</form>
<?php    
    require_once ($page['path'].'_views2/foot.php');
?>