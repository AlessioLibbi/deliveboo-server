<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurant = Auth::user()->restaurant;

        // STATISTICHE
        $restaurantId = Auth::user()->restaurant->id;
        $year = $request->input('year');
        $yearArray =[];
        
        
        $statsQuery = DB::table('orders')
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
            ->orderBy('month', 'asc');
            
            if(empty($yearArray)){
                $firstStats = @$statsQuery->get();
                
                foreach ($firstStats as $item) {
                    if(!in_array($item->year, $yearArray)){
                        array_push($yearArray, $item->year);
                    }
                }
            }

        
        if(!empty($year)){
            $statsQuery->whereYear('orders.created_at', $year);
        }else{
            $statsQuery->whereYear('orders.created_at', $yearArray[0]);
        }
        $stats = $statsQuery->get();
        return view('admin.dashboard', compact('restaurant', 'stats', 'yearArray', 'request'));
    }
}
