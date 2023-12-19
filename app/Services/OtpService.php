<?php

namespace App\Services;

use App\Models\Otp;
use Illuminate\Support\Facades\Hash;

class OtpService
{
    public static function otp($data){
        Otp::create([
            'model' => $data['model'],
            'model_id' => $data['model_id'],
            'phone' => $data['phone'],
            'code' => Hash::make('12345'),
            'attemp' => 0,
            'phone_name' => 'Samsung',
            'status' => 0,
        ]);
        return true;
    }
}
