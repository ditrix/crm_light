<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'is_legal' => 'boolean',
            'code'      => 'nullable|string',
            'contact_name'=> 'nullable|string',
            'contact_email'=> 'nullable|string',
            'contact_phone'=> 'nullable|string',
            'deleted_at' => 'nullable|date'
        ];
    }
}
