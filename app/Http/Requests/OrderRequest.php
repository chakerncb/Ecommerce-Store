<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            // 'shipping_address' => ['required', 'string'],
            // 'shipping_city' => ['required', 'string'],
            // 'shipping_phone' => ['required', 'string'],
            // 'shipping_fullname' => ['required', 'string'],
            'chip_method' => ['required', 'string'],
            'pay_method' => ['required', 'string'],
            'email' => ['required', 'email'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'string' , 'min:10' , 'max:10'],	
            'address' => ['string'],
            'wilaya' => ['string' , 'required'],
            'municipality' => ['string' , 'required'],
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array {
        return [
            'shipping_address.required' => __('messages.shipping_address_required'),
            'shipping_city.required' => __('messages.shipping_city_required'),
            'chip_method.required' => __('messages.chip_method_required'),
            'pay_method.required' => __('messages.pay_method_required'),
            'email.required' => __('messages.email_required'),
            'email.email' => __('messages.email_email'),
            'name.required' => __('messages.name_required'),
            'phone.required' => __('messages.phone_required'),
            'phone.min' => __('messages.phone_min'),
            'wilaya.required' => __('messages.wilaya_required'),
            'municipality.required' => __('messages.municipality_required'),
        ];
    }
}
