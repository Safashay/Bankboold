<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donors')->insert([
            'donor_name' => 'bank',
            'donor_regoin' =>'regoin',
            'donor_stree' => 'stree',
            'donor_email' => 'bank@gmail.com',
            'donor_moblie'=> '098765431',
        ]);
    }
}
