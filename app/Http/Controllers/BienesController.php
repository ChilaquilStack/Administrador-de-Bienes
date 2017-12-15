<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Bien;
use App\imagen;
use App\Repositorios\Usuario;
use Auth;
class BienesController extends Controller {

    protected $users;

    public function __construct(Usuario $users) {
        $this->users = $users;
        $this->middleware('auth');
    }

    public function index() {
        $bajas_creditos = DB::table("motivos_bajas_creditos_fiscales")
                                ->select("id", "descripcion")->orderBy("descripcion", "asc")
                                ->get();

        $bajas_articulos = DB::table("motivos_bajas_bienes")
                                ->select("id", "descripcion")
                                ->orderBy("descripcion", "asc")
                                ->get();

        return view("bienes.index", ["bajas_creditos" => $bajas_creditos, "bajas_articulos" => $bajas_articulos]);
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
                $request->input("baja"), $bien->numero_control, Auth::user()->id, $request->input("comentarios")
            ]
        );
        return response()->json("Bien"." ".$bien->numero_control." "."se dio de Baja", 200);
    }

    public function bienes(){
        $bienes = Bien::activos();
        foreach($bienes as $bien){
            $bien->deposito->estado;
            $bien->depositario;
            $bien->creditos;
            $bien->cantidad;
            foreach($bien->categorias as $categoria){
                $bien->subcategorias = $this->users->subcategorias($bien);
                foreach($bien->subcategorias as $subcategoria) {
                    $bien->subsubcategorias = $this->users->subsubcategorias($bien);
                }    
            }
            $bien->creditos;
            $bien->ultima_valuacion = $bien->valuaciones->first();
        }
        return response()->json($bienes, 200);
    }
    
    public function imagenes(Bien $bien, request $request){
        if($request->isMethod("post")) {
            $imagen = $request->file("file");
            $nombre = uniqid() . $imagen->getClientOriginalName();
            $extencion = $imagen->guessExtension();
            $dir = public_path().'/img';
            $bien->imagenes()->create(["nombre" => $nombre]);
            $subir = $imagen->move($dir, $nombre);
        } else {
            foreach($bien->categorias as $categoria) {
                $categoria->subcategorias = $this->users->subcategorias($categoria->id);
                foreach ($categoria->subcategorias as $subcategoria) {
                    $subcategoria->subsubcategorias = $this->users->subsubcategorias($subcategoria->id);
                }
            }
        }
            return view("imagenes.index", ["bien" => $bien, "categorias" => []]);
    }

    public function imagen_destroy(imagen $imagen){
        $imagen->delete();
        return back();
    }
}