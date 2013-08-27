<!-- COMPANIES -->
<script type="text/javascript">
    function alertDelete(ID)
    {
        var answer = confirm("Are you sure about deleting Company #"+ID+"?");        
	if (answer){
		alert("Deleted!");
		window.location = ("../delete.php?id="+ID+"&tbl=companies");
	}
	else{
		alert("Not deleted then.");
                window.location = ("index.php");
                
	}
    }
    
</script>
<fieldset>
    <legend>
        Companies (Click arrows to sort) --
        <a href="create.php">
            Create
        </a>
    </legend>
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
        <thead>
            <tr>
                <th>
                    OPTIONS
                </th>
                <th>
                    Name<br />
                    <a href='?orderby=name&dir=DESC'>&darr;</a>
                    <a href='?orderby=name&dir=ASC'>&uarr;</a>
                </th>
                <th>
                    City<br />
                    <a href='?orderby=address_city&dir=DESC'>&darr;</a>
                    <a href='?orderby=address_city&dir=ASC'>&uarr;</a>
                </th>
                <th>
                    ZIP<br />
                    <a href='?orderby=address_zip5&dir=DESC'>&darr;</a>
                    <a href='?orderby=address_zip5&dir=ASC'>&uarr;</a>
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