<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " | Detail",
        'path'      => "../",
        'mode'      => "Detail",
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    // =========================================================================
    
    $objLog = new Log;
    $id = $_GET['id'];
    require ($page['path'].'_fetch/log.php');
    
    /*
     * 2013.09.08 TO DO:
     * - Replace company_id with company name (cross-reference)
     * - Replace contact_id with contact full name (cross-reference)
     * - Replace contact_method_id with actual method
     */
    
    // =========================================================================
    require_once ($page['path'].'_html/head.php');
    require_once ($page['path'].'_html/header.php');
    require_once ($page['path'].'_html/aside.php');
?>
<fieldset>
    <legend>
        Logs Notes
            --
            <a href="update.php?id=<?php echo $id; ?>">Update</a>
            |
            <a href="<?php echo $page['path']; ?>delete.php?id=<?php echo $id; ?>">Delete</a>
    </legend>
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