<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " | Detail",
        'path'      => "../",
        'mode'      => "Detail",
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Person.php');
    require_once ($page['path'].'_classes/Company.php');
    require_once ($page['path'].'_classes/Contact.php');
    require_once ($page['path'].'_classes/Log.php');
    require_once ($page['path'].'_classes/Profile.php');
    require_once ($page['path'].'_classes/Status.php');
    require_once ($page['path'].'_functions/formatPhone.php');
    
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    
    $objLog = new Log;
    /*
     * =========================================================================
     */

    $id = $_GET['id'];
    try
    {
        $stmt = $db->prepare($objLog->select($id));
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }
    $row = $stmt->fetch();
    
    $objLog->setId_company(htmlentities($row['id_company'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_contact(htmlentities($row['id_contact'], ENT_QUOTES, 'UTF-8'));
    $objLog->setId_contact_method(htmlentities($row['id_contact_method'], ENT_QUOTES, 'UTF-8'));
    $objLog->setWeek_ending(htmlentities($row['week_ending'], ENT_QUOTES, 'UTF-8'));
    $objLog->setContact_date(htmlentities($row['contact_date'], ENT_QUOTES, 'UTF-8'));
    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_html/head.php');
    require_once ($page['path'].'_html/header.php');
    require_once ($page['path'].'_html/aside.php');
?>
<fieldset>
    <legend>Logs Notes</legend>
    <ul>
        <li>index = sortable Logs table</li>
        <li>create = add Log</li>
        <li>update = edit Log</li> 
        <li>detail = view Log</li>
        <li>delete = delete Log</li>
    </ul>
    <p>
        For now I want to bring in a table showing one row of an IDES work search record, the Log.
        I still want to see additional information from Contacts and Companies, etc.
    </p>
    <table>
        <thead>
            <tr>
                <th>Week<br/>Ending</th>
                <th>Contact<br/>Date</th>
                <th>Company</th>
                <th>Contact</th>
                <th>Contact<br/>Method</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $objLog->week_ending; ?></td>
                <td><?php echo $objLog->contact_date; ?></td>
                <td><?php echo $objLog->id_company; ?></td>
                <td><?php echo $objLog->id_contact; ?></td>
                <td><?php echo $objLog->id_contact_method; ?></td>
            </tr>
        </tbody>
            
    </table>
</fieldset>
<?php
    require_once ($page['path'].'_html/footer.php');
?>