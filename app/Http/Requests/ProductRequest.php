<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric|max:100000,99',
            'description' => 'required|string|min:10',
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array {

        return [
            'name.required' => 'Name is required',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'price.max' => 'Price must be less than 100000.99',
            'description.required' => 'Description is required',
            'image.required' => 'Image is required',
        ];

    }
}