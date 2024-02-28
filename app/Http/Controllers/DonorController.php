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
class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders =Order::jion()->paginate(20);
        return view('pages.list_order', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {   $orders =User::jion()->where('grp_bld',"like",$request->type)->get();
        return view('pages.list_order', ['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validated = $request->validate([
            'donor_name'=> 'required',
           'donor_address'=> 'required',
           'donor_email'=> 'required',
           'donor_moblie'=> 'required|min:10|max:10',
           ]);
           $donor=Donor::where('donor_moblie',$request->donor_moblie)->first();
           if(!$donor)
           {
               $user =User::create([
                'donor_moblie'=>$request->donor_moblie,
                'donor_name'=>$request->donor_name,
                'donor_address' =>$request->donor_address,
                'donor_email' => $request->donor_email,
               ]);
           }
    }
    public function addDonor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'regoin' => 'required',
            'email' => 'required',
            'number' => 'required',
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
                'statue'=>"donor",
            ]);
        }
        else
        {
            $user->update([
                'statue'=>"donor",
            ]);
        }
        $sick=Sick::where('user_id',$user->id)->first();
        if($sick)
        {
            $sick->delete();
        }
        if ($donor=Doration::where('user_id',$user->id)->first()){
            $donor->update([
                'donor_id'=>auth::user()->login_donor->donor_id,
            ]);
        }
        else{
            Doration::create([
                'donor_id'=>auth::user()->login_donor->donor_id,
                'user_id' =>$user->id,
            ]);

        }
      return back()->with(['status'=>'add '.$request->name]);
    }
    public function order(Request $request)
    {
       $type=$this->selectTypeBlood($request);
       $new_num=$request->num;
       $orders =Order::jion()->wherein('grp_bld',$type)->get();
       if(isset($orders) && $orders->count()>0)
       {
           foreach ($orders as $order)
           {
                $new_num=$new_num-$order->num_order;
                if ($new_num>=0)
                {
                    $order->delete ();
                }
                else 
                {
                    $new_num=$new_num*-1;
                    $order->num_order=$new_num;
                    $order->update ();
                    return redirect('bank/order/form')->with(['statue'=>'add secsess']); 
                }
           }
       }
       $stocks=Stock::where([['bld_group',$request->bld_group],['donor_id',$request->donor_id]])->first(); 
       if(isset($stocks) && $stocks->count()>0)
       {
           $stock->stk_num=$new_num+$stock->stk_num;
           $stock->update(); 
           return redirect('bank/order/form');
       }
       else
       {
           $stock=new stock; 
           $stock->stk_num=$new_num; 
           $stock->bld_group=$request->bld_group; 
           $stock->donor_id=auth::user()->login_donor->donor_id; 
           $stock->save(); 
           return redirect('bank/order/form');
       }
    }
    private function selectTypeBlood($request)
    {
        if($request->bld_group=='A+') {
            $type=["A+","AB+"];
        }
        elseif($request->bld_group=='B+') {
         $type=["B+","AB+"];
        }
        elseif($request->bld_group=='AB+') {
         $type=["AB+"];
        }
        elseif($request->bld_group=='O+') {
         $type=["A+","O+","B+","AB+"];
       }
       elseif($request->bld_group=='O-') {
         $type=["A+","O+","B+","AB+","A-","O-","B-","AB-"];
       }
       elseif($request->bld_group=='AB-') {
         $type=["AB+","AB-"];
        }
        elseif($request->bld_group=='B-') {
         $type=["B+","AB+","B-","AB-"];
        }
        else {
         $type=["A+","AB+","A-","AB-"];
        }
        return $type;
    }
 } 

