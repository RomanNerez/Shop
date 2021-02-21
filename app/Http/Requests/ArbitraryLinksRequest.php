<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Lang;

class ArbitraryLinksRequest extends FormRequest
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
    public function rules(): array
    {

        $rulers = [
            'link' => 'required',
            'area_visibility_id' => 'required',
            'content' => []
        ];

        if ($this->input('id')) {
            $rulers['id'] = 'required';
        }

        $this->_getLocalContent($rulers);

        return $rulers;
    }

    private function _getLocalContent(&$data): void
    {
        foreach (Lang::get() as $lang) {
            $data['content'][$lang->local] = [
                'title' => 'required'
            ];
        }
    }
}
