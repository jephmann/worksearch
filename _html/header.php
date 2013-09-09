        <header>
            <h1><?php echo ($project['title']); ?></h1>
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
            </ul>
        </nav> 
        <div class="clear" />
        <section>