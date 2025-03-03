<?php

if (! function_exists('thaiNumberDigit')) {
    function thaiNumberDigit($number) {
        return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
        array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
        $number);
    }
}

if (! function_exists('selectStaff')) {
    function selectStaff() {
        $staff = App\Models\Personnel::when(auth()->user()->is_staff, function () {
            return App\Models\Personnel::where('user_id', auth()->user()->id);
        })->pluck('full_name', 'id');
        return $staff;
    }
}

if (! function_exists('thaiYears')) {
    function thaiYears() {

    }
}
