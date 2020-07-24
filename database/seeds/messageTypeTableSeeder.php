<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class messageTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('message_Type')->insert([
            [ 'name' => 'اقتراح'],
            [ 'name' => 'إعجاب'],
            [ 'name' => 'مشكلة'],
            [ 'name' => 'أخرى']
          
        ]);    }
    }

