<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('map_locations')->insert([
            'id'=> '1',
            'Latitude' => '31.502097',
            'Longitude' =>'34.466845',
            'property_id' => '1', 
          
        ]);


        DB::table('map_locations')->insert([
            'id'=> '2',
            'Latitude' => '31.513183',
            'Longitude' =>'34.475599',
            'property_id' => '2', 
        ]);

        DB::table('map_locations')->insert([
            'id'=> '3',
            'Latitude' => ' 31.456386',
            'Longitude' =>'34.394258',
            'property_id' => '3', 
        ]);

        DB::table('map_locations')->insert([
            'id'=> '4',
            'Latitude' => ' 31.456386',
            'Longitude' =>'34.394258',
            'property_id' => '4', 
        ]);
      
    }
}
