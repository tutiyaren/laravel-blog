<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'commenter_name' => 'required|string|max:255',
            'comments' => 'max:255'
        ];
    }

    public function messages()
    {
        return [
            'commenter_name.required' => 'タイトルを入力してください。',
            'commenter_name.string' => 'タイトルを文字列で入力してください。',
            'commenter_name.max' => 'タイトルを255文字以内で入力してください。',
            'comments.max' => '内容を255文字以内で入力してください。',
        ];
    }
}
