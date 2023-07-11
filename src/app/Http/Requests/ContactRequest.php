<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => ['required','string'],
            'first_name' => ['required','string'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email'],
            'postcode' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/' ],
            'address' => ['required', 'string'],
            'building_name' => ['nullable','string'],
            'opinion' => ['required', 'string','max:120'],
        ];
    }
    public function prepareForValidation()
    {
    $this->merge(['postcode' => mb_convert_kana($this->postcode, 'rna')]);
    }
    public function messages()
    {
        return[
            'last_name.required' => '苗字を入力してください',
            'last_name.string' => '苗字を文字列で入力してください',
            'first_name.required' => '名前を入力してください',
            'first_name.string' => '名前を文字列で入力してください',
            'gender.required' => '性別を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => 'メールアドレスはハイフンを入れて123-4567のように入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'building_name.string' => '建物名を文字列で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.string' => 'ご意見をテキスト形式で入力してください',
            'opinion.max' => '120文字以内で入力してください'
        ];
    }
}
