<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'required|string|max:255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'name.required' => 'Category Name is required',
            'name.string' => 'Category Name must be a string',
            'name.max' => 'Category Name must not exceed 255 characters',
            'name.unique' => 'Category Name must be unique',
            'description.required' => 'Category Description is required',
            'description.string' => 'Category Description must be a string',
            'description.max' => 'Category Description must not exceed 255 characters'
        ];
    }
}
