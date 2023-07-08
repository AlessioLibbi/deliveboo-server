<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index($restaurantID)
    {
        $restaurantMenu = Restaurant::with('product')->where('id', $restaurantID)->get();


        return response()->json([
            'success' => true,
            'result' => $restaurantMenu,
        ]);
    }
}
