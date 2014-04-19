<?php    
    $page = array(
        'title'     => "Prospects",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $id_user    = $_SESSION['user']['id'];
    $objProspects   = new Prospect;
    $objProspects->setId_user($id_user);
    $prmProspects   = $objProspects->id_params(NULL, $objProspects->id_user);
    require_once ($page['path'].'_variables/index.php');
    if (isset($_GET['orderby']) && isset($_GET['dir']))
    {
        $get        = TRUE;
        $orderby    = $_GET['orderby'];
        $dir        = $_GET['dir'];       
    }
    $sort   = $objData->sort($get, $orderby, $dir, 'name, branch');
    
    /*
     * 2103.09.14 TODO:
     * Validate Filtering
     * - something must be selected
     * - textbox must have something
     */
    if (!empty($_POST['where']) && !empty($_POST['like']))
    {
        $where                      = $_POST['where'];
        $like                       = $_POST['like'];
        $and                        = " AND {$where} LIKE :{$where}";
        $prmProspects[":{$where}"]  = "%{$like}%";
    }
    // =========================================================================
    
    $sqlProspects   = $objProspects->selectAll($objProspects->id_user).' '.$and.$sort;
    $fetchProspects = $objData->db_read($db, $sqlProspects, $prmProspects, TRUE);
    if(!empty($fetchProspects['error']))
    {
        $objStatus->setMessage("<li>{$fetchProspects['error']}</li>");
        $objStatus->setClass("status_error");
        $columns    = NULL;
        $thead      = NULL;
        $tbody      = NULL;
        $rows       = NULL;
    }
    else
    {
        $columns    = array(
            array('title'=>'OPTIONS','field'=>NULL),
            array('title'=>'Prospect','field'=>'name'),
            array('title'=>'City','field'=>'address_city'),
            array('title'=>'ZIP','field'=>'address_zip5'),
        );
        $thead      = $formats->thead($columns);
        $tbody      = "<tbody>";        
        $rows       = $fetchProspects['result'];
        foreach($rows as $row)
        {
            $rowID              = htmlentities($row['id'], ENT_QUOTES, 'UTF-8');
            $rowName            = htmlentities($row['name'], ENT_QUOTES, 'UTF-8');
            $rowBranch          = htmlentities($row['branch'], ENT_QUOTES, 'UTF-8');
            $rowBuilding        = htmlentities($row['address_building'], ENT_QUOTES, 'UTF-8');
            $rowStreet          = htmlentities($row['address_street'], ENT_QUOTES, 'UTF-8');
            $rowUnit            = htmlentities($row['address_unit'], ENT_QUOTES, 'UTF-8');
            $rowCity            = htmlentities($row['address_city'], ENT_QUOTES, 'UTF-8');
            $rowState           = htmlentities($row['address_state'], ENT_QUOTES, 'UTF-8');
            $rowZIP5            = htmlentities($row['address_zip5'], ENT_QUOTES, 'UTF-8');
            $rowZIP4            = htmlentities($row['address_zip4'], ENT_QUOTES, 'UTF-8');
            $rowPhone           = htmlentities($row['phone'], ENT_QUOTES, 'UTF-8');
            $rowPhoneExtension  = htmlentities($row['phone_extension'], ENT_QUOTES, 'UTF-8');
            $rowFax             = htmlentities($row['fax'], ENT_QUOTES, 'UTF-8');
            $rowEmail           = htmlentities($row['email'], ENT_QUOTES, 'UTF-8');
            $rowWebsite         = htmlentities($row['website'], ENT_QUOTES, 'UTF-8');
            $rowDescription     = htmlentities($row['description'], ENT_QUOTES, 'UTF-8');
            $rowRemarks         = htmlentities($row['remarks'], ENT_QUOTES, 'UTF-8');
            $rowRecruiter       = htmlentities($row['recruiter'], ENT_QUOTES, 'UTF-8');

            // Formatting and Displaying

            $prospect_name          = $rowName;
            $prospect_branch        = $rowBranch;
            if(empty($prospect_branch))
            {
                $prospect_branch    = "N/A";
            }
            if(!empty($rowWebsite))
            {
                $prospect_name      = $links->outside($rowName, $rowWebsite, $rowName);
            }
            if($rowRecruiter == TRUE)
            {
                $prospect_name      .= "&nbsp;{$asterisk}";
            }

            $prospect_phone         = $formats->phone($rowPhone, $rowPhoneExtension);
            if(!empty($prospect_phone))
            {
                $prospect_phone     = '<br />'.$prospect_phone;
            }
            $prospect_fax           = $formats->phone($rowFax, NULL);
            $prospect_email         = $links->email("Prospect", $rowEmail);
            $prospect_zip           = $formats->zip($rowZIP5, $rowZIP4);

            $prospect_street        = NULL;
            if(!empty($rowStreet))
            {
                $prospect_street    = '<br />'.$rowStreet;
            }
            $prospect_building      = NULL;
            if(!empty($rowBuilding))
            {
                $prospect_building  = '<br />'.$rowBuilding;
            }
            $prospect_unit          = NULL;
            if(!empty($rowUnit))
            {
                $prospect_unit      = '<br />'.$rowUnit;
            }

            $prospect_citystate     = $rowCity.', '.$rowState;
            
            $dud = array(
                'detail'    => $links->inside("Detail of This Prospect",
                        "detail.php?id={$rowID}",
                        "Detail"),
                'update'    => $links->inside("Update This Prospect",
                        "update.php?id={$rowID}",
                        "Update"),
                'delete'    => "<a title=\"Delete This Prospect\" href=\"delete.php?id={$rowID}\" class=\"delete\">Delete</a>",
            );

            $tbody.="<tr>
                <td class=\"td_dud\">
                {$dud['detail']}
                <br />
                {$dud['update']}
                <br />
                {$dud['delete']}
                </td>
                <td class=\"td_detail\">
                <strong>{$prospect_name}</strong>
                <br /><em>Branch:&nbsp;</em>{$prospect_branch}
                {$prospect_building}
                {$prospect_street}
                {$prospect_unit}
                {$prospect_phone}
                </td>
                <td class=\"td_detail\">{$prospect_citystate}</td>
                <td class=\"td_detail\">{$prospect_zip}<br /><br />{$prospect_email}</td>
                </tr>";
        }
        $tbody  .= "</tbody>";
    }
    
    // =========================================================================
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require_once ('_table.php');
    require_once ($page['path'].'_views/footer.php');