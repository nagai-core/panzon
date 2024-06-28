<?php

namespace App\Http\Requests;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;

class CartAddurchaseRequest extends FormRequest
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
        $itemId = $this->route('itemId');
        $item = Item::with(['images', 'latestStock'])->findOrFail($itemId);
        $maxAmount = $item ? $item->latestStock->amount : 0;
        return [
            'amount' => 'required|integer|min:1|max:' . $maxAmount,
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => '1以上の個数を選んでください。',
            'amount.min' => '最低一つは選んでください',
            'amount.max' => 'それ以上の在庫がありません。',
        ];
    }
}
