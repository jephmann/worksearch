<?php
    function optYears($default)
    {
        $optYears='<option value="">Year</option>';
        $thisYear = date('Y');
        for($name=($thisYear-125);$name<=$thisYear;$name++)
        {
            $value = $name;
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

    function optMonths($default)
    {
        $optMonths='<option value="">Month</option>';
        if($default<=9)
        {
            $default = ('0'.$default);
        }
        $months = array(
            array(
                'value' => '01',
                'name' => 'January',
            ),
            array(
                'value' => '02',
                'name' => 'February',
            ),
            array(
                'value' => '03',
                'name' => 'March',
            ),
            array(
                'value' => '04',
                'name' => 'April',
            ),
            array(
                'value' => '05',
                'name' => 'May',
            ),
            array(
                'value' => '06',
                'name' => 'June',
            ),
            array(
                'value' => '07',
                'name' => 'July',
            ),
            array(
                'value' => '08',
                'name' => 'August',
            ),
            array(
                'value' => '09',
                'name' => 'September',
            ),
            array(
                'value' => '10',
                'name' => 'October',
            ),
            array(
                'value' => '11',
                'name' => 'November',
            ),
            array(
                'value' => '12',
                'name' => 'December',
            ),
        );
        for($m=0;$m<=11;$m++)
        {
            $value = $months[$m]['value'];
            $name = $months[$m]['name'];
            if($default == $value)
            {
                $selected   = " selected";
            }
            else
            {
                $selected   = NULL;
            }
            $optMonths .= "<option{$selected} value=\"{$value}\">{$name}</option>";
        }
        return $optMonths;
    }

    function optDays($default)
    {
        $optDays='<option value="">Day</option>';
        if($default<=9)
        {
            $default = ('0'.$default);
        }
        for($name=1;$name<=31;$name++){
            $value = $name;
            if($value<=9)
            {
                $value = ('0'.$value);
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
    
    function optWeeks($weekday, $default)
    {
        $optWeeks   = '<option value="">=== Week Date ===</option>';
        
        //$basedate   = date("Y-m-d", strtotime("this {$weekday}"));
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
            $display    = date("F d, Y", strtotime($startdate));
            $optWeeks    .= "\n<option{$selected} value=\"{$startdate}\">{$display}</option>";
        }
        
        
        
        return $optWeeks;
    }

?>
