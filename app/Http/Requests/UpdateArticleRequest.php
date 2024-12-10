<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
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
        $rule = [
            'title' => [
                'required',
                'min:3', 'max:255',
                Rule::unique('articles')->ignore($this->article)
            ],
            'is_published' => 'required',
            'body' => 'required|min:3',
        ];

        if ($this->has('image')) {
            $rule['image'] = 'required|file|image|max:1024';
        }

        return $rule;
    }
}
