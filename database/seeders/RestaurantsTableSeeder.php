<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant = new Restaurant();
        $restaurant->name = 'Alessio & Co';
        $restaurant->adress = 'Via MonteNero 11';
        $restaurant->email = 'alex.libbi@gmail.com';
        $restaurant->number = '380-349-9641';
        $restaurant->PIVA = '39761040565';
        $restaurant->slug = Str::slug($restaurant->name, '-');
        $restaurant->save();
    }
}
