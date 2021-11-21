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
            'user_id' => 'required',
            'skill_id' => 'required',
            'phrase' => 'required|unique:practices|min:1',
            'hanzi' => 'nullable',
            'pinyin' => 'nullable',
        ];
    }
}
