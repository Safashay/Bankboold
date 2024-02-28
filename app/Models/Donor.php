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
use App\Models\AccountDonor;

class Donor extends Model
{
    use HasFactory;
    protected $fillable = [
        'donor_name',
        'donor_regoin',
        'donor_stree',
        'donor_email',
        'donor_moblie',
       
];
public function order()
{
    return $this->belongsTo(Hospital::class);
}

public function donate()
{
    return $this->hasMany(AccountDonor::class);
}




}
