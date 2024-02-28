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


class Hospital extends Model
{
    use HasFactory;
    protected $fillable = [
       'hos_name',
       'hos_region',
        'hos_srtee',
        'hos_email',
        'hos_mobile',
];


public function orders()
{
    return $this->hasMany(Order::class);
}

public function sicks()
{
    return $this->hasMany(User::class);
}


public function logins()
{
    return $this->hasMany(AccountHospital::class);
}


}
