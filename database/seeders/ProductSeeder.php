<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<50;$i++){
            DB::table('products')->insert([
                'title' => fake() -> text(25),
                'thumbnail' => fake() -> imageUrl(),
                'description' => fake() -> text(50),
                'price' => rand(10,100),
                'quantity' => rand(100,10000),
                'category_id' => rand(1,4)
            ]);
        }
    }
}
