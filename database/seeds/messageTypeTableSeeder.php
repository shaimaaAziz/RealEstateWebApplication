<?php

use Illuminate\Database\Seeder;

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

