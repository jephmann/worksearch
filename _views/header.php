        <?php
            $pt4 = strtoupper(substr($project['title'],0,4));
            $pt6 = strtolower(substr($project['title'],4,6));
        ?>
        <header>
            <h1>
                <span id="title1">
                    <?php echo ($pt4); ?></span><span id="title2"><?php echo ($pt6); ?>
                </span>
            </h1>
            <h2><?php echo ($page['title'].$page['subtitle']); ?></h2>
        </header>
        <div class="clear"></div>
        <nav>            
            <?php
                $nav_li = NULL;
                if (!empty($_SESSION['user']))
                {
                    $nav_li .= "<li><a href=\"{$page['path']}welcome.php\">HOME</a></li>
                        <li><a href=\"{$page['path']}profile/\">Profile</a></li>";
                }
                if (!empty($_SESSION['profile']))
                {
                    $nav_li .= "<li><a href=\"{$page['path']}companies/\">Companies</a></li>
                        <li><a href=\"{$page['path']}contacts/\">Contacts</a></li>
                        <li><a href=\"{$page['path']}logs/\">Logs</a></li>
                        <li>Mail</li>";
                }
                if (empty($_SESSION))
                {
                    if($page['mode'] != "Log In")
                    {
                        $nav_li .= "<li><a href=\"{$page['path']}login.php\">Log In</a></li>";
                    }
                    $nav_li .= "<li><a href=\"{$page['path']}register.php\">Register</a></li>";
                }
                if (!empty($_SESSION))
                {
                    $nav_li .= "<li><a href=\"{$page['path']}logout.php\">Log Out</a></li>";
                }
            ?>
            <ul>
                <?php
                    echo $nav_li;
                ?>
            </ul>
        </nav>
        <div class="clear"></div>
        <section>