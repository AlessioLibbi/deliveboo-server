<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Termwind\Components\Element;

class MenuController extends Controller
{
    public function index($restaurantSlug)
    {
        $restaurantMenu = Restaurant::with('products', 'cookings')->where('slug', $restaurantSlug)->get();
        foreach ($restaurantMenu[0]['products'] as $product) {
            if($product->image_path){
                $images = array();
                // questa variabile prende come valore un array con tutti le imagine dil prodotto 
                $files = scandir($product->image_path); 
        
                // se fa el forech para creare il path per dopo caricare le imagine e si controlla che prenda sul tanto tipo imagine
                    foreach ($files as $file) {
                        $extension = pathinfo($file, PATHINFO_EXTENSION);
                        if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
                            $images[] = $product->image_path.'/'.$file;
                        }
                    }
                    $product->image_path = $images;
            }
        }
        return response()->json([
            'success' => true,
            'results' => $restaurantMenu,
        ]);
    }
}
