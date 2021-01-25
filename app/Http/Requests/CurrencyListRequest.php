<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyListRequest extends FormRequest
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
        $data    = $this->input('data');
        $pattern = 'required|max:5|unique:currency_lists,code';

        return [
            'data.code'   => isset($data['id']) ? $pattern .','. $data['id'] .',id' : $pattern,
            'data.symbol' => 'required|max:3'
        ];
    }

    public function messages()
    {
        return [
            'data.code.required'   => 'Поле <b>"Код валюты"</b> обязательное для заполнения',
            'data.symbol.required' => 'Поле <b>"Символ"</b> обязательное для заполнения',
            'data.code.unique'     => 'Указанный <b>код валюты</b> уже существует',
            'data.symbol.max'      => 'Поле <b>"Символ"</b> может содержать максимум 3 знака',
            'data.code.max'        => 'Поле <b>"Код валюты"</b> может содержать максимум 5 знаков'
        ];
    }
}