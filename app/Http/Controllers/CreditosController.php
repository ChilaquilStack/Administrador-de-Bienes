<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreditoRequest;
use App\Credito;
use Validator;
use DB;

class CreditosController extends Controller
{

    
    public function index()
    {
        $bajas = DB::select("select id, motivo from motivos_bajas_creditos_fiscales order by motivo");
        return view("creditos.index", compact('bajas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request) {
        
        $messages = [
            'credito.folio.required' => 'Por favor introduzca un número de folio.',
            'credito.folio.unique' => 'El crédito fiscal ya existe',
            'credito.folio.numeric' => "El credito fiscal debe ser un valor numerico",
            'credito.monto.required' => 'Por favor introduzca un monto.',
            'credito.monto.numeric' => "El monto debe ser un valor numerico",
            'credito.monto.min' => 'El monto debe ser mayor de :min.',
            'credito.origen.required' => 'Por favor introduzca el origen del crédito.',
            'credito.documento.required' => 'Por favor introduzca el documento determinante.',
            'credito.documento.unique' => 'El documento determinante ya exite.'
        ];
        
        $validator = Validator::make($request->all(), [
            'credito.folio' => 'required|unique:creditos_fiscales,folio|numeric',
            'credito.monto' => 'required|numeric',
            'credito.documento' => 'required|unique:creditos_fiscales,documento_determinante',
            'credito.origen' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $folio = $request->input("credito.folio");
        $credito = new credito([
            "folio" => $folio,
            "monto" => $request->input("credito.monto"),
            "documento_determinante" => $request->input("credito.documento"),
            "origen_credito" => $request->input("credito.origen")
        ]);
        $credito->save();
        return response()->json("Credito Fiscal"." ".$folio." "."Creado con Exito",200);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $messages = [
            'credito.folio.required' => 'Por favor introduzca un número de folio.',
            'credito.folio.numeric' => 'El folio debe de ser un valor numerico.',
            'credito.folio.unique' => 'El crédito fiscal ya existe',
            'credito.monto.required' => 'Por favor introduzca un monto.',
            'credito.monto.numeric' => 'El monto debe ser un valor numerico.',
            'credito.monto.min' => 'El monto debe ser mayor de :min.',
            'credito.origen.required' => 'Por favor introduzca el origen del crédito.',
            'credito.documento.required' => 'Por favor introduzca el documento determinante.',
            'credito.documento.unique' => 'El documento determinante ya exite.'
        ];
        
        $validator = Validator::make($request->all(), [
            'credito.folio' => 'required|numeric',
            'credito.monto' => 'required|numeric',
            'credito.documento' => 'required',
            'credito.origen' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $folio = $request->input("folio");
        $credito = Credito::whereFolio($folio)->firstOrFail();
        $credito->folio = $request->input("credito.folio");
        $credito->monto = $request->input("credito.monto");
        $credito->documento_determinante = $request->input("credito.documento");
        $credito->origen_credito = $request->input("credito.origen");
        $credito->save();
        return response()->json("Credito Fiscal"." ".$folio." "."actualizado cone exito!", 200);
    }

    public function destroy(Request $request) {
        $folio = $request->input("folio");
        $credito = Credito::whereFolio($folio)->firstOrFail();
        $credito->estado = ($credito->estado) ? 0 : 1;
        $credito->save();
        DB::insert("insert into bajas_creditos_fiscales (creditos_fiscales_folio, baja, usuarios_id, comentarios) values(?,?,?,?)", 
            [$credito->folio, $request->input("baja"), 1, $request->input("comentarios")]);
        return response()->json("Credito Fiscal"." ".$folio." "."se dio de Baja", 200);
    }

    public function creditos(){
        $creditos = Credito::where('estado', 1)->orderBy("folio","desc")->get();
        return response()->json(json_encode($creditos), 200);
    }
}
