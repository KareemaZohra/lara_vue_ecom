<?php

use Illuminate\Database\Seeder;
use App\Variants_model;
use Faker\Factory as Faker;

class VariantsModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $size = $faker->randomElement(['medium','small','large']);
        for ($i=1; $i<=3; $i++){
            $variant = new Variants_model;
            $variant->product_id = $faker->numberBetween(1,10);
            $variant->color = $faker->colorName();
            $variant->size = $size;
            $variant->quantity = $faker->numberBetween(1,5);
            $variant->save();
        }
    }
}
