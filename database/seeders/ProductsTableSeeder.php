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
            ],
            [
                'name' => 'Cacio e Pepe',
                'price' => 7.50,
                'description' => 'Pasta con cacio e pepe',
                'visibility' => true,
            ],
            [
                'name' => 'Bistecca ai Ferri',
                'price' => 12.50,
                'description' => 'Una bistecca di carne rossa al sangue',
                'visibility' => true,
            ],
            [
                'name' => 'Pollo alla piastra',
                'price' => 11.50,
                'description' => 'Pollo cotto alla piastra',
                'visibility' => true,
            ],
            [
                'name' => 'Uovo in camicia',
                'price' => 5.50,
                'description' => 'Un uovo cotto appena in padella con un po di aglio',
                'visibility' => true,
            ],
            [
                'name' => 'Filetto di merluzzo',
                'price' => 15.50,
                'description' => 'Un pesce delicato ma allo stesso tempo saporito',
                'visibility' => true,
            ],
            [
                'name' => 'Totani fritti',
                'price' => 7.50,
                'description' => 'Calamari fritti',
                'visibility' => true,
            ],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
