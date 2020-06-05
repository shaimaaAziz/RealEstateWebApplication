<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            [ 'user_id' =>'2' ,'type' => '1', 'minPrice'=>'22','maxPrice'=>'222','roomNumbers'=>'4','state'=>'1','description'=>'قرب البحر'
                ,'propertyPeriod'=>'43','street'=>'غزة','status'=>'0','image'=>'home1.jpg','city'=>'0','area'=>'100'],
            [ 'user_id' =>'3' ,'type' => '2', 'minPrice'=>'33','maxPrice'=>'3333','roomNumbers'=>'4','state'=>'1','description'=>'قرب مترو'
                ,'propertyPeriod'=>'4344','street'=>'الشهداء','status'=>'0','image'=>'home2.jpg','city'=>'2','area'=>'100'],
            [ 'user_id' =>'4' ,'type' => '3', 'minPrice'=>'44','maxPrice'=>'4444','roomNumbers'=>'4','state'=>'0','description'=>'قرب مخبز العائلات'
                ,'propertyPeriod'=>'4325','street'=>'النصر','status'=>'0','image'=>'home3.jpg','city'=>'1','area'=>'100'],
                [ 'user_id' =>'4' ,'type' => '3', 'minPrice'=>'44','maxPrice'=>'4444','roomNumbers'=>'4','state'=>'0','description'=>'قرب مخبز العائلات'
                ,'propertyPeriod'=>'4325','street'=>'النصر','status'=>'1','image'=>'home3.jpg','city'=>'1','area'=>'100'],

        ]);
    }
}
