<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BienesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bienes' => "required",
            'bienes.*.depositario.nombre' => 'required',
            'bienes.*.depositario.apellido_paterno' => 'required',
            'bienes.*.depositario.apellido_materno' => 'required',
            'bienes.*.descripcion' => 'required|max:255',
            'bienes.*.categorias' => 'required',
            'bienes.*.numero_control' => 'required|unique:bienes,numero_control',
            'bienes.*.deposito.estado' => 'required',
            'bienes.*.deposito.municipio' => 'required',
            'bienes.*.deposito.colonia' => 'required',
            'bienes.*.deposito.cp' => 'required',
            'bienes.*.deposito.calle' => 'required'
        ];
    }
	
	public function messages(){
        return [
            'bienes.required' => "Ingrese uno o mas bienes",
            'bienes.*.depositario.nombre.required' => 'Por favor introduzca el nombre del depositario',
            'bienes.*.depositario.apellido_paterno.required' => 'Por favor introduzca el apellido paterno del depositario',
            'bienes.*.depositario.apellido_materno.required' => 'Por favor introduzca el apellido materno del depositario',
            'bienes.*.descripcion.max' => 'La descripcion del articulo no debe ser mayor de 255 caracteres',
            'bienes.*.numero_control.unique' => 'El numero de control ya existe',
            'bienes.*.numero_control.required' => 'Por favor introduzca un numero de control',
            'bienes.*.deposito.municipio.required' => "Por favor introduzca el municipio del depositario",
            'bienes.*.categorias.required' => "Existen articulos sin una o mas categoria",
            'bienes.*.deposito.calle.required' => "Por favor introduzca la calle del deposito",
            'bienes.*.numero_control.required' => 'Ingrese el numero de control',
            'bienes.*.numero_control.unique' => 'El numero de control ya existe',
            'bienes.*.deposito.colonia.required' => 'Por favor ingrese ingrese la colonia del deposito',
            'bienes.*.deposito.cp.required' => 'Por favor ingrese el codigo postal del deposito'
        ];
	}
}
