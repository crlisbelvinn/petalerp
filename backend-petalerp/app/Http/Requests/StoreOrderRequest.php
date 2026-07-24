<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'order_number' => 'required|string|unique:orders,order_number',
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required|string|max:20',
            'total_price' => 'required|numeric|min:0',
            'status' => [
                'required',
                Rule::in(['pending','paid','completed','cancelled']),
            ],
        ];
    }
}
