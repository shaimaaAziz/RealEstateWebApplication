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
            'Latitude' => '31.50422105970552',
            'Longitude' =>'34.424809643684355',
            'property_id' => '1',

        ]);


        DB::table('map_locations')->insert([
            'id'=> '2',
            'Latitude' => '31.502794',
            'Longitude' =>'34.415107',
            'property_id' => '2',
        ]);
        DB::table('map_locations')->insert([
            'id'=> '3',
            'Latitude' => ' 31.312414',
            'Longitude' =>'34.250359',
            'property_id' => '3',
        ]);

        DB::table('map_locations')->insert([
            'id'=> '4',
            'Latitude' => ' 31.536042',
            'Longitude' =>'34.465442',
            'property_id' => '4',
        ]);
//        31.536042,34.465442,15z
        DB::table('map_locations')->insert([
            'id'=> '5',
            'Latitude' => ' 31.501479761333698',
            'Longitude' =>'34.46636478406145',
            'property_id' => '3',
        ]);
        DB::table('map_locations')->insert([
            'id'=> '6',
            'Latitude' => ' 31.531869492558393',
            'Longitude' =>'34.4449611667724',
            'property_id' => '6',
        ]);

        DB::table('map_locations')->insert([
            'id'=> '7',
            'Latitude' => ' 31.517030129379783',
            'Longitude' =>'34.447677275145935',
            'property_id' => '7',
        ]);

        DB::table('map_locations')->insert([
            'id'=> '8',
            'Latitude' => ' 31.531748936705327',
            'Longitude' =>'34.44685550305276',
            'property_id' => '8',
        ]);

        DB::table('map_locations')->insert([
            'id'=> '9',
            'Latitude' => ' 31.456386',
            'Longitude' =>'34.394258',
            'property_id' => '9',
        ]);
        DB::table('map_locations')->insert([
            'id'=> '10',
            'Latitude' => ' 31.53300436213953',
            'Longitude' =>'34.45817265194179',
            'property_id' => '10',
        ]);
        DB::table('map_locations')->insert([
            'id'=> '11',
            'Latitude' => '31.536852',
            'Longitude' =>'34.484010',
            'property_id' => '11',

        ]);

        DB::table('map_locations')->insert([
            'id'=> '12',
            'Latitude' => ' 31.348163',
            'Longitude' =>'34.253289',
            'property_id' => '12',
        ]);
        DB::table('map_locations')->insert([
            'id'=> '13',
            'Latitude' => ' 31.465121',
            'Longitude' =>'34.426737',
            'property_id' => '13',
        ]);
        DB::table('map_locations')->insert([
            'id'=> '14',
            'Latitude' => ' 31.526613759186944',
            'Longitude' =>'34.43883999330878',
            'property_id' => '14',
        ]);

        DB::table('map_locations')->insert([
            'id'=> '15',
            'Latitude' => ' 31.5332',
            'Longitude' =>'34.4418',
            'property_id' => '15',
        ]);

    }
}
