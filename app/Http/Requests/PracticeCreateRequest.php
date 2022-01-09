<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracticeCreateRequest extends FormRequest
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
            'hanzi' => 'required|min:1|unique:practices,hanzi,null,id,skill_id,'.$this->request->get('skill_id').',language_id,'.session()->get('language_id'),
            'pinyin' => 'nullable',
            'meaning' => 'required|min:1|unique:practices,meaning,null,id,skill_id,'.$this->request->get('skill_id').',language_id,'.session()->get('language_id'),
            'skill_id' => 'required',
            'language_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
