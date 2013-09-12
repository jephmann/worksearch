<fieldset>
    <legend>Your Profile</legend>
    <ul>
        <li><a href="create.php">Create</a></li>
        <li><a href="update.php">Update</a></li>
        <li><a href="delete.php">Delete</a></li>
    </ul>
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