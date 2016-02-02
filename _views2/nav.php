
        <ul><?php
                for($i = 0; $i < count($nav); $i++) :
                    $nav_file = $nav[$i]['file'];
                    $nav_title = $nav[$i]['title'];
            ?>
            
            <li><a href="<?php
                echo $page['path'].$nav_file; ?>" title="<?php
                echo $nav_title; ?>"<?php
                echo ($page['title'] === $nav_title ? ' class="active"' : NULL) ?>><?php
                echo $nav_title; ?></a></li><?php
                endfor;
            ?>
            
        </ul>
        <div class="main-content">