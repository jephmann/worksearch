<aside>
    <fieldset>
        <legend>Aside (TBD)</legend>
        <div class="notes">
            <h3>Miscellaneous.</h3>
            <p>                
                Might place most recent log activity here, other stuff.
            </p>
            <pre><?php
                
                if(!empty($_SESSION))
                {
                    //var_dump($_SESSION);
                    echo "<br />{$_SESSION['user']['id']}";
                    echo "<br />{$_SESSION['user']['username']}";
                    echo "<br />{$_SESSION['user']['email']}";
                    if(!empty($_SESSION['profile']))
                    {
                        echo "<br/>count: ".count($_SESSION['profile']);
                        echo "<br/>{$_SESSION['profile']['name_last']}";
                        echo "<br/>{$_SESSION['profile']['name_first']}";
                    }
                    else
                    {
                        echo "<br/>No Profile Data in Session";
                    }
                } else {
                    echo "Reserved for Session test";
                }
                
                ?></pre>
        </div>
    </fieldset>
</aside>
<article>