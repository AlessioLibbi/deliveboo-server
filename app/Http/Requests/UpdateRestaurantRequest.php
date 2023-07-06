<?php

namespace App\Http\Requests;

use App\Models\Restaurant;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
    public function rules()
    {
        
        return [
            'name' => 'required',
            'address' => ['required', 'max:20', 'min:3'],
            'email' => ['required','email', 'max:255', Rule::unique(Restaurant::class)->ignore($this->user()->id)],
            'number' => ['required', 'max:20', Rule::unique(Restaurant::class)->ignore($this->user()->id)],
            'PIVA' => ['required', 'max:20', 'min:3', Rule::unique(Restaurant::class)->ignore($this->user()->id)],
            'cooking_id' => 'required'
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
            'name.required' => 'The name is required',
            'name.max' => 'So long for the name',
            'name.min' => 'too short for the name',

            'address.required' => 'The addres is required',
            'address.max' => 'So long for the address',
            'address.min' => 'So shor fot the address',

            'email.required' => 'The addres is required',
            'email.max' => 'So long for the email',
            'email.min' => 'So shor fot the email',
            'email.email' => 'This is not a email',

            'PIVA.required' => 'The addres is required',
            'PIVA.max' => 'So long for the PIVA',
            'PIVA.min' => 'So shor fot the PIVA',

            'cooking_id.required' => 'The tiplogy is requiered'

        ];
    }
}
