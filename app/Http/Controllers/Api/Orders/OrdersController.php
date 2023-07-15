<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Mail\NewOrder;
use App\Models\Order;
use App\Models\Product;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function generate(Request $pay, Gateway $gateway)
    {
        $token =  $gateway->clientToken()->generate();
        $data = [
            'token' => $token,
            'success' => true
        ];
        return response()->json($data, 200);
    }

    public function put(OrderRequest $pay, Gateway $gateway)
    {
        $priceOrder = 0;
        $ids = collect($pay->products)->pluck('id')->toArray();
        $products = Product::whereIn('id', $ids)->get();
        for ($i = 0; $i < count($pay->products); $i++) {
            $priceOrder += $products[$i]->price * $pay->products[$i]['quantity'];
        }
        $results = $gateway->transaction()->sale([
            'amount' => $priceOrder,
            'paymentMethodNonce' => $pay->token,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($results->success) {
            $order = Order::create([
                'guest_name' => $pay->name,
                'phone' => $pay->phone,
                'address' => $pay->address,
                'email' => $pay->email,
                'total' => $priceOrder,
                'date' => date("Y-m-d"),
            ]);
            $orderDetails = $pay->products;
            foreach ($orderDetails as $orderDetail) {
                $productId = $orderDetail['id'];
                $quantity = $orderDetail['quantity'];
                $order->products()->attach($productId, ['quantity' => $quantity]);
            }
            Mail::to('mario@rossi.com')->send(new NewOrder($order));
            return response()->json([
                'message' => 'Transazione eseguita con successo',
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'message' => 'Transazione fallita',
                'success' => false
            ], 401);
        };
    }
}
