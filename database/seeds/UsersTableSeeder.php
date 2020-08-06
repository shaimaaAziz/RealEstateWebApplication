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
        $owner1 = User::create([
            'firstName' => 'عبد العزيز',
            'middleName' => 'عبد العزيز',
            'lastName' => 'أبو حرب',
            'email' => 'azizmh66@hotmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0599866351',
            'street' =>'النصر',
            'city' => 'غزة',
            'image' => '1.png'
        ]);

        $owner2 = User::create([
            'firstName' => 'حسام ',
            'middleName' => 'ابو حماد',
            'lastName' => 'الأستاذ',
            'email' => 'owner1@gmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0599893457',
            'street' =>'النصر',
            'city' => 'غزة',
            'image' => '1.png'
        ]);
        $owner3 = User::create([
            'firstName' => 'Abo Ahmed',
            'middleName' => 'Ahmed',
            'lastName' => 'Hamdan',
            'email' => 'owner2@gmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0592230728',
            'street' =>'النصر',
            'city' => 'غزة',
            'image' =>'1.png'
        ]);
        $owner4 = User::create([
            'firstName' => 'Ahmed  ',
            'middleName' => 'Ahmed',
            'lastName' => 'Swilem',
            'email' => 'owner3@gmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0597106483',
            'street' =>'تل الهوا',
            'city' => 'غزة',
            'image' => '1.png'
        ]);
        $owner5 = User::create([
            'firstName' => 'Hijjo Noor',
            'middleName' => 'Noor',
            'lastName' => 'Noor',
            'email' => 'owner4@gmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0598152153',
            'street' =>'النصر',
            'city' => 'غزة',
            'image' =>'1.png'
        ]);
        $owner6 = User::create([
            'firstName' => 'Ramy ',
            'middleName' => 'Ahmed',
            'lastName' => 'Mahfouz',
            'email' => 'owner5@gmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0595261177',
            'street' =>'تل الهوا',
            'city' => 'غزة',
            'image' => '1.png'
        ]);
        $owner7 = User::create([
            'firstName' => 'عثمان',
            'middleName' => 'عثمان',
            'lastName' => ' ابو بكر',
            'email' => 'owner6@gmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0598152153',
            'street' =>'النصر',
            'city' => 'غزة',
            'image' =>'1.png'
        ]);
        $owner8 = User::create([
            'firstName' => 'Mohammad  ',
            'middleName' => 'Mohammad',
            'lastName' => 'Arafat',
            'email' => 'owner7@gmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0594133303',
            'street' =>'تل الهوا',
            'city' => 'غزة',
            'image' => '1.png'
        ]);
        $owner9 = User::create([
            'firstName' => 'كريم ',
            'middleName' => 'كريم',
            'lastName' => 'شريف',
            'email' => 'owner8@gmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0599396942',
            'street' =>'النصر',
            'city' => 'غزة',
            'image' =>'1.png'
        ]);
        $owner10 = User::create([
            'firstName' => 'ابو عيسى',
            'middleName' => ' هنية ',
            'lastName' => ' هنية ',
            'email' => 'owner9@gmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0599760017',
            'street' =>'تل الهوا',
            'city' => 'غزة',
            'image' => '1.png'
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
            'image' =>'1.png'
        ]);
        $user2 = User::create([
            'firstName' => 'سمر',
            'middleName' => 'علي',
            'lastName' => 'عرفة',
            'email' => 'samararfa1998@gmail.com',
            'password' => bcrypt('admin'),
            'mobile' =>'0592095768',
            'street' =>'اخر الشمالي',
            'city' => 'غزة',
            'image' => '1595430914.jpg'

        ]);


        $admin->roles()->attach($adminRole) ;
        // dd($adminRole);
        $owner1->roles()->attach($ownerRole) ;
        $owner2->roles()->attach($ownerRole) ;
        $owner3->roles()->attach($ownerRole) ;
        $owner4->roles()->attach($ownerRole) ;
        $owner5->roles()->attach($ownerRole) ;
        $owner6->roles()->attach($ownerRole) ;
        $owner7->roles()->attach($ownerRole) ;
        $owner8->roles()->attach($ownerRole) ;
        $owner9->roles()->attach($ownerRole) ;
        $owner10->roles()->attach($ownerRole) ;
        $user->roles()->attach($userRole) ;
        $user2->roles()->attach($userRole) ;
    }
}
