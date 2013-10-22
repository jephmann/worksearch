<ul id="status" name="status" class="<?php echo $objStatus->class; ?>">
    <?php echo $objStatus->message; ?>
</ul>
<fieldset>
    <legend>
        <a href="create.php">Create</a>
        <a href="update.php">Update</a>
        <a href="delete.php">Delete</a>
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
                <td>
                    <strong>Phone:</strong>
                </td>
                <td>
                    <?php echo $profile_phone; ?>
                </td>
            </tr>
            <tr>
                <td><strong>Fax:</strong></td>
                <td><?php echo $profile_fax; ?></td>
            </tr>
            <tr>
                <td><strong>E-Mail:</strong></td>
                <td><?php echo $profile_email; ?></td>
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

    
    

    
    
    
    
    <div class="notes">
    <h3>Login/Profile notes</h3>
        <ol>
            <li>
                The main Index page automatically checks for the existence of a Profile in the database.         
            </li>
            <li>
                If no Profile exists:
                <br />- Index redirects to the Profile/Create page
                <br />- hide navigation
                <br />- after successful Profile creation, Profile/Create redirects to Login
            </li>
            <li>
                If a Profile exists:
                <br />- Index redirects to the Login page.
            </li>
        </ol>
        <ol>
            <li>
                The user with Profile is at the Login page.
            </li>
            <li>
                If Login succeeds:
                <br />- redirect to the Welcome page
                <br />- show all navigation
            </li>
            <li>
                If Login fails:
                <br />- implement "forget Login logic
            </li>        
        </ol>
        <p>
            Unlike the other sections (index [all], create, update, detail, delete),
            Profile is:
            <br />If none, Create; no Update; no Detail, no Delete
            <br />Otherwise, index [THIS PAGE -- detail], update, delete
        </p>
    </div>
</fieldset>