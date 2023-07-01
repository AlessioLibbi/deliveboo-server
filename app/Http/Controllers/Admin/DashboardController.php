<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $data = Restaurant::findOrFail($id);
        $products = Product::where('restaurant_id', $data->id)->get();
        var_dump($products);
        return view('admin.dashboard', compact('data', 'products'));
    }
}
