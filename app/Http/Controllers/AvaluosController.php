<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bien;
use App\Perito;
use DB;
use Carbon\Carbon;
use App\Repositorios\Usuario;


class AvaluosController extends Controller
{
    private $usuario;
    public function __construct(Usuario $usuario) {
        $this->middleware('auth');
        $this->usuario = $usuario;
    }

    public function index()
    {
        
        return view("avaluos.index");
    }

    
    public function create()
    {
        return view("avaluos.form");
    }

    public function store(Request $request) {
        $bien = Bien::where("numero_control", $request->input("avaluo.bien"))->firstOrFail();
        $perito = new Perito([
            "nombre" => $request->input("avaluo.perito.nombre"),
            "apellido_paterno" => $request->input("avaluo.perito.apellido_paterno"),
            "apellido_materno" => $request->input("avaluo.perito.apellido_materno")
        ]);
        $perito->save();
        $monto = $request->input("avaluo.monto");
        $numero_dictamen = $request->input("avaluo.numero_dictamen");
        $fecha_avaluo = new Carbon($request->input("avaluo.fecha"));
        $bien->valuaciones()->attach($perito->id,["monto" => $monto, "numero_dictamen" => $numero_dictamen, "fecha" => $fecha_avaluo]);
        return response()->json("Se Valuo el bien correctamente" ,200);
    }

    public function show($id) {
        $bien = Bien::where("numero_control", $id)->firstOrFail();
        $bien->categorias = $this->usuario->categorias($bien);
        foreach ($bien->categorias as $categoria) {
            $categoria->subcategorias = $this->usuario->subcategorias($bien);
            foreach ($categoria->subcategorias as $subcategoria) {
                $subcategoria->subsubcategorias = $this->usuario->subsubcategorias($bien);
            }
        }
        return view("avaluos.add", ["bien" => $bien, "categorias" => [] ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
