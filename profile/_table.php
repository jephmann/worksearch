<form class="form-labels-on-top">
    <div class="form-title-row">
        <h1><?php echo ($page['title'].$page['subtitle']); ?></h1>
    </div>
    <ul>
        <li><a title="Create New <?php echo $page['title']; ?>" href="create.php">Create</a></li>
        <li><a title="Update This <?php echo $page['title']; ?>" href="update.php">Update</a></li>
        <li><a title="Delete This <?php echo $page['title']; ?>" href="delete.php">Delete</a></li>
    </ul>
    <!--
    <ul id="status" class="<?php echo $objStatus->class; ?>">
        <?php echo $objStatus->message; ?>
    </ul>
    -->
    <h3>Who Are You?</h3>
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
    <br>   
    <h3>Address</h3>
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
    <br>
    <h3>Communication</h3>
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
    <br>
    <h3>Identification</h3>
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
</form>