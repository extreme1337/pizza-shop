<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|min:3|max:40',
            'description'=>'required|min:3|max:500',
            'small_pizza_price'=>'required|number',
            'medium_pizza_price'=>'required|number',
            'large_pizza_price'=>'required|number',
            'category'=>'required',
            'image'=>'required|mimes:png,jpeg,jpg',
        ];
    }
}