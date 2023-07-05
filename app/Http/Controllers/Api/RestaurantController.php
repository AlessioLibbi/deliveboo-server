<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    ///CHIAMATA DEI RISTORANTI FILTRATI PER TIPOLOGIA CUCINA
    public function index($nameCooking)
    {
        $filtered_restaurants = Restaurant::whereHas('cookings', function ($query) use ($nameCooking) {
            $query->where('name', $nameCooking);
        })->with('cookings')->get();

        return response()->json([
            'success' => true,
            'results' => $filtered_restaurants,
        ]);
    }
}
