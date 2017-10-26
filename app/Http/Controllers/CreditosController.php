<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreditoRequest;
use App\Credito;
use App\Contribuyente;
use App\Domicilio;
use App\Bien;
use Validator;
use DB;

class CreditosController extends Controller
{

    
    public function index()
    {
        $origenes_del_credito = [
            "1"=> "Anexo 18", 
            "2" => "ISTUV", 
            "3" => "Control de Obligaciones", 
            "4" => "Multas Federales No Fiscales", 
            "5" => "Liquidaciones DAFE" 
        ];
        $categorias = DB::select("select id, descripcion from categorias order by descripcion asc");
        $subcategorias = DB::select("select id, descripcion from subcategorias order by descripcion asc");
        $bajas = DB::select("select id, motivo from motivos_bajas_creditos_fiscales order by motivo");
        $estados = DB::select("select id, nombre from estados order by nombre asc");
        $municipios = DB::select("select id, nombre from municipios order by nombre asc");
        return view("creditos.index", [
            "bajas" => $bajas, "origenes" => $origenes_del_credito,  "categorias" => $categorias, "subcategorias" => $subcategorias,
            "estados" => $estados, "municipios" => $municipios
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request) {
        
        $messages = [
            'credito.folio.required' => 'Por favor introduzca un número de folio.',
            'credito.folio.unique' => 'El crédito fiscal ya existe',
            'credito.monto.required' => 'Por favor introduzca un monto.',
            'credito.monto.numeric' => "El monto debe ser un valor numerico",
            'credito.monto.min' => 'El monto debe ser mayor de 0.',
            'credito.origen.required' => 'Por favor introduzca el origen del crédito.',
            'credito.documento.required' => 'Por favor introduzca el documento determinante.',
            'credito.contribuyente.apellido_paterno' => 'Por favor introduzca el apellido paterno del contribuyente',
            'credito.contribuyente.apellido_materno' => 'Por favor introduzca el apellido materno del contribuyente',
        ];
        
        $validator = Validator::make($request->all(), [
            'credito.folio' => 'required|unique:creditos_fiscales,folio|alpha_dash',
            'credito.monto' => 'required|numeric|min:1',
            'credito.documento' => 'required',
            'credito.origen' => 'required',
            'credito.contribuyente.nombre' => 'required',
            'credito.contribuyente.apellido_paterno' => 'required',
            'credito.contribuyente.apellido_materno' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $contribuyente = new contribuyente([
            "nombre" => $request->input("credito.contribuyente.nombre"),
            "apellido_paterno" => $request->input("credito.contribuyente.apellido_paterno"),
            "apellido_materno" => $request->input("credito.contribuyente.apellido_materno"),
            "telefono" => $request->input("credito.contribuyente.telefono"),
            "rfc" => $request->input("credito.contribuyente.rfc"),
            "curp" => $request->input("credito.contribuyente.curp")
        ]);
        $contribuyente->save();
        
        $domicilio = new Domicilio([
            "cp" => $request->input("credito.contribuyente.domicilio.cp"),
            "int" => $request->input("credito.contribuyente.domicilio.int"),
            "ext" => $request->input("credito.contribuyente.domicilio.ext"),
            "calle" => $request->input("credito.contribuyente.domicilio.calle"),
            "colonias_id" => $request->input("credito.contribuyente.domicilio.colonia"),
            "municipios_id" => $request->input("credito.contribuyente.domicilio.municipio"),
            "estados_id" => $request->input("credito.contribuyente.domicilio.estado")
        ]);
        $domicilio->save();

        $contribuyente->domicilios()->attach($domicilio->id);

        $credito = new Credito([
            "folio" => $request->input("credito.folio"),
            "monto" => $request->input("credito.monto"),
            "documento_determinante" => $request->input("credito.documento"),
            "origen_credito" => $request->input("credito.origen"),
            "contribuyentes_id" => $contribuyente->id
        ]);
        $credito->save();
        
        $bienes = $request->input('credito.bienes');
        foreach($bienes as $b){
                $numero_control = $b["numero_control"];
                $bien = new Bien([
                    "numero_control" => $numero_control,
                    "comentarios" => $b["comentarios"],
                    "cantidad" => $b["cantidad"]
                ]);
                $bien->save();
                $credito->bienes()->attach($numero_control, ['documento_embargo' => "100"]);
            }

        return response()->json("Credito Fiscal"." ".$credito->folio." "."Creado con Exito",200);
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
            'credito.folio.unique' => 'El crédito fiscal ya existe',
            'credito.monto.required' => 'Por favor introduzca un monto.',
            'credito.monto.numeric' => 'El monto debe ser un valor numerico.',
            'credito.monto.min' => 'El monto debe ser mayor de 0',
            'credito.origen.required' => 'Por favor introduzca el origen del crédito.',
            'credito.documento.unique' => 'El documento determinante ya exite.'
        ];
        
        $validator = Validator::make($request->all(), [
            'credito.folio' => 'required|alpha_dash',
            'credito.monto' => 'required|numeric|min:0',
            'credito.documento' => 'required|alpha_dash',
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
        $creditos = Credito::All();
        return response()->json(json_encode($creditos), 200);
    }

    public function bienes(Request $request){
        $bienes = Collect();
        $bienes_folio = Credito::where("folio", $request->input("folio"))->firstOrFail()->bienes;
        foreach($bienes_folio as $bien){
            $categorias = Collect();
            foreach($bien->categorias as $categoria) {
                $categorias->push(array($categoria->descripcion));
            }
            $bien->categoria = $categorias;
            $bienes->push($bien);
        }
        return response()->json(json_encode($bienes), 200);
    }
 
}
