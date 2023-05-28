<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->truncate();
$id=DB::table('category')->insertGetId(['cat_name_az'=>'test1_top','cat_name_en'=>'test1_en_top','cat_name_ru'=>'test1_ru_top','slug'=>'slug',]);
DB::table('category')->insert(['cat_name_az'=>'test1_child','cat_name_en'=>'test1_en_child','cat_name_ru'=>'test1_ru_chil','slug'=>'slug','top_cat_id'=>$id]);

        DB::table('category')->insert(['cat_name_az'=>'test1','cat_name_en'=>'test1_en','cat_name_ru'=>'test1_ru','slug'=>'slug',]);

        DB::table('category')->insert(['cat_name_az'=>'test2','cat_name_en'=>'test2_en','cat_name_ru'=>'test2_ru','slug'=>'slug',]);

        DB::table('category')->insert(['cat_name_az'=>'test3','cat_name_en'=>'test3_en','cat_name_ru'=>'test3_ru','slug'=>'slug',]);
        DB::table('category')->insert(['cat_name_az'=>'test4','cat_name_en'=>'test4_en','cat_name_ru'=>'test4_ru','slug'=>'slug',]);
        DB::table('category')->insert(['cat_name_az'=>'test5','cat_name_en'=>'test5_en','cat_name_ru'=>'test5_ru','slug'=>'slug',]);
        DB::table('category')->insert(['cat_name_az'=>'test6','cat_name_en'=>'test6_en','cat_name_ru'=>'test6_ru','slug'=>'slug',]);


    }
}
