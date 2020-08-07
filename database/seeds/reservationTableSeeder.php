<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'id'=> '100',
            'property_id' => '1',
            'user_id' =>'3',
            'state' => 'بيع',
            'reservation' => '0',
            'owner_id' => '2'
           
        ]);
        DB::table('reservations')->insert([
            'id'=> '101',
            'property_id' => '2',
            'user_id' =>'3',
            'state' => 'بيع',
            'reservation' => '0',
            'owner_id' => '2'
           
        ]);
        DB::table('reservations')->insert([
            'id'=> '102',
            'property_id' => '3',
            'user_id' =>'4',
            'state' => 'تأجير',
            'reservation' => '0',
            'owner_id' => '5'
           
        ]);
        // DB::table('reservations')->insert([
        //     'id'=> '103',
        //     'property_id' => '4',
        //     'user_id' =>'3',
        //     'state' => 'بيع',
        //     'reservation' => '0',
        //     'owner_id' => '5'
           
        // ]);
        // DB::table('reservations')->insert([
        //     'id'=> '104',
        //     'property_id' => '5',
        //     'user_id' =>'3',
        //     'state' => 'بيع',
        //     'reservation' => '0',
        //     'owner_id' => '5'
           
        // ]);
    }
}
