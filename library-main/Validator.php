<?php

class Validator {
    static public function string($data, $min = 0, $max = INF) {
        $data = trim($data);

        return is_string($data) 
            && strlen($data) >= $min 
            && strlen($data) <= $max;
    }

    static public function number($data, $min = 0, $max = INF) {
        $data = trim($data);

        return is_numeric($data) 
            && $data >= $min 
            && $data <= $max;
    }

//   static public function email($data) {
//        return filter_var($data, FILTER_VALIDATE_EMAIL);
//    }

    static public function password($data) {
        $minLength = 8;
        $maxLength = 255;
        
        $uppercaseRegex = '/[A-Z]/';
        $lowercaseRegex = '/[a-z]/';
        $numberRegex = '/[0-9]/';
        $specialCharRegex = '/[!@#$%^&*()\-_=+{};:,<.>]/';

        return strlen($data) >= $minLength &&
            strlen($data) <= $maxLength &&
            preg_match($uppercaseRegex, $data) &&
            preg_match($lowercaseRegex, $data) &&
            preg_match($numberRegex, $data) &&
            preg_match($specialCharRegex, $data);
    }

//   static public function date($data) {
//        $data2 = date_parse($data);
//        if ($data2["errors"] == []) {
//        return checkdate($data2["month"], $data2["day"], $data2["year"]);
//       } else {
//        return false;   
//       }
//    }

    static public function date($data)
    {
        if(empty($data))
        {
            return false;
        }
        else if(str_contains($data, '-') && count(explode('-', $data)) == 3)
        {   
            list($year, $month, $day) = explode('-', $data);
            if ($year != null && $month != null && $day != null) {
                return checkdate($month, $day, $year);
            }
        }
        else
        {
            return false;
        }
}
}
