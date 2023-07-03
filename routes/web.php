<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeleteImage;
use App\Http\Controllers\Admin\DeleteImg;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/restaurants/{restaurant}/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('restaurants', RestaurantController::class);
    Route::resource('products', ProductController::class);
    Route::delete('/delete-image/{path}', [DeleteImg::class, 'delete'])->name('delete.img');
});



require __DIR__ . '/auth.php';
