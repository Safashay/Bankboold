<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendMailRegion;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Hospital;
use App\Models\User;
use App\Models\Sick;
use App\Models\Doration;
use Illuminate\Support\Facades\Auth;
class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $users=User::paginate(10);
        return view('pages.list_sick',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $users =User::where('name','like','%'.$request->name.'%')->get();
        return view('pages.list_sick', ['users' => $users]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $show_sick =User::find($id)->with('user_sick')->first();
        return view('pages.show_sick', ['show_sick' => $show_sick]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order_form($id)
    { 
        return view('pages.order_hospital',['id'=>$id]);   
    }
    public function order(Request $request)
    {
        $type=$this->selectTypeBoold($request);
        $new_num=$request->num;
        $stocks=Stock::wherein('bld_group',$type)->orderBy('stk_num','desc')->get();
        if(isset( $stocks) &&  $stocks->count()>0)
        {
            foreach ($stocks as $stock){
                $new_num=$stock->stk_num-$new_num;
                if ($new_num>=0)
                {
                    $stock->stk_num=$new_num;
                    $stock->update();
                    return redirect('sick');
                }
                else
                {
                    $stock->stk_num=0;
                    $stock->update();
                    $stock->delete();
                    $new_num=$new_num*-1;break;
                }
            }
        }
        else
        {
           
            $order=Order::where('user_id',$request->user_id)->first();
            if(!$order)
            {
                $order=Order::create([
                    'num_order'=>$new_num,
                    'hospital_id'=>auth::user()->login_hospital->hospital_id,
                    'user_id'=>$request->user_id,
                ]);
            }
            else
            {
                $order->update([
                    'num_order'=>$order->num_order+$new_num,
                   'hospital_id'=>auth::user()->login_hospital->hospital_id,
                ]);
            }
            $regoin=Hospital::find(auth::user()->login_hospital->hospital_id);
            $queries=User::select(['email','id']) ->where([['regoin',$regoin->hos_region],['statue','!=','sick']])->
              chunk(1,function($data)
               {
                 dispatch(new SendMailRegion($data));
              });
          
          
           
        }
        return redirect('bank/index');
    } 
    
    private function selectTypeBoold($request){
       if( $request->bld_group=='A+') {
           $type=["A+","AB+"];
        }
        elseif ( $request->bld_group=='B+') {
           $type=["B+","AB+"];
        }
        elseif ( $request->bld_group=='AB+') {
           $type=["AB+"];
        }
       elseif ( $request->bld_group=='O+') {
           $type=["A+","O+","B+","AB+"];
        }
       elseif ( $request->bld_group=='O-') {
           $type=["A+","O+","B+","AB+","A-","O-","B-","AB-"];
        }
       elseif ( $request->bld_group=='AB-') {
           $type=["AB+","AB-"];
        }
       elseif ( $request->bld_group=='B-') {
           $type=["B+","AB+","B-","AB-"];
        }
       else {
          $type=["A+","AB+","A-","AB-"];
        }
        return $type;
   }
}

    

   

