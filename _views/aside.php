<aside>
    <fieldset>
        <legend>Contents</legend>
        <div class="notes">
            <h3>Miscellaneous.</h3>
            <p>                
                Might place most recent log activity here, other stuff.
                Maybe Profile stuff.
            </p>
            <pre><?php
                if(!empty($_SESSION))
                {
                    var_dump($_SESSION);
                    echo "<br />{$_SESSION['user']['id']}";
                    echo "<br />{$_SESSION['user']['username']}";
                    echo "<br />{$_SESSION['user']['email']}";
                } else {
                    echo "Reserved for Session test";
                }
                ?></pre>
        </div>
    </fieldset>
</aside>
<article>