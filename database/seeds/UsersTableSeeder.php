<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        DB::table('role_user')->truncate();
        $this->call(RolesTableSeeder::class);
        $adminRole =Role::where('name','أدمن')->first();
        $ownerRole =Role::where('name','صاحب العقار')->first();
        $userRole =Role::where('name','مستخدم')->first();

        $admin = User::create([
            'firstName' => 'shaimaa',
            'middleName' => 'aziz',
            'lastName' => 'abu Harb',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
           'mobile' =>'059912345',
           'street' =>'nasser',
           'city' => 'Gaza',
           'image' =>'1595425812.jpg'
        ]);

        $owner = User::create([
            'firstName' => 'تالا',
            'middleName' => 'عبد',
            'lastName' => 'أبو حرب',
            'email' => 's@gmail.com',
            'password' => bcrypt('admin'),
           'mobile' =>'0599012345',
           'street' =>'النصر',
           'city' => 'غزة',
           'image' =>'1595430914.jpg'
        ]); 

        $user = User::create([
            'firstName' => 'سندس',
            'middleName' => 'عبد العزيز',
            'lastName' => 'أبو حرب',
            'email' => 's11@gmail.com',
            'password' => bcrypt('admin'),
           'mobile' =>'0599012345',
           'street' =>'النصر',
           'city' => 'غزة',
           'image' =>'1595427940.jpg'
        ]);
        $user2 = User::create([
            'firstName' => 'gg',
            'middleName' => 'عبد العزيز',
            'lastName' => 'أبوg',
            'email' => 'g@gmail.com',
            'password' => bcrypt('admin'),
           'mobile' =>'0599012345',
           'street' =>'النصر',
           'city' => 'غزة',
            'image' => '1595430914.jpg'

        ]);
        $owner2 = User::create([
            'firstName' => 'a',
            'middleName' => 'عبد العزيز',
            'lastName' => 'أبو',
            'email' => 'a2@gmail.com',
            'password' => bcrypt('admin'),
           'mobile' =>'0599012345',
           'street' =>'النصر',
           'city' => 'غزة',
            'image' => '1595430914.jpg'
        ]);
   
        $admin->roles()->attach($adminRole) ; 
        // dd($adminRole);
        $owner->roles()->attach($ownerRole) ;
        $user->roles()->attach($userRole) ;
        $user2->roles()->attach($userRole) ;
        $owner2->roles()->attach($ownerRole) ;
    }
}
