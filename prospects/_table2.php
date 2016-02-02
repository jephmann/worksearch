<!-- PROSPECTS -->
<?php    
    $filter_options  = array(
        array(
            'value'     => 'name',
            'legend'    => 'Name',
        ),
        array(
            'value'     => 'address_city',
            'legend'    => 'City',
        ),
        array(
            'value'     => 'address_zip5',
            'legend'    => 'ZIP (5)',
        ),
    );    
    $rb_filter  = NULL;
    $ct_filter  = count($filter_options);
    $rb_value   = NULL;
    $rb_legend  = NULL;
    for($i=0;$i<$ct_filter;$i++)
    {
        $rb_value   = $filter_options[$i]['value'];
        $rb_legend  = $filter_options[$i]['legend'];        
        $rb_filter  .= Input::make_rb('where',$rb_value,NULL,$rb_legend);
    }
    /*
     * INPUTS
     */
    $rblFilter  = Input::make_rbl('filter', 'Search by', $rb_filter);
    $txtLike    = Input::make_txt('lblLike','Search on','like',NULL);
    $btnSubmit  = Input::make_btn('submit', 'filter', "Filter Prospect");
?>
<form class="form-labels-on-top" method="post">

    <div class="form-title-row">
        <h1>Prospects (Click arrows to sort)</h1>            
        <a title="Create a New Prospect" href="create.php">
            Create
        </a>
        <p>
            <?php echo $asterisk; ?> = Recruiting Firms
        </p>
        <ul id="status" class="<?php echo $objStatus->class; ?>">
            <?php echo $objStatus->message; ?>
        </ul>        
    </div>
    
    <div class="form-row">
        <?php echo $rblFilter; ?>
    </div>
    
    <div class="form-row">
        <?php echo $txtLike; ?>
    </div>
    <div class="form_row">
        <?php echo $btnSubmit; ?>
    </div>
</form>
<div class="table-responsive">
    <table class="table table-condensed table-striped table-bordered table-hover" width="50%">
        <?php echo $thead.$tbody; ?>
    </table>
</div>

<script language="javascript" type="text/javascript" src="_delete.js"></script>