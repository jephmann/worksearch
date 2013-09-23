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
    <table width="100%">
        <?php echo $thead.$tbody; ?>
    </table>
</fieldset>