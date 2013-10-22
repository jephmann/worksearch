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
    <legend>Contents</legend>
    <ul>
        <li><a href="profile/">Profile</a></li>
        <li><a href="companies/">Companies</a></li>
        <li><a href="contacts/">Contacts</a></li>
        <li><a href="logs/">Logs</a></li>
        <li>Mail</li>
    </ul>
</fieldset>
<?php    
    require_once ($page['path'].'_views/footer.php');
?>
