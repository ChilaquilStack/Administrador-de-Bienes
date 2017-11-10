<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreditosRequest;
use App\Credito;
use App\Contribuyente;
use App\Domicilio;
use App\Bien;
use App\Articulo;
use App\Depositario;
use DB;
use Validator;

class CreditosController extends Controller
{
    public function index() {
        $bajas = DB::select("select id, descripcion from motivos_bajas_creditos_fiscales order by descripcion");
        return view("index", ["bajas" => $bajas]);
    }

    public function create() {
        $origenes_del_credito = [
            "1"=> "Anexo 18", 
            "2" => "ISTUV", 
            "3" => "Control de Obligaciones", 
            "4" => "Multas Federales No Fiscales", 
            "5" => "Liquidaciones DAFE" 
        ];
        $categorias = DB::select("select id, descripcion from categorias order by descripcion asc");
        $subcategorias = DB::select("select id, descripcion from subcategorias order by descripcion asc");
            
        $estados = DB::select("select id, nombre from estados order by nombre asc");
        $municipios = DB::select("select id, nombre from municipios order by nombre asc");
        return view("creditos.create", [
            "origenes" => $origenes_del_credito,  "categorias" => $categorias, "subcategorias" => $subcategorias,
            "estados" => $estados, "municipios" => $municipios
        ]);
    }

    public function store(CreditosRequest $request) {
        
        $contribuyente = new contribuyente([
            "nombre" => $request->input("credito.contribuyente.nombre"),
            "apellido_paterno" => $request->input("credito.contribuyente.apellido_paterno"),
            "apellido_materno" => $request->input("credito.contribuyente.apellido_materno"),
            "telefono" => $request->input("credito.contribuyente.telefono"),
            "rfc" => $request->input("credito.contribuyente.rfc"),
            "curp" => $request->input("credito.contribuyente.curp")
        ]);
        $contribuyente->save();
        
        $domicilio_contribuyente = new Domicilio([
            "cp" => $request->input("credito.contribuyente.domicilio.cp"),
            "int" => $request->input("credito.contribuyente.domicilio.int"),
            "ext" => $request->input("credito.contribuyente.domicilio.ext"),
            "calle" => $request->input("credito.contribuyente.domicilio.calle"),
            "colonia" => $request->input("credito.contribuyente.domicilio.colonia"),
            "municipios_id" => $request->input("credito.contribuyente.domicilio.municipio"),
            "estados_id" => $request->input("credito.contribuyente.domicilio.estado")
        ]);
        $domicilio_contribuyente->save();

        $contribuyente->domicilios()->attach($domicilio_contribuyente->Id);

        $credito = new Credito([
            "folio" => $request->input("credito.folio"),
            "monto" => $request->input("credito.monto"),
            "documento_determinante" => $request->input("credito.documento"),
            "origen_credito" => $request->input("credito.origen"),
            "contribuyentes_id" => $contribuyente->id
        ]);
        $credito->save();

        $depositario = new Depositario([
            "nombre" => $request->input("credito.bien.depositario.nombre"),
            "apellido_paterno" => $request->input("credito.bien.depositario.apellido_paterno"),
            "apellido_materno" => $request->input("credito.bien.depositario.apellido_materno")
        ]);
        $depositario->save();
        
        $deposito = new Domicilio([
            "cp" => $request->input("credito.bien.deposito.cp"),
            "int" => $request->input("credito.bien.deposito.int"),
            "ext" => $request->input("credito.bien.deposito.ext"),
            "calle" => $request->input("credito.bien.deposito.calle"),
            "colonia" => $request->input("credito.bien.deposito.colonia"),
            "municipios_id" => $request->input("credito.bien.deposito.municipio"),
            "estados_id" => $request->input("credito.bien.deposito.estado")
        ]);
        $deposito->save();

        $numero_control = $request->input('credito.bien.numero_control');
        $bien = new Bien([
            "numero_control" => $numero_control,
            "depositarios_id" => $depositario->id,
            "deposito_id" => $deposito->Id
        ]);
        $bien->save();

        $articulos = $request->input('credito.bien.articulos');
        foreach($articulos as $b){
            $articulo = new Articulo([
                "descripcion" => $b["descripcion"],
                "cantidad" => $b["cantidad"],
                "bienes_numero_control" => $numero_control
            ]);
            $articulo->save();
            $articulo->categorias()->attach($b["categoria"]["valor"]);
        }
        $credito->bienes()->attach($numero_control, ['documento' => "100"/*$request->input("bien.documento_embargo")*/]);
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

    public function update(Request $request) {
        $folio = $request->input("credito.folio");
        $credito = Credito::where("folio", $folio)->firstOrFail();
        $credito->contribuyentes_id = $credito->contribuyente->id;
        $credito->monto = $request->input("credito.monto");
        $credito->documento_determinante = $request->input("credito.documento");
        $credito->origen_credito = $request->input("credito.origen");
        $credito->save();
        return response()->json("Credito Fiscal"." ".$credito->folio." "."actualizado cone exito!", 200);
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
        $consulta = DB::select("select folio, monto, documento_determinante, origen_credito from creditos_fiscales order by folio asc");
        $creditos = Collect();
        foreach(Credito::All() as $credito) {
            $credito->contribuyente;
            $creditos->push($credito);
        }
        return response()->json(json_encode($creditos), 200);
    }

    public function bienes(Request $request){
        $articulos = Collect();
        $bienes_folio = Credito::where("folio", $request->input("folio"))->firstOrFail()->bienes;
        foreach($bienes_folio as $bien){
            foreach($bien->articulos as $articulo) {
                $articulo->depositario = $bien->depositario;
                $bien->deposito->estado->nombre;
                $articulo->deposito = $bien->deposito;
                $articulo->categorias;
                $articulo->ultima_valuacion = $articulo->valuaciones->first();
                $articulos->push($articulo);
            }
        }
        return response()->json(json_encode($articulos), 200);
    }

    public function add(Credito $credito) {
        
        $categorias = DB::select("select id, descripcion from categorias");
        $subcategorias = DB::select("select id, descripcion from subcategorias");
        return view("articulos.add", ["categorias" => $categorias, "subcategorias" => $subcategorias, "credito" => $credito]);
    }
}
