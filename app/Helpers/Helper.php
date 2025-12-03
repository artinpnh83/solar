<?php

namespace App\Helpers;

class Helper
{
    public static function is_valid_national_code($national_code)
    {
        // اطمینان از اینکه کد ملی 10 رقمی است
        if (strlen($national_code) !== 10) {
            return false;
        }

        // تبدیل کد ملی به آرایه ارقام
        $digits = str_split($national_code);

        // وزن‌های ارقام
        $weights = [10, 9, 8, 7, 6, 5, 4, 3, 2, 1];

        // محاسبه مجموع ضرب ارقام در وزن‌های مربوطه
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += $digits[$i] * $weights[$i];
        }

        // محاسبه باقی‌مانده تقسیم بر ۱۱
        $remainder = $sum % 11;

        // محاسبه رقم کنترل
        $calculated_check_digit = 11 - $remainder;
        if ($calculated_check_digit == 11) {
            $calculated_check_digit = 0;
        }

        // مقایسه رقم کنترل محاسبه شده با رقم کنترل وارد شده
        return $calculated_check_digit == $digits[9];
    }

    public static function convert($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }
}
