<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use PMC\Product\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $faker = Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

        $count = 0;
        $products = 50;

        do {
            Product::create([
                'name' => $faker->productName
            ]);
            $count++;
        } while ($count <= $products);

    }
}
