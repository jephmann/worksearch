<?php
    function return_THEAD($array_columns)
    {
        $thead  = "<thead>";
        $asc    = NULL;
        $desc   = NULL;
        $field  = NULL;
        $title  = NULL;
        $url    = strtok($_SERVER["REQUEST_URI"],'?');
        for($i=0; $i<count($array_columns); $i++)
        {
            $title  = $array_columns[$i]['title'];
            $thead  .= "<th>{$title}";
            if($title == "OPTIONS")
            {
                $thead  .= "<br /><a title=\"Reset Table\" href=\"{$url}\">- Reset -</a>";
            }
            if(!empty($array_columns[$i]['field']))
            {
                $field  = $array_columns[$i]['field'];
                $desc   = "<a title=\"{$title} Descending\" href=\"?orderby={$field}&dir=DESC\">&darr;</a>";
                $asc    = "<a title=\"{$title} Ascending\" href=\"?orderby={$field}&dir=ASC\">&uarr;</a>";
                $thead  .= "<br />{$desc}&nbsp;{$asc}";
            }
            $thead  .= "</th>";
        }
        $thead  .= "</thead>";
        return $thead;
    }