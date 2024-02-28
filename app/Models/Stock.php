<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\stock;
use App\Models\user;
use App\Models\order;
use App\Models\hospital;
use App\Models\donor;
use App\Models\role;
use App\Models\login;
use App\Models\permission;
use App\Models\Scopes\OrderbyScope;


class Stock extends Model
{
    use HasFactory;
    protected static function booted():void
    {
        static::addGlobalScope(new OrderbyScope);
    }
    protected $fillable = [
       'stk_num',
       'bld_group',
       'donor_id',
       
];




    public function stocks()
    {
        return $this->hasMany(donor::class);
    }

    public function logins()
    {
        return $this->hasMany(login::class);
    }

}
