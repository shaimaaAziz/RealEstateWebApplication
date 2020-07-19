<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'id'=> '100',
            'name' => 'alaa ',
            'email' =>'alaa@gmail.com',
            'messageType' => 'suggestion',
            'phone' => '0599812356',
            'message' => 'I Think if you change the color of website ',
            'view'=>'0'
        ]);

        DB::table('contacts')->insert([
            'id'=> '101',
            'name' => 'afnan ',
            'email' =>'afnan@gmail.com',
            'messageType' => 'problem',
            'phone' => '05945595',
            'message' => 'How I can login to website',
            'view'=>'0'
        ]);
        DB::table('contacts')->insert([
            'id'=> '133',
            'name' => 'alaa ',
            'email' =>'alaa2@gmail.com',
            'messageType' => 'suggestion',
            'phone' => '0599812356',
            'message' => 'I Think if you change the color of website ',
            'view'=>'0'
        ]); DB::table('contacts')->insert([
            'id'=> '122',
            'name' => 'alaa ',
            'email' =>'alaa3@gmail.com',
            'messageType' => 'suggestion',
            'phone' => '0599812356',
            'message' => 'I Think if you change the color of website ',
            'view'=>'0'
        ]); DB::table('contacts')->insert([
            'id'=> '111',
            'name' => 'alaa ',
            'email' =>'alaa4@gmail.com',
            'messageType' => 'suggestion',
            'phone' => '0599812356',
            'message' => 'I Think if you change the color of website ',
            'view'=>'0'
        ]); DB::table('contacts')->insert([
            'id'=> '110',
            'name' => 'alaa ',
            'email' =>'alaa5@gmail.com',
            'messageType' => 'suggestion',
            'phone' => '0599812356',
            'message' => 'I Think if you change the color of website ',
            'view'=>'0'
        ]);
    }
}
