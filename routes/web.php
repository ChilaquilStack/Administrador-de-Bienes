<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get("/creditos/bienes", "CreditosController@bienes");
Route::get("/creditos/creditos", "CreditosController@creditos");
Route::post("/creditos/create",  "CreditosController@store");
Route::post("/creditos/destroy", "CreditosController@destroy");
Route::post("/creditos/update",  "CreditosController@update");
Route::resource("creditos", "CreditosController");
Route::get("/bienes/bienes", "BienesController@bienes");
Route::get("/bienes/articulos", "BienesController@articulos");
Route::resource("bienes", "BienesController");
Route::get("/contribuyentes/contribuyentes", "ContribuyenteController@contribuyentes");
Route::get("/contribuyentes/creditos", "ContribuyenteController@creditos");
Route::resource("contribuyentes", "ContribuyenteController");
Route::resource("avaluos", "AvaluosController");