<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class imagenRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            "file" => "required|image|unique:imagenes,directorio"
        ];
    }
    
    public function messages(){
        return [
            "file.required" => "Es necesario una imagen",
            "file.image" => "El archivo no es una imagen",
            "file.unique" => "El nombre de la imagen ya existe"
        ];
    }
}
