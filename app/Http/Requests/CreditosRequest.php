<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditosRequest extends FormRequest {
    
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'credito.folio' => 'required|unique:creditos_fiscales,folio|alpha_dash',
            'credito.monto' => 'required|numeric|min:1',
            'credito.documento' => 'required',
            'credito.origen' => 'required',
            'credito.contribuyente.nombre' => 'required',
            'credito.contribuyente.apellido_paterno' => 'required',
            'credito.contribuyente.apellido_materno' => 'required',
            'credito.bien.depositario.nombre' => 'required',
            'credito.bien.depositario.apellido_paterno' => 'required',
            'credito.bien.depositario.apellido_materno' => 'required',
        ];
    }

    public function messages() {
        return [
            'credito.folio.required' => 'Por favor introduzca un número de folio.',
            'credito.folio.unique' => 'El crédito fiscal ya existe',
            'credito.monto.required' => 'Por favor introduzca un monto.',
            'credito.monto.numeric' => "El monto debe ser un valor numerico",
            'credito.monto.min' => 'El monto debe ser mayor de 0.',
            'credito.origen.required' => 'Por favor introduzca el origen del crédito.',
            'credito.documento.required' => 'Por favor introduzca el documento determinante.',
            'credito.contribuyente.apellido_paterno' => 'Por favor introduzca el apellido paterno del contribuyente',
            'credito.contribuyente.apellido_materno' => 'Por favor introduzca el apellido materno del contribuyente',
            'credito.bien.depositario.nombre' => 'Por favor introduzca el nombre del depositario',
            'credito.bien.depositario.apellido_paterno' => 'Por favor introduzca el apellido paterno del depositario',
            'credito.bien.depositario.apellido_paterno' => 'Por favor introduzca el apellido materno del depositario',
        ];
    }
}