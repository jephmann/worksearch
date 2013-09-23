<ul style="background-color: #<?php echo $objStatus->background_color; ?>; color: #<?php echo $objStatus->color; ?>;">
    <?php echo $objStatus->message; ?>
</ul>
<fieldset>
    <legend>
        <a href="update.php?id=<?php echo $objLog->id; ?>">Update</a>
        <a href="delete.php?id=<?php echo $objLog->id; ?>">Delete</a>
        Log #<?php echo $objLog->id; ?>
    </legend>
    <p>
        I still need to see additional information from Contacts and Companies, etc.
    </p>
    <table>
        <tr>
            <td><strong>Week Ending</strong></td>
            <td><?php echo $objLog->week_ending; ?></td>
        </tr>
        <tr>
            <td><strong>Contact Date</strong></td>
            <td><?php echo $objLog->contact_date; ?></td>
        </tr>
        <tr>
            <td><strong>Company</strong></td>
            <td><?php echo $objLog->id_company; ?></td>
        </tr>
        <tr>
            <td><strong>Contact</strong></td>
            <td><?php echo $objLog->id_contact; ?></td>
        </tr>
        <tr>
            <td><strong>Contact Method</strong></td>
            <td><?php echo $objLog->id_contact_method; ?></td>
        </tr>
    </table>
</fieldset>