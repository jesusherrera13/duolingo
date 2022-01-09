<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillUpdateRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:skills,name,'.$this->request->get('id').',id,unit_id,'.$this->request->get('unit_id').',language_id,'.session()->get('language_id'),
            'unit_id' => 'required',
            'language_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
