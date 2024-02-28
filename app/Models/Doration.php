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


class Doration extends Model
{
    use HasFactory;
    protected $fillable =['user_id','donor_id'];

public function user()
{
    return $this->belongsTo(User::class);
}
    
}
