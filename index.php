<?php    
    $page = array(
        'title'     => "Session",
        'subtitle'  => " > Root",
        'path'      => NULL,
        'mode'      => "Root",
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
    <legend>INDEX</legend>
    <ul>
        <li><a href="welcome.php">welcome</a></li>
        <li><a href="register.php">register</a></li>
        <li><a href="login.php">login</a></li>
    </ul>
    <div class="notes">
        <h3>Index Notes</h3>
        <p>
            This page shall route initial traffic depending on the existence of a
            profile in the system. 
        </p>
        <p>
            If the Profile table is empty, this page would redirect you to
            Profile/Create -- an empty data-entry form -- with no other navigation
            on display.
        </p>
        <p>
            If a Profile exists, this page would redirect you to Login.        
        </p>
        <p>
            A successful Login redirects you to Welcome; all navigation is
            displayed.
        </p>
        <p>
            An unsuccessful Login may trigger "forget Login" logic. Maybe "delete
            Profile" as well?
        </p>
    </div>
</fieldset>
<?php    
    require_once ($page['path'].'_views/footer.php');
?>
