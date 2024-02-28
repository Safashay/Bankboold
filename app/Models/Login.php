<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Stock;
use App\Models\User;
use App\Models\Order;
use App\Models\Hospital;
use App\Models\Donor;
use App\Models\Login;
use App\Models\Sick;
use App\Models\Doration;
use App\Models\AccountHospital;
use App\Models\AccountDonor;

class Login extends Authenticatable
{ use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
      'name',
       'email',
       'password',
       'role_id',
       'statue',
   ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 



public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function login_hospital()

    {
        return $this->hasOne(AccountHospital::class);
    }
    public function scopethrough($query)
  {
       return $query->join('account_hospitals','account_hospitals.login_id','=','logins.id')
      ->join('hospitals','hospitals.id','=','account_hospitals.hospital_id');
  }

    public function login_donor()

    {
        return $this->hasOne(AccountDonor::class);
    }



}
