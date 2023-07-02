<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'name' => ['required','min:3','max:150', Rule::unique('projects')->ignore($this->project)], 
            'price' => 'number',
            'description'=> ['required','min:3','max:150'],
            'technologies'=> ['nullable', 'exists:technologies,id'],
            'image_path' => 'nullable'
        ];
    }
}
