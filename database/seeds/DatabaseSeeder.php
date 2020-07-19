<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(PropertyTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(messageTypeTableSeeder::class);
        $this->call(mapTableSeeder::class);

        

        
    }
}
