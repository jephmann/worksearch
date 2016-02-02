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
        $optMonths  = '\r<option value="">=== Month ===</option>';
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
        $ctMonths = count($months);
        for($m=0;$m<$ctMonths;$m++)
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
            $optMonths  .= "\r<option{$selected} value=\"{$value}\">{$name}</option>";
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
            $optDays .= "\r<option{$selected} value=\"{$value}\">{$name}</option>";
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
    
    public static function ddl_options($db, $default, $value, $display, $object, $concatFields=NULL, $sortFields=NULL)
    {
        $result = array(
            'error'     => NULL,
            'options'   => NULL,
        );
        $error = NULL;
        $query = NULL;
        //$table = $object->table;
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
        $selected   = NULL;
        $options    = $statement->fetchAll();
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
        $rbl            = NULL;
        $checked        = " checked=\"checked\"";
        $checkedMale    = NULL;
        $checkedFemale  = NULL;        
        
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
        
        $rbPairs    = array(
            array(
                'value'     => 'M',
                'checked'   => $checkedMale,
                'legend'    => 'Male',
            ),
            array(
                'value'     => 'F',
                'checked'   => $checkedFemale,
                'legend'    => 'Female',
            ),            
        );
        $ctPairs    = count($rbPairs);
        
        for($i=0; $i<$ctPairs; $i++)
        {
            $rbl .= self::make_rb($name,
                $rbPairs[$i]['value'],
                $rbPairs[$i]['checked'],
                $rbPairs[$i]['legend']);
        }
        
        return $rbl;
    }
    
    public static function rbl_truefalse($name, $boolean)
    {
        $rbl            = NULL;
        $checked        = " checked=\"checked\"";
        $checkedTrue    = NULL;
        $checkedFalse   = NULL;
        
        if($boolean)
        {
            $checkedTrue    = $checked;
        }
        else
        {
            $checkedFalse   = $checked;
        }
        
        $rbPairs    = array(
            array(
                'value'     => 1,
                'checked'   => $checkedTrue,
                'legend'    => 'Yes',
            ),
            array(
                'value'     => '0',
                'checked'   => $checkedFalse,
                'legend'    => 'No',
            ),            
        );
        $ctPairs    = count($rbPairs);
        
        for($i=0; $i<$ctPairs; $i++)
        {
            $rbl .= self::make_rb($name,
                $rbPairs[$i]['value'],
                $rbPairs[$i]['checked'],
                $rbPairs[$i]['legend']);
        }
        
        return $rbl;
    }
    
    public static function rbl_options($db, $default, $input, $display, $value, $object, $is_vertical)
    {
        $result = array(
            'error'     => NULL,
            'options'   => NULL,
        );
        $error = NULL;
        $query = $object->options($value, $display);
        $table = $object->table;
        try
        {
            $statement = $db->prepare($query);
            $statement->execute();
        }
        catch(PDOException $ex)
        {
            $error  = ("<li>Failed to run {$table} RadioButtonList query: " . $ex->getMessage()) . "</li>";
        }
        
        $rbl        = NULL;
        $checked    = " checked=\"checked\"";
        $options    = $statement->fetchAll();
        foreach($options as $option)
        {
            $optName    = $option["{$display}"];
            $optValue   = $option["{$value}"];
            if($default != $optValue)
            {
                $checked = NULL;
            }
            
            $rbl .= self::make_rb($input, $optValue, $checked, $optName);
        }
        $result['options']  = $rbl;
        $result['error']    = $error;
        return $result;
    }
    
    public static function make_rb($name, $value, $checked, $legend)
    {
        $rb = "\r<div>"
            . "\r<label>"
            . "\r<input type=\"radio\" name=\"{$name}\" value=\"{$value}\"{$checked}>"
            . "\r<span>{$legend}</span>"
            . "\r</label>"
            . "\r</div>";            
        return $rb;
    }
    
    public static function make_txt($id_label, $legend, $name, $value, $maxlength=100)
    {
        $input = "\r<label id=\"{$id_label}\">"
            . "\r<span>{$legend}</span>"
            . "\r<input type=\"text\" name=\"{$name}\" value=\"{$value}\" maxlength=\"{$maxlength}\">"
            . "\r</label>";
        return $input;
    }
    
    public static function make_eml($id_label, $legend, $name, $value)
    {
        $input = "\r<label id=\"{$id_label}\">"
            . "\r<span>{$legend}</span>"
            . "\r<input type=\"email\" name=\"{$name}\" value=\"{$value}\">"
            . "\r</label>";
        return $input;
    }
    
    public static function make_url($id_label, $legend, $name, $value)
    {
        $input = "\r<label id=\"{$id_label}\">"
            . "\r<span>{$legend}</span>"
            . "\r<input type=\"url\" name=\"{$name}\" value=\"{$value}\">"
            . "\r</label>";
        return $input;
    }
    
    public static function make_txtarea($id_label, $legend, $name, $value)
    {
        $input = "\r<label id=\"{$id_label}\">"
            . "\r<span>{$legend}</span>"
            . "\r<textarea name=\"{$name}\">{$value}</textarea>"
            . "\r</label>";
        return $input;
    }
    
    public static function make_rbl($id_label, $legend, $options)
    {
        $input = "\r<label id=\"{$id_label}\">"
            . "\r<span>{$legend}</span>"
            . "\r</label>"
            . "<div class=\"form-radio-buttons\">"        
            . "\r{$options}"
            . "\r</div>";
        return $input;
    }
    
    public static function make_ddl($id_label, $legend, $name, $options)
    {
        $input = "\r<label id=\"{$id_label}\">"
            . "\r<span>{$legend}</span>"
            . "\r<select name=\"{$name}\">"        
            . "\r{$options}"
            . "\r</select>"
            . "\r</label>";
        return $input;
    }
    
    public static function make_btn($type, $value, $text)
    {
        $input = "\r<button type=\"{$type}\" value=\"{$value}\">"
            . "\r{$text}"
            . "\r</button>";        
        return $input;
    }
    
}