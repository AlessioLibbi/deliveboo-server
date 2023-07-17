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
        $yearArray = [];
        $myMonths = ['January', 'February', 'March', 'April', 'May','June', 'July', 'August', 'September', 'October', 'November', 'December'];
        
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
                $firstStats = $statsQuery->get();
                
                foreach ($firstStats as $item) {
                    if(!in_array($item->year, $yearArray)){
                        array_push($yearArray, $item->year);
                    }
                }
            }

        if($yearArray){
            if(!empty($year)){
                $statsQuery->whereYear('orders.created_at', $year);
            }else{
                $year = $yearArray[0];
                $statsQuery->whereYear('orders.created_at', $year);
            }
            $stats = $statsQuery->get();
            $totalSale = 0;
            $totalOrder = 0;
            $topSale = null;
            $topOrder = null;
            foreach ($stats as $item) {
                $totalSale += floatval($item->total_sales);
                $totalOrder +=  $item->order_count;
                if($topSale < floatval($item->total_sales)){
                    $topSale = floatval($item->total_sales);
                };
                if($topOrder < intval($item->order_count)){
                    $topOrder = intval($item->order_count);
                };
    
                
            }
            $avgSale = number_format($totalSale / count($stats), 2,'.');
            $avgOrder = number_format($totalOrder / count($stats), 2,'.');
            return view('admin.dashboard', compact('restaurant', 'stats', 'yearArray', 'myMonths', 'request', 'totalSale', 'totalOrder', 'topSale', 'topOrder', 'avgSale', 'avgOrder', 'year'));

        }else{
            $stats = $statsQuery->get();
            // dd($stats);
            return view('admin.dashboard', compact('restaurant', 'stats'));

        }
    }
}
