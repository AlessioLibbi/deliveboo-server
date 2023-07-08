<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class RestaurantController extends Controller
{
    ///CHIAMATA DEI RISTORANTI FILTRATI PER TIPOLOGIA CUCINA
    public function index($nameCooking = null)
    {
        if (empty($nameCooking)) {
            $restaurants = Restaurant::with('cookings')->get();
        } else {

            $nameCookings = explode('&', $nameCooking);
            $restaurants = Restaurant::where(function ($query) use ($nameCookings) {
                foreach ($nameCookings as $nameCooking) {
                    $query->whereHas('cookings', function ($subquery) use ($nameCooking) {
                        $subquery->where('name', $nameCooking);
                    });
                }
            })->with('cookings')->get();
        }


        return response()->json([
            'success' => true,
            'results' => $restaurants,
        ]);
    }
}
