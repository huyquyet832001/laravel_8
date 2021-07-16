<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =FakerFactory::create();
        for($i=0  ;$i<20;$i++){
            $data=[
                'name'=>$faker->name,
                'price'=>$faker->randomNumber(7),
               'image'=>$faker->image,
                'quantity'=>$faker->randomNumber(3),
                'category_id'=>$faker->randomNumber(1-20),
                
            ];
            DB::table('products')->insert($data); 
            }
    }
}
