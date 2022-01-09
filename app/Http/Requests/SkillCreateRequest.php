<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillCreateRequest extends FormRequest
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
            'name' => 'required|unique:skills,name,null,id,language_id,'.session()->get('language_id').',unit_id,'.$this->request->get('unit_id').'|min:2|max:255',
            'unit_id' => 'required',
            'language_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
