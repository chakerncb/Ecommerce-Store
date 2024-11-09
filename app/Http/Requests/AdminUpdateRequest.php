<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
           'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . auth()->guard('admin')->user()->id,
            'password' => 'nullable|string|min:8|confirmed',
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
            'name.required' => __('auth.name_required'),
            'name.string' => __('auth.name_string'),
            'name.max' => __('auth.name_max'),
            'email.required' => __('auth.email_required'),
            'email.email' => __('auth.email_email'),
            'email.max' => __('auth.email_max'),
            'email.unique' => __('auth.email_unique'),
            'password.string' => __('auth.password_string'),
            'password.min' => __('auth.password_min'),
            'password.confirmed' => __('auth.password_confirmed'),
        ];
    }
}
