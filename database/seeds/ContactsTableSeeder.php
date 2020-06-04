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
            'subject' => 'suggestion',
            'phone' => '0599812356',
            'message' => 'I Think if you change the color of website '
        ]);

        DB::table('contacts')->insert([
            'id'=> '101',
            'name' => 'afnan ',
            'email' =>'afnan@gmail.com',
            'subject' => 'problem',
            'phone' => '05945595',
            'message' => 'How I can login to website'
        ]);
    }
}
