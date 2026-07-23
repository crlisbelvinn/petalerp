<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
           'category_id' => 'required|exists:categories,id',

        'name' => [
            'required',
            'string',
            'max:100',
            Rule::unique('products', 'name')
                ->ignore($this->route('product')->id),
        ],

        'price' => 'required|numeric|min:0',

        'stock' => 'required|integer|min:0',

        'description' => 'nullable|string',

        'image' => 'nullable|string',

        'is_active' => 'boolean',
        ];
    }
}
