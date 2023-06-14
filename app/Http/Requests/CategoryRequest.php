<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required','unique' => 'unique:categories,name','regex:/^[a-zA-Z0-9\s]+$/']
        ];
        if ($this->route('category')) {
            $rules['name']['unique'] .= ','.$this->route('category')->id.',id';
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
          'name.required' => __('messages.name.required')
        ];
    }
}
