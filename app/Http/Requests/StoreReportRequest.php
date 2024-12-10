<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'nullable|email:dns',
            'phone_number' => 'nullable|numeric|digits_between:11,18',
            'topics' => 'required|array|min:1',
            'topics.*' => 'exists:topics,id', 
            'description' => 'required|min:3|max:255',
            'image' => 'nullable|image'
        ];
    }
}
