<?php 
namespace App\Models\Scopes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\scope;
use Illuminate\Database\Eloquent\Model;
class OrderbyScope implements Scope
{
    public function apply(Builder $builder,Model $model):void
    {
    $builder->orderBy('stk_num');
    }

}