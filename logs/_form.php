<form id="form_log" method="post" action="">
    <fieldset>
        <legend>Log</legend>
        <p>
            <?php echo $dagger; ?> = Fields originally suggested by the Work Search form
            in use at the Illinois Department of Employment Security (IDES).
            Required or not, at minimum the Log forms shall include these fields.
        </p>
        <p>
            <?php echo $asterisk; ?> = Required fields.
        </p>
        <ul id="status" name="status" class="<?php echo $objStatus->class; ?>">
            <?php echo $objStatus->message; ?>
        </ul>
        <div class="form_row">
            <label id="lblWeekEnding">Week Ending (Saturday):<?php echo $dagger.$asterisk; ?></label>
            <select name="week_ending"><?php echo $optWeekEnding; ?></select>
        </div>
        <div class="form_row">
            <label id="lblContactDate">Contact Date:<?php echo $dagger.$asterisk; ?></label>
            <select name="contact_date_mm"><?php echo $optContactDateMM; ?></select>
            <select name="contact_date_dd"><?php echo $optContactDateDD; ?></select>
            <select name="contact_date_yyyy"><?php echo $optContactDateYYYY; ?></select>
        </div>
        <div class="form_row">
            <label id="lblWork">Type of Work Sought:<?php echo $dagger.$asterisk; ?></label>
            <input type="text" name="work" value="<?php echo $objLog->work; ?>" maxlength="255" size="40" />
        </div>
        <div class="form_row">
            <label id="lblCompany">Company:<?php echo $dagger.$asterisk; ?></label>
            <select name="company"><?php echo $optCompanies['options']; ?></select>
        </div>
        <div class="form_row">
            <label id="lblContact">Contact:<?php echo $dagger.$asterisk; ?></label>
            <select name="contact"><?php echo $optContacts['options']; ?></select>
        </div>
        <div class="form_row">
            <label id="lblContactMethod">Method of Contact:<?php echo $dagger.$asterisk; ?></label>
            <div class="rbl">
                <?php echo $rblContactMethods['options']; ?>
            </div>
        </div>
        <div class="form_row">
            <label id="lblSpecify">Specify Contact Method Detail:</label>
            <input type="text" name="specify" value="<?php echo $objLog->specify; ?>" maxlength="255" size="40" />
        </div>
        <div class="form_row">
            <label id="lblResults">Contact Result:<?php echo $dagger; ?></label>
            <textarea name="results" rows="7" cols="33"><?php echo $objLog->results; ?></textarea>
        </div>
        <div class="form_row">
            <label id="lblRemarks">Personal Remarks/Notes:</label>
            <textarea name="remarks" rows="7" cols="33"><?php echo $objLog->remarks; ?></textarea>
        </div>
    </fieldset>
    <div class="button_row">
        <input type="submit" value="<?php echo $page['mode']; ?>" />
    </div>
</form>
<script language="javascript" type="text/javascript" src="_form.js"></script>