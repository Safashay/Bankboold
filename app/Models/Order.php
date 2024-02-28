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


class Order extends Model
{
    use HasFactory;

    protected $fillable =[
      
        'num_order',
        'hospital_id',
        'user_id',
   ];
  

    public function sick()
    {
        return $this->belongsTo(Sick::class);
    }

    public function hospital()
    {
      return $this->belongsTo(Hospital::class);
    }
    public function scopejion($query)
    {
      return $query->join('users','orders.user_id','=','users.id')
        ->join('sicks','users.id','=','sicks.user_id') ;
    }

}
