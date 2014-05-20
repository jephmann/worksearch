<?php
/**
 * Description of Input
 * Helper class which populates list inputs and sets default values (RBLs, DDLs, etc.)
 * @author Jeffrey
 */
class Input {
    
    public static function ddl_years($default)
    {
        $optYears   = '<option value="">Year</option>';
        $thisYear   = date('Y');
        for($name = ($thisYear - 125); $name <= $thisYear; $name++)
        {
            $value  = $name;
            if($default == $value)
            {
                $selected   = " selected";
            }
            else
            {
                $selected   = NULL;
            }

            $optYears .= "<option{$selected} value=\"{$value}\">{$name}</option>";
        }
        return $optYears;
    }
        
    public static function ddl_months($default)
    {
        $optMonths  = '<option value="">Month</option>';
        if($default <= 9)
        {
            $default = ('0'.$default);
        }
        $months = array(
            array(
                'value' => '01',
                'name'  => 'January',
            ),
            array(
                'value' => '02',
                'name'  => 'February',
            ),
            array(
                'value' => '03',
                'name'  => 'March',
            ),
            array(
                'value' => '04',
                'name'  => 'April',
            ),
            array(
                'value' => '05',
                'name'  => 'May',
            ),
            array(
                'value' => '06',
                'name'  => 'June',
            ),
            array(
                'value' => '07',
                'name'  => 'July',
            ),
            array(
                'value' => '08',
                'name'  => 'August',
            ),
            array(
                'value' => '09',
                'name'  => 'September',
            ),
            array(
                'value' => '10',
                'name'  => 'October',
            ),
            array(
                'value' => '11',
                'name'  => 'November',
            ),
            array(
                'value' => '12',
                'name'  => 'December',
            ),
        );
        for($m=0;$m<=11;$m++)
        {
            $value  = $months[$m]['value'];
            $name   = $months[$m]['name'];
            if($default == $value)
            {
                $selected   = " selected";
            }
            else
            {
                $selected   = NULL;
            }
            $optMonths  .= "<option{$selected} value=\"{$value}\">{$name}</option>";
        }
        return $optMonths;
    }
    
    public static function ddl_days($default)
    {
        $optDays    = '<option value="">Day</option>';
        if($default <= 9)
        {
            $default    = ('0'.$default);
        }
        for($name = 1; $name <= 31; $name++) {
            $value  = $name;
            if($value <= 9)
            {
                $value  = ('0'.$value);
            }
            if($default == $value)
            {
                $selected   = " selected";
            }
            else
            {
                $selected   = NULL;
            }
            $optDays .= "<option{$selected} value=\"{$value}\">{$name}</option>";
        }
        return $optDays;
    }
    
    public static function ddl_weeks($weekday, $default)
    {
        $optWeeks   = '<option value="">=== Week Date ===</option>';
        $startdate  = date("Y-m-d", strtotime("this {$weekday} -26 weeks"));
        $enddate    = date("Y-m-d", strtotime("this {$weekday} +26 weeks"));
        while ($startdate < $enddate)
        {
            $selected   = NULL;
            $startdate  = date("Y-m-d", strtotime("+7 days", strtotime($startdate)));
            if((!empty($default)) && ($startdate === $default))
            {
                $selected   = " selected";
            } else {
                $selected   = NULL;
            }
            $display    = date("F j, Y", strtotime($startdate));
            $optWeeks    .= "\n<option{$selected} value=\"{$startdate}\">{$display}</option>";
        }
        return $optWeeks;
    }
    
    public static function ddl_options($db, $default, $value, $display, $object, $concatFields, $sortFields)
    {
        $result = array(
            'error' => NULL,
            'options'   => NULL,
        );
        $error = NULL;
        $query = NULL;
        if(empty($concatFields) || empty($sortFields))
        {
            $query = $object->options($value, $display);
        }
        else
        {
            $query = $object->options_concat($value, $concatFields, $display, $sortFields);
        }
        try
        {
            $statement = $db->prepare($query);
            $statement->execute();
        }
        catch(PDOException $ex)
        {
            $error  = ("<li>Failed to run {$object->table} DropDownList query: " . $ex->getMessage()) . "</li>";
        }
        $ddlOptions = "\n<option value=\"\">=== PLEASE SELECT ===</option>";
        $selected = NULL;
        $options = $statement->fetchAll();
        foreach($options as $option)
        {
            $optDisplay = $option["{$display}"];
            $optValue   = $option["{$value}"];
            if($default == $optValue)
            {
                $selected = " selected";
            }
            else
            {
                $selected = "";
            }
            $ddlOptions .= "\n<option{$selected} value=\"{$optValue}\">{$optDisplay}</option>";
        }
        $result['options']  = $ddlOptions;
        $result['error']    = $error;
        return $result;
    }
        
    public static function rbl_gender($name, $gender)
    {
        $rblGender      = NULL;
        $checkedMale    = NULL;
        $checkedFemale  = NULL;
        $checked        = " checked=\"checked\"";
        if($gender=="M")
        {
            $checkedMale    = $checked;
            $checkedFemale  = NULL;
        }
        if($gender=="F")
        {
            $checkedFemale  = $checked;
            $checkedMale    = NULL;
        }
        $rblGender .= "\r<input name=\"{$name}\" type=\"radio\" value=\"M\"{$checkedMale} /> Male";
        $rblGender .= "\r<input name=\"{$name}\" type=\"radio\" value=\"F\"{$checkedFemale} /> Female";
        $rblGender .= "\r";
        return $rblGender;
    }
    
    public static function rbl_truefalse($name, $boolean)
    {
        $checkedTrue    = NULL;
        $checkedFalse   = NULL;
        $checked        = "checked=\"checked\"";
        if($boolean==TRUE)
        {
            $checkedTrue    = $checked;
        }
        else
        {
            $checkedFalse   = $checked;
        }        
        $rblTrueFalse = "<input
            name=\"{$name}\"
            type=\"radio\"
            value=\"1\"
            {$checkedTrue} /> Yes
            <input
            name=\"{$name}\"
            type=\"radio\"
            value=\"0\"
            {$checkedFalse} /> No";
        return $rblTrueFalse;
    }
    
    public static function rbl_options($db, $default, $input, $display, $value, $object, $orientation)
    {
        $result = array(
            'error' => NULL,
            'options'   => NULL,
        );
        $error = NULL;
        $query = $object->options($value, $display);
        try
        {
            $statement = $db->prepare($query);
            $statement->execute();
        }
        catch(PDOException $ex)
        {
            $error  = ("<li>Failed to run {$object->table} RadioButtonList query: " . $ex->getMessage()) . "</li>";
        }
        $rblOptions = NULL;
        $checked = NULL;
        $options = $statement->fetchAll();
        foreach($options as $option)
        {
            $optName = $option["{$display}"];
            $optValue = $option["{$value}"];
            if($default == $optValue)
            {
                $checked = " checked";
            }
            else
            {
                $checked = "";
            }
            $rblOptions .= "\n<input{$checked} type=\"radio\" name=\"{$input}\" value=\"{$optValue}\" />{$optName}";
            if($orientation == "v")
            {
                $rblOptions .= "<br />";
            }
            else
            {
                $rblOptions .= "&nbsp;&nbsp;";
            }
        }
        $result['options']  = $rblOptions;
        $result['error']    = $error;
        return $result;
    }
    
}

