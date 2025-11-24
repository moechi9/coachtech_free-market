<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $allowedStatuses = ['コンビニ払い', 'カード支払い'];
        return[
            'method' => ['required', Rule::in($allowedStatuses)],
            'address' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'method.required' => '支払い方法を選択してください',
            'address.required' => '住所を入力してください'
        ];
    }
}
