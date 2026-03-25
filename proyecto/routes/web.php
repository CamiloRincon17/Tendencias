<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Sumacontroller;

/*Route::get('/suma', function () {
    return view('suma');
});
Route::post('/suma', function (Request $request) {
    $num1=$request->input('num1');
    $num2=$request->input('num2');
    $suma=$num1+$num2;
    return view('suma', compact('suma'));
    echo "La suma de $num1 y $num2 es $suma";
});*/

Route::get('/suma', [Sumacontroller::class, 'index']);
Route::post('/suma', [Sumacontroller::class, 'suma']);

// Añadimos estas rutas para que funcionen los enlaces de navegación:
Route::view('/welcome', 'welcome');
Route::view('/inicio', 'inicio'); 
Route::view('/suma', 'suma');