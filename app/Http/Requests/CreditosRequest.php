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
            'credito.folio' => 'required|unique:creditos_fiscales,folio|alpha_dash',
            'credito.monto' => 'required|numeric|min:1',
            'credito.documento' => 'required',
            'credito.origen' => 'required',
            'credito.bien.depositario.nombre' => 'required',
            'credito.bien.depositario.apellido_paterno' => 'required',
            'credito.bien.depositario.apellido_materno' => 'required',
            'credito.bien.articulos' => "required",
            'credito.bien.articulos.*.descripcion' => 'required|max:255',
            'credito.bien.articulos.*.categorias' => 'required',
            'credito.bien.numero_control' => 'required|unique:bienes,numero_control',
            'credito.contribuyente.rfc' => 'unique:contribuyentes,id',
            'credito.contribuyente.rfc' => 'unique:contribuyentes,rfc',
            'credito.contribuyente.curp' => 'unique:contribuyentes,id',
            'credito.bien.deposito.estado' => 'required',
            'credito.bien.deposito.municipio' => 'required',
            'credito.bien.deposito.colonia' => 'required',
            'credito.bien.deposito.cp' => 'required',
            'credito.bien.deposito.calle' => 'required',
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
            'credito.bien.depositario.nombre.required' => 'Por favor introduzca el nombre del depositario',
            'credito.bien.depositario.apellido_paterno.required' => 'Por favor introduzca el apellido paterno del depositario',
            'credito.bien.depositario.apellido_materno.required' => 'Por favor introduzca el apellido materno del depositario',
            'credito.bien.articulos.*.descripcion.max' => 'La descripcion del articulo no debe ser mayor de 255 caracteres',
            'credito.bien.articulos.required' => "Ingrese uno o mas bienes",
            'credito.bien.numero_control.unique' => 'El numero de control ya existe',
            'credito.bien.numero_control.required' => 'Por favor introduzca un numero de control',
            'credito.contribuyente.rfc.unique' => 'El RFC ya existe',
            'credito.contribuyente.curp.unique' => 'El CURP ya existe',
            'credito.bien.deposito.municipio.required' => "Por favor introduzaca el municpio del depositario",
            'credito.bien.articulos.*.categorias.required' => "Existen articulos sin una o mas categoria",
            'credito.bien.deposito.calle.required' => "Por favor introduzca la calle del deposito"
        ];
    }

}