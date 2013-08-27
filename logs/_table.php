<!-- LOGS -->
<fieldset>
    <legend>
        Logs (Click arrows to sort) --
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
                    Contact ID<br />
                    <a href='?orderby=id_contact&dir=DESC'>&darr;</a>
                    <a href='?orderby=id_contact&dir=ASC'>&uarr;</a>
                </th>
                <th>
                    Week Ending<br />
                    <a href='?orderby=week_ending&dir=DESC'>&darr;</a>
                    <a href='?orderby=week_ending&dir=ASC'>&uarr;</a>
                </th>
                <th>
                    Contact Date<br />
                    <a href='?orderby=contact_date&dir=DESC'>&darr;</a>
                    <a href='?orderby=contact_date&dir=ASC'>&uarr;</a>
                </th>
                <th>
                    Contact Method<br />
                    <a href='?orderby=$id_contact_method&dir=DESC'>&darr;</a>
                    <a href='?orderby=$id_contact_method&dir=ASC'>&uarr;</a>
                </th>
            </tr>
        </thead>
        <?php echo $tbody; ?>
    </table>
</fieldset>
