<?php

namespace App\Http\Requests\owner;

use Illuminate\Foundation\Http\FormRequest;

class CategoryPurchaseRequest extends FormRequest
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
            "category" => ['required', 'unique:categories,name']
        ];
    }

    public function messages(): array
    {
        return [
            'category.required' => 'カテゴリ名は必須です。',
            'category.unique' => 'このカテゴリ名は既に存在します。',
        ];
    }
}
