<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VocabularyUpdateRequest extends FormRequest
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
            'hanzi' => 'required|min:1|unique:vocabulary,hanzi,'.$this->request->get('id').',id',
            'pinyin' => 'required|min:1',
            'meaning' => 'required|min:1',
            'language_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
