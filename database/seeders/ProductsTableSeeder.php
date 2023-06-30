<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Carbonara',
                'price' => 8.50,
                'description' => 'Pasta con uovo e guanciale',
                'visibility' => true,
                'restaurant_id' => 1,
            ],
            [
                'name' => 'Cacio e Pepe',
                'price' => 7.50,
                'description' => 'Pasta con cacio e pepe',
                'visibility' => true,
                'restaurant_id' => 1,
            ],
            [
                'name' => 'Bistecca ai Ferri',
                'price' => 11.50,
                'description' => 'Una bistecca di carne rossa al sangue',
                'visibility' => true,
                'restaurant_id' => 1,
            ],
            [
                'name' => 'Pollo alla piastra',
                'price' => 11.50,
                'description' => 'Pollo cotto alla piastra',
                'visibility' => true,
                'restaurant_id' => 1,
            ],
            [
                'name' => 'Uovo in camicia',
                'price' => 5.50,
                'description' => 'Un uovo cotto appena in padella con un po di aglio',
                'visibility' => true,
                'restaurant_id' => 1,
            ],
            [
                'name' => 'Filetto di merluzzo',
                'price' => 15.50,
                'description' => 'Un pesce delicato ma allo stesso tempo saporito',
                'visibility' => true,
                'restaurant_id' => 1,
            ],
            [
                'name' => 'Totani fritti',
                'price' => 7.50,
                'description' => 'Calamari fritti',
                'visibility' => true,
                'restaurant_id' => 1,
            ],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
