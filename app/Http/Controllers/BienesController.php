<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Bien;
use App\Articulo;
use App\Repositorios\Usuario;
class BienesController extends Controller {

    protected $users;

    public function __construct(Usuario $users) {
        $this->users = $users;
        $this->middleware('auth');
    }

    public function index() {
        return view("bienes.index");
    }

    
    public function create() {
        $categorias = DB::select("select id, descripcion from categorias");
        $subcategorias = DB::select("select id, descripcion from subcategorias");
        return view("articulos.add", ["categorias" => $categorias, "subcategorias" => $subcategorias]);
    }


    public function store(Request $request) {
    
    }

    public function show($id) {

        $bien = Bien::where("numero_control", $id)->firstOrFail();
        
        $categorias = DB::table("categorias")->select("id", "nombre")->get();
        
        $bien->categorias = $this->users->categorias($bien);
        
        foreach($bien->categorias as $categoria){
            $categoria->subcategorias = $this->users->subcategorias($categoria->id);
            foreach($categoria->subcategorias as $subcategoria){
                $subcategoria->subsubcategorias = $this->users->subcategorias($subcategoria->id);
            }
        }

        return view("bienes.show", ["bien" => $bien, "categorias" => $categorias]);
        
    }

    public function edit($id) {

        $bien = Bien::where("numero_control",$id)->firstOrFail();
        
        $bien->categorias = $this->users->categorias($bien);
        
        $categorias = DB::table("categorias")->select("id", "nombre")->get();
        foreach($bien->categorias as $categoria){
            $categoria->subcategorias = $this->users->subcategorias($categoria->id);
            foreach($categoria->subcategorias as $subcategoria){
                $subcategoria->subsubcategorias = $this->users->subcategorias($subcategoria->id);
            }
        }

        return view("bienes.edit", ["bien" => $bien, "categorias" => $categorias]);
    }

    public function update(Request $request, $id) {

        $articulo = Articulo::where("id",$id)->firstOrFail();
        $articulo->fill($request->all());
        $articulo->save();
        return redirect("bienes");        
    }

    public function destroy(request $request) {
        $id = $request->input("id");
        $bien = Bien::where("numero_control", $id)->firstOrFail();
        $bien->estado = 0;
        $bien->save();
        DB::insert("insert into bajas_bienes(motivos_bajas_articulos_id, bienes_numero_control, usuarios_id, comentarios) values(?,?,?,?)", 
            [
                $request->input("baja"), $articulo->id, Auth::user()->id, $request->input("comentarios")
            ]
        );
        return response()->json("Bien"." ".$bien->id." "."se dio de Baja", 200);
    }

    public function bienes(){
        $bienes = Bien::activos();
        foreach($bienes as $bien){
            $bien->deposito->estado;
            $bien->depositario;
            $bien->creditos;
            $bien->cantidad;
            $bien->categorias;
            $bien->creditos;
            $bien->ultima_valuacion = $bien->valuaciones->first();
        }
        return response()->json($bienes, 200);
    }
}