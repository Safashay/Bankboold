<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Hospital;
use App\Models\User;
use App\Models\Sick;
use App\Models\Doration;
use Illuminate\Support\Facades\Auth;
class SickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.user', ['users' => $users]);
    }
public function store(Request $request)
{
     $valitation = $request->validate([
        'name' => 'required',
        'regoin' => 'required',
        'email' => 'required',
        'number' => 'required|unique:users',
        'name' => 'required',
        'stree' => 'required',
        'mobile' => 'required',
        'grp_bld' => 'required', 
    ]);
    $user=User::where('number',$request->number)->first();
    if(!$user)
    {
        $user =User::create([
            'name'=>$request->name,
            'regoin'=>$request->regoin,
            'email'=>$request->email,
            'number' =>$request->number,
            'stree'=>$request->stree,
            'mobile' =>$request->mobile,
            'grp_bld' =>$request->grp_bld,
            'statue'=>"sick",
        ]);
    }
    else
    {
        $user->update([
            'statue'=>"sick",
        ]);
    }
    $donor=Doration::where('user_id',$user->id)->first();
    if($donor)
    {
        $donor->delete();
    }
    if ($sick=Sick::where('user_id',$user->id)->first()){
        $sick->update([
            'hospital_id'=>auth::user()->login_hospital->hospital_id,
        ]);
    }
    else{
        Sick::create([
            'hospital_id'=>auth::user()->login_hospital->hospital_id,
            'user_id' =>$user->id,
        ]);
    }
    return back()->with(['status'=>' add  '.$request->name]); 
}

}
