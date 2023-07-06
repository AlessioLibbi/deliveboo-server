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
        $nameCookings = explode(',', $nameCooking);

        $filtered_restaurants = Restaurant::where(function ($query) use ($nameCookings) {
            foreach ($nameCookings as $nameCooking) {
                $query->whereHas('cookings', function ($subquery) use ($nameCooking) {
                    $subquery->where('name', $nameCooking);
                });
            }
        })->with('cookings')->get();

        return response()->json([
            'success' => true,
            'results' => $filtered_restaurants,
        ]);
    }
}
