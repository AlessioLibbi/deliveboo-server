<?php

use App\Http\Controllers\Api\CookingController;
use App\Http\Controllers\Api\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//FILTRO PER RISTORANTI PER TIPOLOGIA CUCINA
Route::get('filtered_restaurant/{nameCooking}', [RestaurantController::class, 'index']);

//CHIAMATA DI TUTTI I TIPI DI CUCINA
Route::get('cookingType', [CookingController::class, 'index']);

//
