<?php    
    $page = array(
        'title'     => "Documents",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require ($page['path'].'_include/first.php');
    user_session($page['path']);
    require ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_include/helpers.php');
    // =========================================================================
    
    $docpath = $page['path'].'documents';
    $rbl_docdirs = NULL;
    $doc_dirs = NULL;
    
    $dir_handle = @opendir($docpath) or die("Unable to open $docpath");
    while ($dir = readdir($dir_handle))
    {
        if($dir == "." || $dir == ".." || $dir == "index.php" )
            continue;
            $dir_name = ucwords(str_replace('_', ' ', $dir));
            $doc_dirs .= "<p><span style=\"font-weight: bold; font-size: 1.25em;\">$dir_name</span><br />";
            $dir_checked = NULL;
            if(isset($_POST['uploadType']))
            {
                $dir_checked = " checked";
            }            
            $rbl_docdirs .= "\r\n<br /><input type=\"radio\" name=\"uploadType\"{$dir_checked} value=\"{$dir}\">{$dir_name}";
            $subpath = "{$docpath}/{$dir}";
            $subdir_handle = @opendir($subpath) or die("Unable to open $subpath");
            while ($subfile = readdir($subdir_handle))
            {
                if($subfile == "." || $subfile == "..")
                    continue;
                    $doc_dirs .= "\r\n[X] <a target=\"blank\" href=\"{$dir}/{$subfile}\">{$subfile}</a><br />";
                    // TODO: Convert [X] to link deleting the file.
            }
            closedir($subdir_handle);
    }
    $doc_dirs .=  "</p>";
    // Close
    closedir($dir_handle);
    
    if(isset($_POST['submit']))
    {
        // TODO: VALIDATION (both fields are required)
        move_uploaded_file ($_FILES['uploadFile'] ['tmp_name'], "{$docpath}/{$_POST['uploadType']}/{$_FILES['uploadFile'] ['name']}");
        header('Location:index.php');
    }
    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
?>
<fieldset>
    <legend><?php echo $page['title'] ?></legend>
    <div style='background-color: #FFFFFF;'>
        <div style='width: 55%; float: left;'>
            <fieldset>
                <legend>Upload a File</legend>
                <p>
                    <?php echo $asterisk; ?> = Required fields.
                </p>
                <ul id="status" name="status" class="<?php echo $objStatus->class; ?>">
                    <?php echo $objStatus->message; ?>
                </ul>
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label style="float: none;" for="uploadFile">Your File:<?php echo $asterisk; ?></label>
                        <p>
                        <input type="file" name="uploadFile" id="uploadFile">
                        </p>
                    </div>
                    <div>
                        <label style="float: none;" for="uploadType">File Type:<?php echo $asterisk; ?></label>
                        <div>
                            <?php echo $rbl_docdirs; ?>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </fieldset>
        </div>
        <div style='width: 40%; float: right;'>
            <fieldset>
                <legend>Your Current Files</legend>
                <?php echo $doc_dirs; ?>
            </fieldset>
        </div>
    </div>
</fieldset>
<?php    
    require_once ($page['path'].'_views/footer.php');
?>