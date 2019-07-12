<?php

namespace App\Http\Requests\School\Classes;

use Illuminate\Foundation\Http\FormRequest;

class AddClass extends FormRequest
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
        if ($this->request->get('_method') == 'PATCH') {
            return [];
        }

        return [
            'name' => 'bail|required|string|min:1|max:50',
            'incharge_name' => 'bail|required|string|min:2|max:100',
            'cp_index' => 'bail|required|integer|min:0',
            'order_by_index' => 'bail|required|integer|min:0'
        ];
    }
}
