<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracticeUpdateRequest extends FormRequest
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
            'user_id' => 'required',
            'skill_id' => 'required',
            'phrase' => 'required|min:1|unique:practices,phrase,'.$this->request->get('id'),
            'hanzi' => 'nullable',
            'pinyin' => 'nullable',
        ];
    }
}
