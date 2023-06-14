<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => [
                'required',
                'unique'=> 'unique:vendors,company_name',
                'regex:/^[a-zA-Z0-9\s]+$/'
            ],
            'phone' => 'required',
            'country' => 'required',
            'location' => 'required',
            'company_email' => [
                'required',
                'email',
                'unique'=> 'unique:vendors,company_email',
            ]
        ];
        if ($this->route('vendor')) {
            $rules['company_name']['unique'] .= ','.$this->route('vendor')->id.',id';
            $rules['company_email']['unique'] .= ','.$this->route('vendor')->id.',id';
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'first_name' => __('messages.first_name.required'),
            'last_name' => __('messages.last_name.required'),
            'company_name.require' => __('messages.company_name.required'),
            'company_name.unique' => __('messages.company_name.unique'),
            'phone' => __('messages.phone.required'),
            'country' => __('messages.country.required'),
            'location' => __('messages.location.required'),
            'company_email.required' => __('messages.company_email.required'),
            'company_email.email' => __('messages.company_email.email'),
            'company_email.unique' => __('messages.company_email.unique'),
        ];
    }
}
