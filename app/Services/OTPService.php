<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class OTPService
{
    public function generate($phone)
    {
        $code = rand(100000, 999999);
        Cache::put('otp_'.$phone, $code, now()->addMinutes(5));

        return $code;
    }

    public function verify($phone, $code)
    {
        return Cache::get('otp_'.$phone) == $code;
    }
}
