<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Auth::user()->restaurant->products;
        $orders = [];
    
        foreach ($products as $product) {
            $productOrders = $product->orders;
    
            foreach ($productOrders as $order) {
                $orderId = $order->id;
                $existingOrder = collect($orders)->first(function ($item) use ($orderId) {
                    return $item->id === $orderId;
                });
    
                if (!$existingOrder) {
                    $orders[] = $order;
                }
            }
        }
    
        return view('admin.orders.index', compact('orders'));
    }
    

    public function show( $id)
    {

        $order = Order::find($id);
      
        if($order->products[0]->restaurant->id == Auth::user()->restaurant->id){

            return view('admin.orders.show', compact('order'));
        } else {
            return view('admin.hacker.sofia');
        }
    }


}
