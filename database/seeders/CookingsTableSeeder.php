<?php

namespace Database\Seeders;

use App\Models\Cooking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cookings_array = ['italiano', 'cinese', 'brasiliano', 'greco', 'messicano', 'giapponese', 'pizza', 'vegetariano', 'indiano', 'americano', 'sushi', 'colombiano'];
        foreach ($cookings_array as $cooking) {
            $new_cooking = new Cooking();
            $new_cooking->name = $cooking;
            $new_cooking->save();
        }
    }
}
