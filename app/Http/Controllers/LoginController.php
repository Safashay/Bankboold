<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\DB;
use App\Models\Hospital;
use App\Models\AccountHospital;
use App\Models\AccountDonor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendView;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.login');
    }
    public function list_login()
    {
        $logins =Login::through()->get();
        return view('pages.list_login', ['logins' => $logins]);
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
          'name' => 'required',
          'email' => 'required',
          'password' => 'required',
       ]);
       $login=Login::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password' =>Hash::make($request->password),
           'statue'=>auth::user()->statue,
           'role_id'=>2
        ]); 
       if(auth::user()->statue=='hospital')
       {
         DB::table('account_hospitals')->insert([
            'login_id'=>$login->id,
            'hospital_id'=>auth::user()->login_hospital->hospital_id,
         ]);
       }
       elseif(auth::user()->statue=='bank')
       {
        DB::table('account_donors')->upsert([
            'login_id'=>$login->id,
            'donor_id'=>auth::user()->login_donor->donor_id,
         ]);
       }
        return  back()->with(['statue'=>'add'.$request->name]);   
       }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

      $logins=Login::where('id',$id)->first();
        return view('pages.show_login', ['logins' =>$logins]);
    }

    public function search(Request $request)
    {
        $logins =Login::through()->where('name','like','%'.$request->name.'%')->get();
        return view('pages.list_login', ['logins' => $logins]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */

    public function update(Request $request)
    {
        $validated = $request->validate([
            'user_passeword' => 'required',
          ]);
          $login =auth::user();
          $login->password=Hash::make($request->user_passeword);
          $login->update();
        return back()->with(['statue'=>'channge password to'.$request->user_passeword]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(auth::user()->statue=='hospital')
        {
            $logins= AccountHospital::where('login_id',$id)->first();
            $logins->delete();
        }
      
        elseif(auth::user()->statue=='bank')
        {
            $logins= AccountDonor::where('login_id',$id)->first();
            $logins->delete();
        }
        $login = Login::find($id);
        $login ->delete();
        return redirect('login/list');
    }
    public function contact(Request $request){
         $input=$request->all();
         Mail::send(new SendView($input));
         return back()->with(['statue'=>'ok send mail']);
    }
}
