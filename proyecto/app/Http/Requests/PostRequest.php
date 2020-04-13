<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'titulo'=>['required', 'unique:posts', 'max:100'],
            'descripcion'=>['required','max:200'],
            'contenido'=>['required'],
            'user_id'=>['required'],
            'categoria_id'=>['required']
        ];
    }

    public function messages(){
        return [
            'titulo.required'=>'Debes introducir el título del post.',
            'titulo.unique'=>'Ya existe otro post con este mismo título.',
            'titulo.max'=>'El máximo de caracteres permitidos son 100.',
            'descripcion.required'=>'Debes introducir la descripción del post.',
            'descripcion.max'=>'El máximo de caracteres permitidos son 200.',
            'contenido.required'=>'Debes introducir el código.',
            'user_id.required'=>'No se puede crear el post sin estar logeado.',
            'categoria_id.required'=>'Debes de seleccionar el lenguaje del código.'
        ];
    }
}
