<?php

if (! function_exists('money')) { //Check If Function Exist in another helper
    function money($amount){
        return 'Tk '.number_format($amount, 2);
    }
}


    function money_abs($amount){
        $amount1 = abs($amount);
        return 'Tk '.number_format($amount1, 2);
    }

if (! function_exists('pub_date')) {
    function pub_date($date){
        if($date == '' || $date == null){
            return '';
        }else{
            return date("d/m/Y", strtotime(str_replace("/", "-",  $date)));
        }
    }
}


if (! function_exists('pub_date_time')) {
    function pub_date_time($date){
        if($date == '' || $date == null){
            return '';
        }else{
            return date("d/m/Y h:ia", strtotime(str_replace("/", "-",  $date)));
        }
    }
}


if (! function_exists('db_date')) {
    function db_date($date){
        if($date == '' || $date == null){
            return null;
        }else{
            return date("Y-m-d", strtotime(str_replace("/", "-",  $date)));
        }
    }
}

    function invoice_n($numbers){
        return str_pad($numbers, 5, '0', STR_PAD_LEFT);
    }

     function ac_type($accountNumber){
         $strs = str_split($accountNumber,3);

         $output = '';
         foreach ($strs as $val){
             $output .= $val.'-';
         }

         return rtrim($output, "-");
     }

if (! function_exists('date_range')) { //Check If Function Exist in another helper
    function date_range($dateRange){
        $date_range = explode(' - ', $dateRange);
        $start_date = date("Y-m-d", strtotime(str_replace("/", "-",  $date_range[0])));
        $end_date = date("Y-m-d", strtotime(str_replace("/", "-",  $date_range[1])));

        return [$start_date, $end_date];
    }
}


if (! function_exists('date_time_range')) { //Check If Function Exist in another helper
    function date_time_range($dateRange){
        $date_range = explode(' - ', $dateRange);
        $start_date = date("Y-m-d H:i:s", strtotime(str_replace("/", "-",  $date_range[0]).' 00:00:00'));
        $end_date = date("Y-m-d H:i:s", strtotime(str_replace("/", "-",  $date_range[1]).' 23:59:59'));

        return [$start_date, $end_date];
    }
}

if (! function_exists('gn_date')) { //Check If Function Exist in another helper
    function gn_date($month, $year){
        $dates = [];
        if($month != ''){

            $total_day = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            $st_date = date('Y-m-d', strtotime($year.'-'.$month.'-01'));
            $st_date = strtotime($st_date);

            for ($i = 1; $i <= $total_day; $i++){
                $dates[] = date('d/m/Y', $st_date);
                $st_date = strtotime('+1 day', $st_date);
            }
        }
        return $dates;
    }
}

if (! function_exists('input_arr_check')) { //Check If Function Exist in another helper
    function input_arr_check(array $arr, $limit){
        $count_arr = 0;
        foreach ($arr as $val){
            if (empty($val)){
                $count_arr++;
            }
        }

        if($count_arr >= $limit){
            return false;
        }else{
            return true;
        }

    }
}


if (! function_exists('status_color')) { //Check If Function Exist in another helper
    function status_color($expireDate){
         $current_date = date('Y-m-d');
         //$notice_date = db_date($noticeDate);
         $expire_date = db_date($expireDate);

        $date1 = new DateTime($expire_date);
        $date2 = new DateTime($current_date);

        //$date3 = new DateTime($notice_date);

        if($expireDate == ''){
            return 'none';
        }else{
            $diff = $date2->diff($date1)->format("%r%a");

            //$diff2 = $date2->diff($date3)->format("%r%a");

            if($diff <= 0){
                return 'Red';
            }elseif ($diff > 0 && $diff < 180){
                return 'Yellow';
            }else{
                return 'Green';
            }
        }


    }
}




