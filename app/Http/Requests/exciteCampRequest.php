<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class exciteCampRequest extends FormRequest
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

            // 各コントローラーに書いたほうがいい

            'email' => 'required|max:50|email:rfc,dns|unique:users,email',
                // rfc ⇨ RFCと呼ばれるインターネットの標準仕様に合っているかをチェックする
                // dns ⇨ DNSにそのメールアドレスのドメインが存在するかをチェックする
            // 'name' => 'required|max:20',
            // 'kind_1' => 'required|max:20',
            // 'kind_2' => 'required|max:20',
            // 'photo' => 'required|',
            // 'title' => 'required|max:50',
            // 'content' => 'required|max:500'
        ];
    }

    public function messages()
    {
        return [
            'required' => '入力してください',
            'unique' => '既に存在しています',
            'max' => ':attributeの文字数が制限を超えました'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'メールアドレス',
            'name' => '名前',
            'title' => 'タイトル',
            'content' => '記事'
        ];
    }
}
