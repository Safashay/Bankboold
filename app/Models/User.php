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

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'regoin',
        'stree',
        'id',
       'name',
       'email',
       'number',
       'mobile',
      'grp_bld',
     'statue'
   ];

   public function user_sick()
   {
      return $this->hasOne(Sick::class);
   }
    public function user_doration()
    {
    return $this->hasOne(Doration::class);
    }



    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

   public function order()
    {
        return $this->hasOne(Order::class);
    }
    public function scopejion($query){
        return $query->join('orders','orders.user_id','=','users.id')
        ->join('sicks','users.id','=','sicks.user_id');
    }

}
