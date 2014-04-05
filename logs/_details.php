<ul id="status" name="status" class="<?php echo $objStatus->class; ?>">
    <?php echo $objStatus->message; ?>
</ul>
<fieldset>
    <legend>
        <a title="Update This Log" href="update.php?id=<?php echo $objLog->id; ?>">Update</a>
        <a title="Delete This Log" href="delete.php?id=<?php echo $objProspect->id; ?>" class="delete">Delete</a>
        Log #<?php echo $objLog->id; ?>
    </legend>
    <table style="margin:0 auto;">
        <colgroup>
            <col style="background-color:#CCCCFF">
            <col style="background-color:#FFFFFF">
        </colgroup>
        <tr>
            <td><strong>Week Ending</strong></td>
            <td><?php echo $log_week_ending; ?></td>
        </tr>
        <tr>
            <td><strong>Contact Date</strong></td>
            <td><?php echo $log_contact_date; ?></td>
        </tr>
        <tr>
            <td><strong>Type of Work Sought</strong></td>
            <td><?php echo $log_work; ?></td>
        </tr>
        <tr>
            <td><strong>Prospect</strong></td>
            <td><?php echo $log_prospect; ?></td>
        </tr>
        <tr>
            <td><strong>Contact</strong></td>
            <td><?php echo $log_contact; ?></td>
        </tr>
        <tr>
            <td><strong>Contact Method</strong></td>
            <td><?php echo $log_contact_method; ?></td>
        </tr>
        <tr>
            <td><strong>Contact Method Specifics</strong></td>
            <td><?php echo $log_specify; ?></td>
        </tr>
        <tr>
            <td><strong>Results</strong></td>
            <td><?php echo $log_results; ?></td>
        </tr>
        <tr>
            <td><strong>Remarks/Notes</strong></td>
            <td><?php echo $log_remarks; ?></td>
        </tr>
    </table>
</fieldset>
<script language="javascript" type="text/javascript" src="_delete.js"></script>