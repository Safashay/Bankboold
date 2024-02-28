<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $hospital= DB::table('logins')->insert([
           'name'=>'admin hospital',
           'email'=>'hospitaladmin@gmail.com',
           'password'=>Hash::make('123456789'),
            'role_id'=>1,
           'statue'=>'hospital'
        ]);
      
      

    
       
         
        
    }
}
