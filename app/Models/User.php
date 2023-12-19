<?php

namespace App\Models;

use App\Services\OtpService;
use App\Services\SmsService;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use DateTimeInterface;

/**
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $token
 * @property string $status
 * @property string $theme
 */

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'token',
        'status',
        'theme',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setTheme(string $theme)
    {
        $this->theme = $theme;
        $this->save();
    }

    public function theme():array
    {
        $classes = [
            'default' => [
                'body' => '',
                'navbar' => ' navbar-light ',
                'sidebar' => 'sidebar-dark-primary ',
            ],
            'light' => [
                'body' => '',
                'navbar' => ' navbar-white ',
                'sidebar' => ' sidebar-light-lightblue '
            ],
            'dark' => [
                'body' => ' dark-mode ',
                'navbar' => ' navbar-dark ',
                'sidebar' => ' sidebar-dark-secondary '
            ]
        ];
        return $classes[$this->theme] ?? [
                'body' => '',
                'navbar' => ' navbar-light ',
                'sidebar' => ' sidebar-dark-primary ',
            ];
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function otpSend(){
        $rand = rand(10000,99999);
        $otp = Otp::create([
            'model' => User::class,
            'model_id' => $this->id,
            'phone' => $this->phone,
            'code' => Hash::make($rand),
            'attemp' => 0,
            'phone_name' => 'Samsung',
            'status' => 0,
        ]);
        $message = "Parolni hech kimga bermang. Sizning parol: {$rand}";
        $service = SmsService::login();
        $token = $service["data"]["token"];
        $send = SmsService::send([
            'token' => $token,
            'mobile_phone' => '+998'.$otp->phone,
            'message' => $message,
        ]);
        return $send ? true : false;
    }

    public function otpCheck($code){
        $otp = Otp::where('model',User::class)
            ->where('model_id',$this->id)
            ->latest()
            ->first();
        if (!empty($otp)){
            if ($otp->status == 1){
                return [
                    'message' => 'Bu sms allaqachon tasdiqlangan!!!',
                ];
            }

            /*if (strtotime($otp->created_at) > date("Y-m-d H:i:s", strtotime("-2 minute"))){
                return [
                    'message' => 'Time Error!!!',
                ];
            }*/

            if (!empty($otp) and $otp->attemp >= 3){
                return [
                    'message' => 'Urunishlar soni oshib ketdi!!!',
                ];
            }

            if (Hash::check($code,$otp->code)){
                $otp->update([
                    'status' => 1,
                ]);
                return true;
            }else{
                $otp->update([
                    'attemp' => $otp->attemp + 1
                ]);
                return [
                    'message' => 'Parol xato!!!',
                ];
            }
        }else{
            return [
                'message' => 'Otp topilmadi!!!',
            ];
        }
    }
}
