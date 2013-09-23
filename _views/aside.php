<aside>
    <p>
        <?php
        if(!empty($_SESSION['profile']))
        {
            $session_name_full = $_SESSION['profile']['name_last'];
            if(!empty($_SESSION['profile']['name_middle']))
            {
                $session_name_full = $_SESSION['profile']['name_middle'] . ' ' . $session_name_full;
            }
            if(!empty($_SESSION['profile']['name_first']))
            {
                $session_name_full = $_SESSION['profile']['name_first'] . ' ' . $session_name_full;
            }
            echo "<h2>
                {$session_name_full}
                <br/>
                {$_SESSION['profile']['address_city']}, {$_SESSION['profile']['address_state']}
                </h2>";
        }
        else
        {
            echo "<h3>
                We invite you to build your profile before proceding further.
                </h3>";
        }
        ?>
    </p>
    <fieldset>
        <legend>Contents</legend>
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
                        echo "<br/>Session Profile OK";
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