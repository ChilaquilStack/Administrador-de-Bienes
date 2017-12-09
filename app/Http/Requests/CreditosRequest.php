<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditosRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules(){
        return [
            'credito.folio' => 'required|unique:creditos_fiscales,folio',
            'credito.monto' => 'required|numeric|min:1',
            'credito.documento' => 'required',
            'credito.origen' => 'required',
            'credito.bienes' => "required",
            'credito.bienes.*.depositario.nombre' => 'required',
            'credito.bienes.*.depositario.apellido_paterno' => 'required',
            'credito.bienes.*.depositario.apellido_materno' => 'required',
            'credito.bienes.*.descripcion' => 'required|max:255',
            'credito.bienes.*.categorias' => 'required',
            'credito.bienes.*.numero_control' => 'required|unique:bienes,numero_control',
            'credito.bienes.*.deposito.estado' => 'required',
            'credito.bienes.*.deposito.municipio' => 'required',
            'credito.bienes.*.deposito.colonia' => 'required',
            'credito.bienes.*.deposito.cp' => 'required',
            'credito.bienes.*.deposito.calle' => 'required',
            'credito.contribuyente.rfc' => 'unique:contribuyentes,id',
            'credito.contribuyente.rfc' => 'unique:contribuyentes,rfc',
            'credito.contribuyente.curp' => 'unique:contribuyentes,id'
        ];
    }

    public function messages(){
        return [
            'credito.folio.required' => 'Por favor introduzca un número de crédito fiscal.',
            'credito.folio.unique' => 'El crédito fiscal ya existe',
            'credito.monto.required' => 'Por favor introduzca un monto.',
            'credito.monto.numeric' => "El monto debe ser un valor numerico",
            'credito.monto.min' => 'El monto debe ser mayor de 0.',
            'credito.origen.required' => 'Por favor introduzca el origen del crédito.',
            'credito.documento.required' => 'Por favor introduzca el documento determinante.',
            "credito.contribuyente.nombre.required" => "Por favor introduzca del nombre del contribuyente",
            'credito.contribuyente.apellido_paterno.required' => 'Por favor introduzca el apellido paterno del contribuyente',
            'credito.contribuyente.apellido_materno.required' => 'Por favor introduzca el apellido materno del contribuyente',
            'credito.bienes.*.depositario.nombre.required' => 'Por favor introduzca el nombre del depositario',
            'credito.bienes.*.depositario.apellido_paterno.required' => 'Por favor introduzca el apellido paterno del depositario',
            'credito.bienes.*.depositario.apellido_materno.required' => 'Por favor introduzca el apellido materno del depositario',
            'credito.bienes.*.descripcion.max' => 'La descripcion del articulo no debe ser mayor de 255 caracteres',
            'credito.bienes.required' => "Ingrese uno o mas bienes",
            'credito.bienes.*.numero_control.unique' => 'El numero de control ya existe',
            'credito.bienes.*.numero_control.required' => 'Por favor introduzca un numero de control',
            'credito.bienes.*.deposito.municipio.required' => "Por favor introduzca el municipio del depositario",
            'credito.bienes.*.categorias.required' => "Existen articulos sin una o mas categoria",
            'credito.bienes.*.deposito.calle.required' => "Por favor introduzca la calle del deposito",
            'credito.bienes.*.numero_control.required' => 'Ingrese el numero de control',
            'credito.bienes.*.numero_control.unique' => 'El numero de control ya existe',
            'credito.bienes.*.deposito.colonia.required' => 'Por favor ingrese ingrese la colonia del deposito',
            'credito.bienes.*.deposito.cp.required' => 'Por favor ingrese el codigo postal del deposito',
            'credito.contribuyente.curp.unique' => 'El CURP ya existe',
            'credito.contribuyente.rfc.unique' => 'El RFC ya existe'
        ];
    }

}