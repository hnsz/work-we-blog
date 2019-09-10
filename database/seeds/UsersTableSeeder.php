<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                
                'name' => 'hns',
                'email' => 'hansrudolfw@gmail.com',
                'password' => Hash::make('welkom01'),
                'created_at' => Carbon::now()
        ]);
    }
}
