<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'firstName' => 'shaimaa',
            'middleName' => 'aziz',
            'lastName' => 'abu Harb',
            'email' => 'sh@gmail.com',
            'password' => bcrypt('admin'),
            'admin' => '1',
           'mobile' =>'059912345',
           'street' =>'nasser',
           'city' => 'Gaza'
        ]);

        $user = User::create([
            'firstName' => 'سندس',
            'middleName' => 'عبد العزيز',
            'lastName' => 'أبو حرب',
            'email' => 's@gmail.com',
            'password' => bcrypt('admin'),
            'admin' => '0',
           'mobile' =>'0599012345',
           'street' =>'النصر',
           'city' => 'غزة'
        ]);
    
    }
}
