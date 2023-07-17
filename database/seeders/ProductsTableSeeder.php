<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($r = 1; $r < 4; $r++)
        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->name = $faker->word();
            $product->slug = Str::slug($product->name, '-');
            $product->description = $faker->sentence(5);
            $product->visibility = $faker->numberBetween(0,1);
            $product->price = $faker->randomFloat(2, 5, 30);
            $product->restaurant_id = $r;
            $product->save();
        };
    }
}
