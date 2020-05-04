<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
        if ($this->method() == "PUT") {
            return [
                'nombre'=>['required', 'unique:categorias,nombre,'.$this->id],
                'logo'=>['image','nullable']
            ];
        }else{
            return [
                'nombre'=>['required', 'unique:categorias,nombre'],
                'logo'=>['image','nullable']
            ];
        }
    }

    public function messages()
    {
        return[
            'nombre.required'=>'Debes introducir un nombre a la categoría.',
            'nombre.unique'=>'Ya existe una categoría con este mismo nombre.',
            'logo.image'=>'El logo debe ser un archivo de tipo imagen.'
        ];
    }
}
