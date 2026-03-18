<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/suma', function () {
    return view('suma');
});
Route::post('/suma', function (Request $request) {
    $num1=$request->input('num1');
    $num2=$request->input('num2');
    $suma=$num1+$num2;
    return view('suma', compact('suma'));
    echo "La suma de $num1 y $num2 es $suma";
});


 