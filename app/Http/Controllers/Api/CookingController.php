<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cooking;
use Illuminate\Http\Request;

class CookingController extends Controller
{
    public function index()
    {
        $cookingType = Cooking::all();
        return response()->json([
            'success' => true,
            'results' => $cookingType,
        ]);
    }
}
