<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Credito;
use App\Articulo;
use Carbon\Carbon;
use App\Remate;

class RematesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $creditos = Collect(Credito::where("estatus",1)->get());
        $articulos = Collect();
        foreach($creditos as $credito){
            foreach($credito->bienes as $bien){
                $articulos = $bien->articulos->filter(function($articulo){
                    return $articulo->valuaciones()->count() > 0 && $articulo->imagenes()->count() > 0;
                });
            }
        }
        return view("remates.index", ["articulos" => $articulos]);
    }

    public function create() {
        
    }
    
    public function store(Request $request) {
        
        $remate = New Remate([
            "fecha_inicio" => New Carbon($request->input("fecha_inicio")),
            "fecha_fin" => New Carbon($request->input("fecha_fin")),
        ]);
        $remate->save();
        foreach($request->input("articulos") as $articulo){
            $remate->articulos()->attach($articulo);
        }
        return redirect("/remates")->with('status',"Se creo el remate ".$remate->id." con exito");
    
    }

    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
