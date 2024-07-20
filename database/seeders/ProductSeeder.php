<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('products')->insert([
                'name' => $faker->word,
                'method' => $faker->randomElement(['erp', 'pos']),
                'type' => $faker->randomElement(['fijo', 'variable']),
                'current_stock' => $faker->numberBetween(0, 100),
                'reorder_threshold' => $faker->numberBetween(10, 50),
                'base_price' => $faker->randomFloat(2, 1, 1000),
            ]);
        }
    }
}
