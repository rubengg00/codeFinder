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
            'contenido'=>['required'],
            'parent_id'=>['nullable'],
            'user_id'=>['required'],
            'post_id'=>['required']
        ];
    }

    public function messages(){
        return [
            'contenido.required'=>'No puedes publicar un comentario vacío.'
        ];
    }
}
