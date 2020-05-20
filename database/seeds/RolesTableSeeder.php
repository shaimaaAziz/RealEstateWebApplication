<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['name' => 'أدمن']);
        Role::create(['name' => 'صاحب العقار']);
        Role::create(['name' => 'مستخدم']);
 
    }
}
