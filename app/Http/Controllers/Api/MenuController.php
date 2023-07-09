<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index($restaurantSlug)
    {
        $restaurantMenu = Restaurant::with('product', 'cookings')->where('slug', $restaurantSlug)->get();


        return response()->json([
            'success' => true,
            'results' => $restaurantMenu,
        ]);
    }
}
