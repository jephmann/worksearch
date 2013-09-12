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
        <div class="clear" />
        <nav>
            <ul>
                <li><a href="<?php echo $page['path'].'welcome.php'; ?>">HOME</a></li>
                <li><a href="<?php echo $page['path'].'profile/'; ?>">Profile</a></li>
                <li><a href="<?php echo $page['path'].'companies/'; ?>">Companies</a></li>
                <li><a href="<?php echo $page['path'].'contacts/'; ?>">Contacts</a></li>
                <li><a href="<?php echo $page['path'].'logs/'; ?>">Logs</a></li>
                <li>Mail</li>
                <li><a href="<?php echo $page['path'].'logout.php'; ?>">Log Out</a></li>
                <li><a href="<?php echo $page['path'].'login.php'; ?>">Log In</a></li>
                <li><a href="<?php echo $page['path'].'register.php'; ?>">Register</a></li>
            </ul>
        </nav>
        <div class="clear" />
        <section>