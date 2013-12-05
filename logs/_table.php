<!-- LOGS -->
<fieldset>
    <legend>
        Logs (Click arrows to sort) --
        <a title="Create New Log" href="create.php">
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
                <li>&nbsp;&nbsp;&nbsp;<input type="radio" name="where" value="company" />Company</li>
                <li>&nbsp;&nbsp;&nbsp;<input type="radio" name="where" value="contact" />Contact Name</li>
                <li>&nbsp;&nbsp;&nbsp;<input type="radio" name="where" value="method" />Contact Method</li>
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
