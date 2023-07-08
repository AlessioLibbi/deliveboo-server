<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function generate(Request $pay, Gateway $gateway){
        $token =  $gateway->clientToken()->generate();
        $data = [
            'token' => $token,
            'success'=> true
        ];
        return response()->json($data, 200);
    }

    public function put(OrderRequest $pay, Gateway $gateway){
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
        
        if($results->success){
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
