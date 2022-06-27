<?php

use Illuminate\Database\Seeder;
use App\Product_model;
use Faker\Factory as Faker;

class ProductModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new \RauweBieten\PhpFakerClothing\Clothing($faker));
        for ($i=1; $i<=2; $i++){
            $product = new Product_model;
            $product->name = $faker->clothing();
            $product->price = $faker->numberBetween(10,100);
            $product->available = $faker->boolean;
            $product->save();
        }

    }
}
