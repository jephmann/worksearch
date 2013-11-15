<!-- COMPANIES -->
<fieldset>
    <legend>
        Companies (Click arrows to sort) --
        <a href="create.php">
            Create
        </a>
    </legend>
    <ul id="status" name="status" class="<?php echo $objStatus->class; ?>">
        <?php echo $objStatus->message; ?>
    </ul>
    <form method="post">
        <div class="filter">            
            <ul class="filter_list">
                <li>&nbsp;&nbsp;&nbsp;<em>Filter by:</em></li>
                <li>&nbsp;&nbsp;&nbsp;<input type="radio" name="where" value="name" />Name</li>
                <li>&nbsp;&nbsp;&nbsp;<input type="radio" name="where" value="address_city" />City</li>
                <li>&nbsp;&nbsp;&nbsp;<input type="radio" name="where" value="address_zip5" />ZIP (5)</li>
                <li>&nbsp;&nbsp;&nbsp;<input type="text" name="like" /></li>
                <li>&nbsp;&nbsp;&nbsp;<input type="submit" value="Filter" /></li>
            </ul>
        </div>        
    </form>
    <table width="100%">
        <?php echo $thead.$tbody; ?>
    </table>
</fieldset>
<script language="javascript" type="text/javascript" src="_delete.js"></script>