<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name'=>['required'],
                'username'=>['required','unique:users,username,'.$this->id],
                'email'=>['required','unique:users,email,'.$this->id],
                'fotoPerfil'=>['nullable','image'],
                'password'=>['nullable']
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required'=>'El nombre es obligatorio',
            'username.required'=>'El username es obligatorio',
            'username.unique'=>'Este nombre de usuario ya existe',
            'email.required'=>'El email es obligatorio',
            'email.unique'=>'El correo está vinculado a otra cuenta',
            'foto.image'=>'El archivo debe ser de tipo imagen'
        ];
    }
}
