<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $pattern = 'required|unique:products,slug';

        return [
            'data.slug' => isset($data['id']) ? $pattern .','. $data['id'] .',id' : $pattern
        ];
    }

    public function messages()
    {
        return [
            'data.slug.required' => 'Поле <b>"Ссылка"</b> обязательное для заполнения',
            'data.slug.unique'   => 'Указанная <b>"Ссылка"</b> уже существует'
        ];
    }
}
