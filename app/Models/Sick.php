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


class Sick extends Model
{
    use HasFactory;
    protected $fillable =['user_id','hospital_id'];

public function order()
{
    return $this->hasOne(order::class);
}

public function user()
    {
        return $this->belongsTo(user::class);
    }
}
