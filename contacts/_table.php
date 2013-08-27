<!-- CONTACTS -->
<fieldset>
    <legend>
        Contacts (Click arrows to sort) --
        <a href="create.php">
            Create
        </a>
    </legend>
    <table width="100%">
        <thead>
            <tr>
                <th>
                    OPTIONS
                </th>
                <th>
                    Company ID<br />
                    <a href='?orderby=id_company&dir=DESC'>&darr;</a>
                    <a href='?orderby=id_company&dir=ASC'>&uarr;</a>
                </th>
                <th>
                    Name<br />
                    <a href='?orderby=name_last&dir=DESC'>&darr;</a>
                    <a href='?orderby=name_last&dir=ASC'>&uarr;</a>
                </th>
                <th>
                    Department<br />
                    <a href='?orderby=department&dir=DESC'>&darr;</a>
                    <a href='?orderby=department&dir=ASC'>&uarr;</a>
                </th>
                <th>
                    Title<br />
                    <a href='?orderby=title&dir=DESC'>&darr;</a>
                    <a href='?orderby=title&dir=ASC'>&uarr;</a>
                </th>
                <th>
                    Phone<br />
                    <a href='?orderby=phone&dir=DESC'>&darr;</a>
                    <a href='?orderby=phone&dir=ASC'>&uarr;</a>
                </th>
                <th>
                    E-Mail<br />
                    <a href='?orderby=email&dir=DESC'>&darr;</a>
                    <a href='?orderby=email&dir=ASC'>&uarr;</a>
                </th>
            </tr>
        </thead>
        <?php echo $tbody; ?>
    </table>
</fieldset>