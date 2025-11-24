<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
        return [
            'name' => ['required'],
            'content'=>['required', 'max:255'],
            'img' => ['required','mimes:png,jpeg'],
            'category' => ['required'],
            'condition' => ['required'],
            'price' => ['required', 'numeric','min:0']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'content.required'=>'商品説明を入力してください',
            'content.max' => '商品説明は255文字以内で入力してください',
            'img.required'=>'画像をアップロードしてください',
            'img.mimes'=> '「.png」または「.jpeg」形式でアップロードしてください',
            'category.required'=>'カテゴリーを選択してください',
            'condition.required'=>'商品の状態を選択してください',
            'price.required'=>'商品価格を入力してください',
            'price.numeric' => '商品価格は数字で入力してください',
            'price.min' => '商品価格は0円以上で入力してください'
        ];
    }
}
