<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;
use App\Models\User;
use App\Models\Order;
use App\Models\Hospital;
use App\Models\Donor;
use App\Models\Login;
use App\Models\Sick;
use App\Models\Doration;
use App\Models\AccountHospital;


class AccountDonor extends Model
{
    use HasFactory;
    protected $fillable = ['login_id','donor_id'];
    public function login()
    {
        return $this->belongTo(Login::class);
    }
    
    // public function order()
    // {
    //     return $this->hasOne(order::class);
    // }
    public function blood()
    {
        return $this->belongsTo(Donor::class);
    }
    

}
