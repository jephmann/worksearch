<!-- CONTACTS -->
<fieldset>
    <legend>
        Contacts (Click arrows to sort) --
        <a href="create.php">
            Create
        </a>
    </legend>
    <ul style="background-color: #<?php echo $objStatus->background_color; ?>; color: #<?php echo $objStatus->color; ?>;">
        <?php echo $objStatus->message; ?>
    </ul>
    <form method="post">
        <div class="filter">            
            <ul class="filter_list">
                <li>&nbsp;&nbsp;&nbsp;<em>Filter by:</em></li>
                <li>&nbsp;&nbsp;&nbsp;<input type="radio" name="where" value="name" />Company</li>
                <li>&nbsp;&nbsp;&nbsp;<input type="radio" name="where" value="department" />Department</li>
                <li>&nbsp;&nbsp;&nbsp;<input type="radio" name="where" value="title" />Title</li>
                <li>&nbsp;&nbsp;&nbsp;<input type="text" name="like" /></li>
                <li>&nbsp;&nbsp;&nbsp;<input type="submit" value="Filter" /></li>
            </ul>
        </div>        
    </form>
    <table width="100%">
        <?php echo $thead.$tbody; ?>
    </table>
</fieldset>