<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string','min:6', 'max:20','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Campo obligatorio',
            'name.max'=>'Máximo de caracteres permitidos: 255',
            'username.required'=>'Campo obligatorio',
            'username.min'=>'Mínimo de caracteres permitidos: 6',
            'username.max'=>'Máximo de caracteres permitidos: 20',
            'username.unique'=>'Ya existe otra cuenta con este nombre de usuario',
            'email.required'=>'Campo obligatorio',
            'email.email'=>'Debes introducir un email válido',
            'email.max'=>'Máximo de caracteres permitidos: 255',
            'email.unique'=>'Ya existe otra cuenta con este correo vinculado',
            'password.required'=>'Campo obligatorio',
            'password.min'=>'Mínimo de caracteres permitidos: 8',
            'password.confirmed'=>'Las contraseñas no coinciden'
        ];
    }
}
