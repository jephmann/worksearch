<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="<?php echo $project['description']; ?>" />
        <meta name="keywords" content="<?php echo $project['keywords']; ?>" />
        <meta name="author" content="<?php echo $project['author']; ?>" />
        <meta name="robots" content="noindex, follow" />
        <title><?php echo ($project['title'].' | '.$page['title'].$page['subtitle']); ?></title>
        <link rel="stylesheet" href="<?php echo $page['path'];?>_css/reset.css" />
        <link rel="stylesheet" href="<?php echo $page['path'];?>_css/common.css" />
        <script language="javascript" type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script language="javascript" type="text/javascript"
            src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    </head>
    <body>
        <div id="page">