<?php
    /**
     * TODO 2014.04.12
     * Move all functions to helper classes
     * Remove all files in "_functions" directory, including this one
     */
    // CRUD
    require_once ($page['path'].'_functions/create.php');
    require_once ($page['path'].'_functions/read.php');
    require_once ($page['path'].'_functions/update.php');
    require_once ($page['path'].'_functions/delete.php');
    // OTHER
    require_once ($page['path'].'_functions/redirect.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    require_once ($page['path'].'_functions/returnSort.php');