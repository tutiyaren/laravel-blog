<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'contents' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください。',
            'title.string' => 'タイトルを文字列で入力してください。',
            'title.max' => 'タイトルを255文字以内で入力してください。',
            'contents.required' => '内容を入力してください。',
            'contents.max' => '内容を255文字以内で入力してください。',
        ];
    }
}
