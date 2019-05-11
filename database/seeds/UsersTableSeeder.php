<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // User::truncate();

        User::create([

        	'name'=>'admin',
        	'email'=>'admin@gmail.com',
        	'password'=> Hash::make('123456')
        	]);





    }
}
