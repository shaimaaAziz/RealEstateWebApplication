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
            [ 'user_id' =>'2' ,'type' => '2', 'price'=>'22','roomNumbers'=>'4','state'=>'1','description'=>'قرب البحر'
                ,'propertyPeriod'=>'43','street'=>'غزة','status'=>'0','image'=>'home1.jpg','city'=>'0','area'=>'100'],
            [ 'user_id' =>'2' ,'type' => '2', 'price'=>'33','roomNumbers'=>'4','state'=>'1','description'=>'قرب مترو'
                ,'propertyPeriod'=>'4344','street'=>'الشهداء','status'=>'0','image'=>'home2.jpg','city'=>'2','area'=>'100'],
            [ 'user_id' =>'5' ,'type' => '3', 'price'=>'44','roomNumbers'=>'4','state'=>'0','description'=>'قرب مخبز العائلات'
                ,'propertyPeriod'=>'4325','street'=>'النصر','status'=>'0','image'=>'home3.jpg','city'=>'1','area'=>'100'],
                [ 'user_id' =>'5' ,'type' => '3', 'price'=>'44','roomNumbers'=>'4','state'=>'1','description'=>'قرب مخبز العائلات'
                ,'propertyPeriod'=>'4325','street'=>'النصر','status'=>'0','image'=>'home3.jpg','city'=>'1','area'=>'100'],
                [ 'user_id' =>'5' ,'type' => '3', 'price'=>'44','roomNumbers'=>'4','state'=>'1','description'=>'قرب مخبز العائلات'
                ,'propertyPeriod'=>'4325','street'=>'النصر','status'=>'0','image'=>'home3.jpg','city'=>'1','area'=>'100'],

        ]);
        DB::table('properties')->insert([
            [ 'user_id' =>'2' ,'type' => '2','roomNumbers'=>'3','state'=>'1','description'=>'شقة 200م تشطيب راقي للبيع الطابق الرابع بعمارة فندقية متكاملة الخدمات صالونين و3غرف و 3حمامات ومطبخين وبلكونة غزة_الرمال الجنوبي ابو محمد للعقارات 0597106483'
                ,'street'=>'الرمال الجنوبي','status'=>'0','image'=>'home1.jpg','city'=>'0','area'=>'200'],

            [ 'user_id' =>'2' ,'type' => '2','roomNumbers'=>'2','state'=>'1','description'=>'شقة100متر مشطبة سوبر لوكس شارع حميد مقابل سويدي الشاطئ شمالي غربي الطابق الخامس إطلالة مميزة على البحر صالون كبير وغرفة نوم وغرفة اطفال وحمامين ومطبخ للتواصل على الرقم 0599893457'
            ,'street'=>' شارع حميد ','status'=>'0','image'=>'home1.jpg','city'=>'0','area'=>'100']]);
        DB::table('properties')->insert([
            [ 'user_id' =>'2' ,'type' => '2','price'=>'65000','roomNumbers'=>'5','state'=>'1','description'=>'شقة للبيع تتكون من 5 غرف ومطبخ وصالونين كبار و3 حمامات الطابق الاول المساحة 220 متر شرقي جنوبي مطلوب 65000الف دولار وقابل للتفاوض عمارة سكنية حديثة البناء منطقة الرمال بلقرب برج الشفاء مكتب الفخامة للعقارات للاستفار : 0592230728 ابو احمد 0599871508 ابو فادي
'
                ,'street'=>' منطقة الرمال بلقرب برج الشفاء ','status'=>'0','image'=>'home1.jpg','city'=>'0','area'=>'220'],
            [ 'user_id' =>'2' ,'type' => '2','price'=>'28000','roomNumbers'=>'0','state'=>'1','description'=>'شقة عظم في عمارة حديثة البناء المساحة 100 متر الطابق الاول شرقي شمالي مطلوب 28000 الف دولار عمارة سكنية حديثة البناء مكونة من 5 طوابق النصر الشرقي مكتب الفخامة للعقارات للتواصل 0592230728 ابو احمد 0599871508 ابو فادي
'
                ,'street'=>' النصر الشرقي ','status'=>'0','image'=>'home1.jpg','city'=>'0','area'=>'100']]);
    }
}
