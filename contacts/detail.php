<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " | Detail",
        'path'      => "../",
        'mode'      => "Detail",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    $id_user    = $_SESSION['user']['id'];
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    // =========================================================================    
    
    // CONTACT
    $objContact     = new Contact;
    $objContact->setId($_GET['id']);
    $objContact->setId_user($id_user);
    require ('_fetch.php');
    require ('_display.php');
    
    // CONTACT'S COMPANY
    $objCompany     = new Company;
    $objCompany->setId($objContact->id_company);
    $objCompany->setId_user($id_user);
    require ($page['path'].'companies/_fetch.php');
    require ($page['path'].'companies/_display.php');
    
    // CONTACT'S LOGS
    /*
     * 2013.09.06 TO DO:
     * - Display Logs specific to this Contact
     */
    $objLogs        = new Log;
    
    // COMPANY'S ADDITIONAL CONTACTS
    /*
     * 2013.09.06 TO DO:
     * - Display Contacts (other than this Contact) specific to this Contact's Company
     */
    $objContacts    = new Contact;
    
    // =========================================================================    
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require ('_details.php');
    require_once ($page['path'].'_views/footer.php');
?>