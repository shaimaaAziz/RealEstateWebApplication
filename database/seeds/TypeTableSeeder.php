<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [ 'name' => 'فيلا'],
            [ 'name' => 'ارض'],
            [ 'name' => 'شقة'],
            [ 'name' => 'بيت'],
            [ 'name' => 'شاليه']
        ]);    }
}
