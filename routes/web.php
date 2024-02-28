<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\SickController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\HospitalAcess;
use App\Http\Middleware\BanklAcess;
use App\Http\Middleware\AdminAcess;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
   Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home',[HomeController::class, 'index'])->name('home');
    Route::view('/order','pages.order');
    Route::view('/passward','pages.Password')->name('passward');
    Route::get('/bank/index',[DonorController::class, 'index'])->name('bank_index');
    Route::get('/log/from', [LoginController::class, 'index'])->name('log_from');
    Route::get('/login/list',[LoginController::class, 'list_login'])->name('list_login');    
    Route::post('/login/update',[LoginController::class, 'update'])->name('login_update');
    Route::post('/contact',[LoginController::class, 'contact'])->name('contact');       
    Route::middleware(['auth','AdminAcess'])->group(function(){
        Route::get('/log/from', [LoginController::class, 'index'])->name('log_from');
        Route::get('/login/list',[LoginController::class, 'list_login'])->name('list_login'); 
        Route::get('/login/show/{id}',[LoginController::class, 'show'])->name('show_login');
        Route::post('/sorte/login',[LoginController::class, 'store'])->name('login_store');
        Route::get('/index/login',[LoginController::class, 'index'])->name('index_login');
       Route::get('/login/search',[LoginController::class, 'search'])->name('login_search');
       Route::get('/login/{id}',[LoginController::class, 'delete'])->name('delet_login');
    });
    Route::prefix('hospital')->middleware(['auth','HospitalAcess'])->group(function(){
        Route::get('/order',[HospitalController::class, 'order'])->name('order_hospital');
        Route::get('/sick/order/form/{id}',[HospitalController::class, 'order_form'])->name('order_form_sick');
        Route::get('/index',App\Http\Livewire\Search::class)->name('hospital_index');
        Route::get('/search',[HospitalController::class, 'search'])->name('hospital_search');
        Route::get('/show/{id}',[HospitalController::class, 'show'])->name('hospital_show');
        Route::post('/store',[HospitalController::class, 'store'])->name('hospital_store');
        Route::view('/sick','pages.sick')->name('sick');
        Route::post('/store',[SickController::class, 'store'])->name('store_sick');
         Route::view('/sick', 'pages.sick')->name('sick');  
    });
    Route::prefix('bank')->middleware(['auth','BankAcess'])->group(function(){
        Route::get('/order',[DonorController::class, 'order'])->name('bank_order');
        Route::get('/search',[DonorController::class, 'search'])->name('bank_search');
        Route::post('/store',[DonorController::class, 'store'])->name('bank_store');
        Route::view('/order/form','pages.order')->name('order_bank');
        Route::post('/store/add',[DonorController::class, 'addDonor'])->name('add_donor');   
        Route::view('/donor', 'pages.donor' )->name('donor');  
    });
    
        

 