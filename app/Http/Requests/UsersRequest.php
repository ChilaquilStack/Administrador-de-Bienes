<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ];
    }
    
    public function messages() {
        return [
            'email.required' => "ingrese un correo electronico",
            'password.required' => "ingrese una contraseña" 
        ];
    }
}
