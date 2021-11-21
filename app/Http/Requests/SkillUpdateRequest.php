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
            'user_id' => 'required',
            'unit_id' => 'required',
            'name' => 'required|min:2|max:255|unique:skills,name,'.$this->request->get('id').',id'
        ];
    }
}
