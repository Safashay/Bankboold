<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        if(auth::user()->role_id==1)
        {
            return redirect('login/list');
        }
        if(auth::user()->role_id==2)
        {
          if(auth::user()->statue=='hospital')
            {
                return view('pages.sick');
            }
            else
            {
                return view('pages.donor');
            }
        }
    
    }
}
