<?php

namespace App\Http\Requests;

use App\Models\Restaurant;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function prepareForValidation()
    {
        $restaurant = Restaurant::findOrFail(Auth::id());
        $this->merge([
            'restaurant_id' => $restaurant->id
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:150'],
            'price' => 'required',
            'visibility' => 'required',
            'description' => ['required', 'min:3', 'max:255'],
            'slug' => 'nullable',
            'image_path' => 'nullable',
            'restaurant_id' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Il nome è richiesto',
            'name.max' => 'Il nome deve essere lungo massimo :max caratteri',
            'name.min' => 'Il nome deve essere lungo almeno :min caratteri',
            'price.required' => 'Il prezzo è richiesto',
            'visibility.required' => 'Seleziona un campo',

            'description.required' => 'La descrizione è richiesta',
            'description.max' => 'La descrizione deve essere lunga massimo :max caratteri',
            'description.min' => 'La descrizione deve essere lunga almeno :min caratteri',


        ];
    }
}
