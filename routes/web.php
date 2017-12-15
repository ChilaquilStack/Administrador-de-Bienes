<?php

Route::group(['middleware' => ['checkRole']], function(){
    Route::get('/creditos', 'CreditosController@index');
    //Rutas de los creditos
    Route::get("/creditos/bienes", "CreditosController@bienes");
    Route::get("/creditos/creditos", "CreditosController@creditos");
    Route::get("/creditos/create",  "CreditosController@create");
    Route::post("/creditos/store",  "CreditosController@store");
    Route::post("/creditos/destroy", "CreditosController@destroy");
    Route::post("/creditos/update",  "CreditosController@update");
    Route::get("/creditos/municipios",  "CreditosController@municipios");
    Route::match(["get", "post"] , "/creditos/add",  "CreditosController@add");
    Route::resource("creditos", "CreditosController");
    //Ruta de los bienes
    Route::get("/bienes/bienes", "BienesController@bienes");
    Route::post("/bienes/destroy", "BienesController@destroy");
    Route::post("/bienes/{id?}/", "BienesController@update");
    Route::match(["get","post"], "/bienes/{bien?}/imagenes","BienesController@imagenes");
    Route::match(["get","post"], "/bienes/{imagen?}/destroy","BienesController@imagen_destroy");
    Route::resource("bienes", "BienesController");
    //Rutas de los contribuyentes
    Route::get("/contribuyentes/contribuyentes", "ContribuyenteController@contribuyentes");
    Route::get("/contribuyentes/creditos", "ContribuyenteController@creditos");
    Route::resource("contribuyentes", "ContribuyenteController");
    //Otras Rutas
    Route::resource("avaluos", "AvaluosController");
    Route::resource("remates", "RematesController");
    //Rutas de las categorias
    Route::match(["get", "post"], "/categorias","CategoriasController@index");
    Route::get("/categorias/subcategorias", "CategoriasController@subcategorias");
    Route::get("/categorias/subsubcategorias", "CategoriasController@subsubcategorias");
    Route::get("/categorias/{id?}", "CategoriasController@destroy");
    Route::get("/categorias/subcategoria/{id?}", "CategoriasController@subcategoria_destroy");
    Route::post("/categorias/subcategoria/create", "CategoriasController@subcategoria_create");
    Route::get("/categorias/subsubcategoria/{id?}", "CategoriasController@subsubcategoria_destroy");
    Route::post("/categorias/subsubcategoria/create", "CategoriasController@subsubcategoria_create");
    //Rutas de los usuarios
    Route::resource("usuarios", "UsuariosController");
    
});
Route::get("/", "HomeController@index");
Route::get("/show/{bien}", "HomeController@show");
Route::get("/categoria/{categoria?}", "HomeController@categorias");
Route::get("/logout","Auth\LoginController@logout")->name("logout");
Route::match(["post", "get"],"/login","Auth\LoginController@authenticate")->name("login");
Route::post("/register","Auth\RegisterController@create")->name("register");
Route::get("/register", "Auth\RegisterController@register");