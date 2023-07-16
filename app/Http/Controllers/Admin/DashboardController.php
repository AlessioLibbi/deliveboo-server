<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $restaurant = Restaurant::findOrFail($id);
        $products = Product::where('restaurant_id', $restaurant->id)->get();

        // STATISTICHE
        $restaurantId = Auth::user()->restaurant->id;
        $stats = DB::table('orders')
        ->join('order_product', 'orders.id','=', 'order_product.order_id')
        ->join('products', 'order_product.product_id','=', 'products.id')
        ->where('products.restaurant_id',$restaurantId)
        ->select(
            DB::raw('YEAR(orders.created_at) as year'),
            DB::raw('MONTH(orders.created_at) as month'),
            DB::raw('COUNT(DISTINCT orders.id) as order_count'),
            DB::raw('SUM(order_product.quantity * products.price) as total_sales')
        )
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'asc')
        ->get();
        return view('admin.dashboard', compact('restaurant', 'products', 'stats'));
    }
}
