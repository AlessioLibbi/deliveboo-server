<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cooking;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $cookings = Cooking::all();
        return view('auth.register', compact('cookings'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'restaurant_name' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'PIVA' => ['required', 'unique:' . Restaurant::class],
            'number' => ['required', 'unique:' . Restaurant::class],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $restaurant = Restaurant::create([
            'name' => $request->restaurant_name,
            'address' => $request->address,
            'email' => $request->email,
            'number' => $request->number,
            'PIVA' => $request->PIVA,
            'slug' => Restaurant::getUniqueSlugFromTitle($request->restaurant_name),
            'user_id' => $user->id,

        ]);

        if ($request->has('cooking_id')) {
            $restaurant->cookings()->attach($request->cooking_id);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
