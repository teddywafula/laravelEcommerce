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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'category_id' => 'required|exists:App\Models\Category,id',
            'vendor_id' => 'required|exists:App\Models\Vendor,id',
            'description' => 'min:10',
            'price' => 'required|decimal:0,2',
            'quantity' => 'required|integer|min:0',
            'sku' => [
                'required',
                'min:2',
                'unique'=> 'unique:products,sku',
            ],
        ];

        if ($this->route('product')) {
            $rules['sku']['unique'] .= ','.$this->route('product')->id.',';
        }

        return $rules;
    }
}
