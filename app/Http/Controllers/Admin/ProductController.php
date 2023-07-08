<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {   
        $validatedData = $request->validated();
        $validatedData['slug']= Str::slug($validatedData['name']);
        if ($request->hasFile('image_path')) {
            
            // se definiscono le variabile per dopo fare il path per le immagine
            $restaurantId = $validatedData['restaurant_id'];
            $directory =   $restaurantId . '/' . $validatedData['slug'];
            // come si pasa un array se fa un forech per salvare ogni imagine sul codice
            foreach ($request->file('image_path') as $image) {
                $path = $image->store($directory, 'public');
            }
            // si salva nel database il path dove si trovano le immagine
            $validatedData['image_path'] = 'storage' . '/' .$directory;
            
        }
        $product = Product::create($validatedData);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $restaurant = Restaurant::findOrFail(Auth::id())->id;
        if($restaurant == $product->restaurant_id){
            $images = array();
            if($product->image_path){
                // questa variabile prende come valore un array con tutti le imagine dil prodotto 
                $files = scandir($product->image_path); 
        
                // se fa el forech para creare il path per dopo caricare le imagine e si controlla che prenda sul tanto tipo imagine
                    foreach ($files as $file) {
                        $extension = pathinfo($file, PATHINFO_EXTENSION);
                        if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
                            $images[] = $product->image_path.'/'.$file;
                        }
                    }
            } else{
                $images[] = 'img/images.png';
            }
            return view('admin.products.show', compact('product', 'images'));
        } else {
            return view('admin.hacker.sofia');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $restaurant = Restaurant::findOrFail(Auth::id())->id;
        if($restaurant == $product->restaurant_id){
            $images = array();
            if($product->image_path){
                $files = scandir($product->image_path); 
                $pathInit = $product->image_path;
            // se fa el forech para creare il path per dopo caricare le imagine e si controlla che prenda sul tanto tipo imagine
                foreach ($files as $file) {
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
                        $images[] = $file;
                    }
                }
                return view('admin.products.edit', compact('product', 'images', 'pathInit'));
            }
            return view('admin.products.edit', compact('product', 'images'));
        } else {
            return view('admin.hacker.sofia');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request,Product $product)
    {
        
        $validatedData = $request->validated();
        if ($request->hasFile('image_path')) {
            // se definiscono le variabile per dopo fare il path per le immagine
            $restaurantId = $validatedData['restaurant_id'];
            $validatedData['slug']= $product->slug;
            $directory =   $restaurantId . '/' . $validatedData['slug'];
            // come si pasa un array se fa un forech per salvare ogni imagine sul codice
            foreach ($request->file('image_path') as $image) {
                $path = $image->store($directory, 'public');
            }
            // si salva nel database il path dove si trovano le immagine
            $validatedData['image_path'] = 'storage' . '/' .$directory;
        }
        $product->update($validatedData);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {   
        // file sirve per eliminare le immagine che hanno relazione con il prodotto eliminato
        File::deleteDirectory($product->image_path);
        $product->delete(); 
        return redirect()->route('dashboard');
    }
}
