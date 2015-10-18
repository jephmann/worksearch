<ul id="status" name="status" class="<?php echo $objStatus->class; ?>">
    <?php echo $objStatus->message; ?>
</ul>
<fieldset>
    <legend>
        <a title="Create New Profile" href="create.php">Create</a>
        <a title="Update This Profile" href="update.php">Update</a>
        <a title="Delete This Profile" href="delete.php">Delete</a>
        Your Profile
    </legend>
    <fieldset>
        <legend>Who Are You?</legend>
        <table>
            <colgroup>
                <col style="background-color:#CCCCFF">
                <col style="background-color:#FFFFFF">
            </colgroup>
            <tr>
                <td><strong>Name:</strong></td>
                <td><?php echo $profile_name_full; ?></td>
            </tr>
            <tr>
                <td><strong>Gender:</strong></td>
                <td><?php echo $objProfile->gender; ?></td>
            </tr>
            <tr>
                <td><strong>Born:</strong></td>
                <td><?php echo $objProfile->full_birth_date(); ?></td>
            </tr>
            <tr>
                <td><strong>Remarks/Notes:</strong></td>
                <td><?php echo $objProfile->remarks; ?></td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Address</legend>
        <table>
            <colgroup>
                <col style="background-color:#FFFFFF">
            </colgroup>
            <tr>
                <td>
                    <?php echo $profile_building; ?>
                    <?php echo $objProfile->address_street; ?>
                    <br />
                    <?php echo $profile_unit; ?>
                    <?php echo $profile_csz; ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Communication</legend>
        <table>
            <colgroup>
                <col style="background-color:#CCCCFF">
                <col style="background-color:#FFFFFF">
            </colgroup>
            <tr>
                <td><strong>Phone:</strong></td>
                <td><?php echo $profile_phone; ?></td>
            </tr>
            <tr>
                <td><strong>Mobile Phone:</strong></td>
                <td><?php echo $profile_mobile; ?></td>
            </tr>
            <tr>
                <td><strong>Fax:</strong></td>
                <td><?php echo $profile_fax; ?></td>
            </tr>
            <tr>
                <td><strong>E-Mail:</strong></td>
                <td><?php echo $profile_email; ?></td>
            </tr>
            <tr>
                <td><strong>Skype:</strong></td>
                <td><?php echo $profile_skype; ?></td>
            </tr>
        
        </table>
    </fieldset>
    <fieldset>
        <legend>Identification</legend>
        <table>
            <colgroup>
                <col style="background-color:#CCCCFF">
                <col style="background-color:#FFFFFF">
            </colgroup>
            <tr>
                <td>
                    <strong>Drivers License:</strong>
                </td>
                <td>
                    <?php echo $profile_drivers_license; ?>
                </td>
            </tr>
            <tr>
                <td><strong>Social Security Number:</strong></td>
                <td><?php echo $profile_social_security_number; ?></td>
            </tr>        
        </table>
    </fieldset>
</fieldset>