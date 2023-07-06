<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Cooking;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
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
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show($restaurant)
    {
        $id = Auth::id();
        $restaurantShow = Restaurant::findOrFail($restaurant);
        if ($id == $restaurantShow->user_id) {
            return view('admin.restaurants.show', compact('restaurantShow'));
        } else {
            return view('admin.hacker.sofia');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $id = Auth::id();
        if ($id == $restaurant->user_id) {
            $cookings = Cooking::all();
            return view('admin.restaurants.edit', compact('restaurant', 'cookings'));
        } else {
            return view('admin.hacker.sofia');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();
        // Altre proprietà del ristorante da aggiornare...
        if ($request->has('cooking_id')) {
            $restaurant->cookings()->sync($data['cooking_id']);
        }
        $restaurant->update($data);

        return redirect()->route('dashboard', $restaurant->id)
            ->with('success', 'Restaurant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
